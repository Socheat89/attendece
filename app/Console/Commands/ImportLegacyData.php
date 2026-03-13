<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportLegacyData extends Command
{
    protected $signature = 'db:import-legacy {file} {company_id=20}';
    protected $description = 'Super robust legacy migration';

    protected $maps = [
        'users' => [],      // old_id => new_id
        'branches' => [],   // old_id => new_id
        'roles' => [],      // old_id => new_id
        'employees' => [],  // old_id => new_id
        'sessions' => [],   // old_id => new_id
    ];

    public function handle()
    {
        $file = $this->argument('file');
        $cid = (int)$this->argument('company_id');

        if (!File::exists($file)) {
            $this->error("File not found: $file");
            return 1;
        }

        $this->info("🚀 Starting Robust Migration [Company: $cid]");
        
        // Ensure company exists
        DB::table('companies')->updateOrInsert(['id'=>$cid], ['name'=>'SR Cosmetic', 'status'=>'active']);

        $lines = file($file);
        $currentTable = null;

        DB::beginTransaction();
        try {
            foreach ($lines as $line) {
                $line = trim($line);
                if (empty($line) || str_starts_with($line, '--') || str_starts_with($line, '/*')) continue;

                if (preg_match('/INSERT INTO [`]?([a-z0-9_]+)[`]?/i', $line, $m)) {
                    $currentTable = $m[1];
                }

                if ($currentTable && preg_match('/\((.*)\)/', $line, $m)) {
                    $data = str_getcsv($m[1], ",", "'");
                    $this->importRow($currentTable, $data, $cid);
                }

                if (str_ends_with($line, ';')) {
                    $currentTable = null;
                }
            }

            DB::commit();
            $this->info("\n✅ Migration Finished Successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("\n❌ Fatal Error: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine());
        }

        return 0;
    }

    private function clean($v) {
        $v = trim($v, "' ");
        return ($v === 'NULL' || $v === '') ? null : $v;
    }

    private function importRow($table, $data, $cid)
    {
        $oldId = $this->clean($data[0]);

        switch ($table) {
            case 'roles':
                $name = $this->clean($data[1]);
                $id = DB::table('roles')->where('name', $name)->value('id');
                if (!$id) $id = DB::table('roles')->insertGetId(['name'=>$name, 'guard_name'=>'web']);
                $this->maps['roles'][$oldId] = $id;
                break;

            case 'branches':
                $id = DB::table('branches')->insertGetId([
                    'company_id' => $cid,
                    'name' => $this->clean($data[1]),
                    'address' => $this->clean($data[2]),
                    'latitude' => $this->clean($data[3]) ?? 0,
                    'longitude' => $this->clean($data[4]) ?? 0,
                    'is_active' => 1
                ]);
                $this->maps['branches'][$oldId] = $id;
                break;

            case 'users':
                $email = $this->clean($data[2]);
                $user = DB::table('users')->where('email', $email)->first();
                $userData = [
                    'name' => $this->clean($data[1]),
                    'email' => $email,
                    'password' => $this->clean($data[8]),
                    'company_id' => $cid,
                    'branch_id' => $this->maps['branches'][$this->clean($data[3])] ?? null,
                    'is_active' => 1
                ];
                if ($user) {
                    DB::table('users')->where('id', $user->id)->update(['company_id'=>$cid]);
                    $id = $user->id;
                } else {
                    $id = DB::table('users')->insertGetId($userData);
                }
                $this->maps['users'][$oldId] = $id;
                break;

            case 'model_has_roles':
                $roleId = $this->maps['roles'][$this->clean($data[0])] ?? null;
                $userId = $this->maps['users'][$this->clean($data[2])] ?? null;
                if ($roleId && $userId) {
                    $pivotData = ['role_id'=>$roleId, 'model_id'=>$userId, 'model_type'=>'App\Models\User'];
                    if (Schema::hasColumn('model_has_roles', 'company_id')) $pivotData['company_id'] = $cid;
                    DB::table('model_has_roles')->updateOrInsert($pivotData, $pivotData);
                }
                break;

            case 'employees':
                $userId = $this->maps['users'][$this->clean($data[1])] ?? null;
                if ($userId) {
                    $id = DB::table('employees')->insertGetId([
                        'company_id' => $cid,
                        'user_id' => $userId,
                        'employee_id' => $this->clean($data[2]),
                        'branch_id' => $this->maps['branches'][$this->clean($data[3])] ?? DB::table('branches')->where('company_id', $cid)->value('id'),
                        'position' => $this->clean($data[5]),
                        'join_date' => $this->clean($data[11]) ?: now()
                    ]);
                    $this->maps['employees'][$oldId] = $id;
                }
                break;

            case 'attendance_sessions':
                $empId = $this->maps['employees'][$this->clean($data[1])] ?? null;
                if ($empId) {
                    $id = DB::table('attendance_sessions')->insertGetId([
                        'company_id' => $cid,
                        'employee_id' => $empId,
                        'branch_id' => $this->maps['branches'][$this->clean($data[2])] ?? null,
                        'attendance_date' => $this->clean($data[3]),
                        'created_at' => $this->clean($data[9]) ?? now()
                    ]);
                    $this->maps['sessions'][$oldId] = $id;
                }
                break;

            case 'attendance_logs':
                $sesId = $this->maps['sessions'][$this->clean($data[1])] ?? null;
                $empId = $this->maps['employees'][$this->clean($data[2])] ?? null;
                if ($sesId && $empId) {
                    DB::table('attendance_logs')->insert([
                        'company_id' => $cid,
                        'attendance_session_id' => $sesId,
                        'employee_id' => $empId,
                        'branch_id' => $this->maps['branches'][$this->clean($data[3])] ?? null,
                        'scan_type' => $this->clean($data[4]),
                        'scanned_at' => $this->clean($data[5]),
                        'latitude' => $this->clean($data[6]) ?? 0,
                        'longitude' => $this->clean($data[7]) ?? 0,
                        'created_at' => $this->clean($data[12]) ?? now()
                    ]);
                }
                break;
        }
    }
}

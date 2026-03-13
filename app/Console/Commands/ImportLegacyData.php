<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportLegacyData extends Command
{
    protected $signature = 'db:import-legacy {file} {company_id=20}';
    protected $description = 'Final robust import for legacy HRM data';

    protected $idMaps = ['users' => [], 'branches' => [], 'employees' => [], 'roles' => [], 'sessions' => []];

    public function handle()
    {
        $filePath = $this->argument('file');
        $companyId = $this->argument('company_id');

        if (!File::exists($filePath)) {
            $this->error("រកមិនឃើញ SQL File: {$filePath}");
            return Command::FAILURE;
        }

        $this->info("🚀 [V5] Final Import Strategy: Company ID {$companyId}");
        $sql = File::get($filePath);

        DB::beginTransaction();
        try {
            // 1. Roles & Branches
            $this->idMaps['roles'] = $this->process($sql, 'roles', $companyId, [$this, 'mapRole']);
            $this->idMaps['branches'] = $this->process($sql, 'branches', $companyId, [$this, 'mapBranch']);
            
            // 2. Users (ប្រើ email ជា Key សំខាន់)
            $this->idMaps['users'] = $this->process($sql, 'users', $companyId, [$this, 'mapUser']);

            // 3. Employees
            $this->idMaps['employees'] = $this->process($sql, 'employees', $companyId, [$this, 'mapEmployee']);

            // 4. Sessions
            $this->idMaps['sessions'] = $this->process($sql, 'attendance_sessions', $companyId, [$this, 'mapSession']);

            // 5. Logs (ម៉ោងស្កេន) - កែ Regex ឱ្យខ្លាំងជាងមុន
            $this->process($sql, 'attendance_logs', $companyId, [$this, 'mapLog']);

            DB::commit();
            $this->info("\n✅ រួចរាល់! សូមពិនិត្យមើលក្នុង Database បុគ្គលិក និង ម៉ោងស្កេននឹងចូលទាំងអស់។");
            return Command::SUCCESS;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("\n❌ កំហុសធ្ងន់ធ្ងរ: " . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function process($sql, $table, $cid, $callback) {
        $this->comment("\n👉 កំពុងទាញយក Table: `{$table}`...");
        
        // Regex ថ្មី ដែលអាចអានបានរហូតដល់ចប់ Table block
        $pattern = "/INSERT\s+INTO\s+[`]?{$table}[`]?.*VALUES\s*(.*);/isU";
        $maps = []; $found = 0; $success = 0;

        if (preg_match_all($pattern, $sql, $matches)) {
            foreach ($matches[1] as $block) {
                $rows = $this->splitRows($block);
                $found += count($rows);
                foreach ($rows as $row) {
                    try {
                        $newId = call_user_func($callback, $row, $cid);
                        if ($newId) { $maps[$this->clean($row[0])] = $newId; $success++; }
                    } catch (\Exception $e) {
                        if ($success < 3) $this->warn("      Error on row: " . substr($e->getMessage(), 0, 100));
                    }
                }
            }
        }
        
        if ($found > 0) $this->info("   🎯 រកឃើញ {$found} | បញ្ចូលជោគជ័យ {$success}");
        else $this->error("   ❌ រកមិនឃើញទិន្នន័យក្នុង Table `{$table}` ទេ!");
        
        return $maps;
    }

    private function splitRows($val) {
        $rows = []; $cur = ""; $inS = false; $esc = false; $lvl = 0;
        for ($i = 0; $i < strlen($val); $i++) {
            $c = $val[$i];
            if ($c === "'" && !$esc) $inS = !$inS;
            if ($c === "\\" && !$esc) $esc = true; else $esc = false;
            if (!$inS) {
                if ($c === "(") { $lvl++; if ($lvl === 1) { $cur = ""; continue; } }
                if ($c === ")") { $lvl--; if ($lvl === 0) { $rows[] = str_getcsv($cur, ",", "'"); continue; } }
            }
            if ($lvl > 0) $cur .= $c;
        }
        return array_filter($rows);
    }

    private function clean($v) { return trim($v, "' "); }

    private function mapRole($r, $cid) { 
        $name = $this->clean($r[1]);
        $role = DB::table('roles')->where('name', $name)->first();
        return $role ? $role->id : DB::table('roles')->insertGetId(['name' => $name, 'guard_name' => 'web']);
    }

    private function mapBranch($r, $cid) {
        return DB::table('branches')->insertGetId(['company_id' => $cid, 'name' => $this->clean($r[1]), 'is_active' => 1]);
    }

    private function mapUser($r, $cid) {
        $email = $this->clean($r[2]);
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            DB::table('users')->where('id', $user->id)->update(['company_id' => $cid]);
            return $user->id;
        }
        return DB::table('users')->insertGetId([
            'name' => $this->clean($r[1]), 'email' => $email, 'password' => $this->clean($r[8] ?? ''),
            'company_id' => $cid, 'is_active' => 1, 'created_at' => now()
        ]);
    }

    private function mapEmployee($r, $cid) {
        $oldUserId = $this->clean($r[1]);
        // ព្យាយាមរក New User ID ពី ID Map បើមិនឃើញ រកតាម Email (ដែលយើងបានបញ្ចូលរួច)
        $userId = $this->idMaps['users'][$oldUserId] ?? null;
        
        if (!$userId) {
            // Fallback: ស្វែងរក User ណាដែលក្នុងក្រុមហ៊ុននេះ តែមិនទាន់មាន Employee Profile
            $userId = DB::table('users')->where('company_id', $cid)
                ->whereNotExists(function($q) { $q->select(DB::raw(1))->from('employees')->whereColumn('employees.user_id', 'users.id'); })
                ->value('id');
        }

        if (!$userId) return null;

        return DB::table('employees')->updateOrInsert(
            ['user_id' => $userId, 'company_id' => $cid],
            [
                'employee_id' => $this->clean($r[2]),
                'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id') ?? 1,
                'position' => $this->clean($r[5]), 
                'join_date' => $this->clean($r[11]) ?: now()
            ]
        ) ? DB::table('employees')->where('user_id', $userId)->value('id') : null;
    }

    private function mapSession($r, $cid) {
        $oldEmpId = $this->clean($r[1]);
        $newEmpId = $this->idMaps['employees'][$oldEmpId] ?? null;
        if (!$newEmpId) return null;

        return DB::table('attendance_sessions')->insertGetId([
            'company_id' => $cid, 'employee_id' => $newEmpId, 
            'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id') ?? 1,
            'attendance_date' => $this->clean($r[3])
        ]);
    }

    private function mapLog($r, $cid) {
        $oldSes = $this->clean($r[1]); $oldEmp = $this->clean($r[2]);
        $newSes = $this->idMaps['sessions'][$oldSes] ?? null;
        $newEmp = $this->idMaps['employees'][$oldEmp] ?? null;
        if (!$newSes || !$newEmp) return null;

        return DB::table('attendance_logs')->insert([
            'company_id' => $cid, 'attendance_session_id' => $newSes, 'employee_id' => $newEmp,
            'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id') ?? 1,
            'scan_type' => $this->clean($r[4]), 'scanned_at' => $this->clean($r[5]),
            'latitude' => $this->clean($r[6]) ?? 0, 'longitude' => $this->clean($r[7]) ?? 0,
            'created_at' => $this->clean($r[12]) ?? now()
        ]);
    }
}

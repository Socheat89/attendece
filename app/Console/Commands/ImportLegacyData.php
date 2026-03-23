<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportLegacyData extends Command
{
    protected $signature = 'db:import-legacy {file} {company_id=20}';
    protected $description = 'V8: Final ID mapping engine for full data recovery';

    protected $maps = ['users' => [], 'branches' => [], 'roles' => [], 'employees' => [], 'sessions' => []];
    protected $counts = [];

    public function handle()
    {
        $file = $this->argument('file');
        $cid = (int)$this->argument('company_id');

        if (!File::exists($file)) {
            $this->error("File not found: $file"); return 1;
        }

        $this->info("🚀 [V8] Final Data Recovery Strategy: Company ID {$cid}");
        
        // Ensure company
        DB::table('companies')->updateOrInsert(['id'=>$cid], ['name'=>'SR Cosmetic', 'status'=>'active']);

        $sql = File::get($file);
        
        // Define tables in Order of Dependencies
        $tables = ['roles', 'branches', 'users', 'model_has_roles', 'employees', 'attendance_sessions', 'attendance_logs', 'attendance_qr_tokens'];

        foreach ($tables as $table) {
            $this->processTable($sql, $table, $cid);
        }

        $this->info("\n🎉 ដំណើរការបញ្ចប់! សូមឆែកមើលទំព័រ Attendance Log ឥឡូវនេះ។");
        return 0;
    }

    private function processTable($sql, $table, $cid)
    {
        $this->comment("\n👉 Processing `{$table}`...");
        
        // Match the INSERT block including all values
        $pattern = "/INSERT INTO [`]?{$table}[`]?.*VALUES\s*(.*);/isU";
        if (preg_match_all($pattern, $sql, $matches)) {
            $totalFound = 0; $success = 0;
            foreach ($matches[1] as $valuesBlock) {
                $rows = $this->robustSplit($valuesBlock);
                foreach ($rows as $row) {
                    $totalFound++;
                    $id = $this->importRow($table, $row, $cid);
                    if ($id) {
                        $this->maps[$table][$this->clean($row[0])] = $id;
                        $success++;
                    }
                }
            }
            $this->info("   ✅ Result: Found {$totalFound} | Linked/Imported {$success}");
        } else {
            $this->warn("   ⚠️ Table `{$table}` not found in SQL dump.");
        }
    }

    private function robustSplit($values) {
        $rows = []; $cur = ""; $inS = false; $esc = false; $lvl = 0;
        for ($i = 0; $i < strlen($values); $i++) {
            $c = $values[$i];
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

    private function clean($v) { $v = trim($v, "' "); return ($v === 'NULL' || $v === '') ? null : $v; }

    private function importRow($table, $data, $cid)
    {
        $oldId = $this->clean($data[0]);

        try {
            switch ($table) {
                case 'roles':
                    $name = $this->clean($data[1]);
                    $id = DB::table('roles')->where('name', $name)->value('id');
                    return $id ?: DB::table('roles')->insertGetId(['name'=>$name, 'guard_name'=>'web']);

                case 'branches':
                    $name = $this->clean($data[1]);
                    $id = DB::table('branches')->where('company_id', $cid)->where('name', $name)->value('id');
                    return $id ?: DB::table('branches')->insertGetId([
                        'company_id' => $cid, 'name' => $name, 'address' => $this->clean($data[2]),
                        'latitude' => $this->clean($data[3]) ?? 0, 'longitude' => $this->clean($data[4]) ?? 0, 'is_active' => 1
                    ]);

                case 'users':
                    $email = $this->clean($data[2]);
                    $user = DB::table('users')->where('email', $email)->first();
                    if ($user) {
                        DB::table('users')->where('id', $user->id)->update(['company_id'=>$cid]);
                        return $user->id;
                    }
                    return DB::table('users')->insertGetId([
                        'name' => $this->clean($data[1]), 'email' => $email, 'password' => $this->clean($data[8]),
                        'company_id' => $cid, 'is_active' => 1
                    ]);

                case 'model_has_roles':
                    $rId = $this->maps['roles'][$this->clean($data[0])] ?? null;
                    $uId = $this->maps['users'][$this->clean($data[2])] ?? null;
                    if ($rId && $uId) {
                        $p = ['role_id'=>$rId, 'model_id'=>$uId, 'model_type'=>'App\Models\User'];
                        if (Schema::hasColumn('model_has_roles', 'company_id')) $p['company_id'] = $cid;
                        DB::table('model_has_roles')->updateOrInsert($p, $p);
                        return true;
                    }
                    return false;

                case 'employees':
                    $uId = $this->maps['users'][$this->clean($data[1])] ?? null;
                    if (!$uId) return null;
                    $empId = $this->clean($data[2]);
                    $id = DB::table('employees')->where('company_id', $cid)->where('employee_id', $empId)->value('id');
                    if ($id) return $id;
                    return DB::table('employees')->insertGetId([
                        'company_id' => $cid, 'user_id' => $uId, 'employee_id' => $empId,
                        'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id'),
                        'position' => $this->clean($data[5]), 'join_date' => $this->clean($data[11]) ?: now()
                    ]);

                case 'attendance_sessions':
                    $eId = $this->maps['employees'][$this->clean($data[1])] ?? null;
                    $date = $this->clean($data[3]);
                    if (!$eId) return null;
                    $id = DB::table('attendance_sessions')->where('employee_id', $eId)->where('attendance_date', $date)->value('id');
                    return $id ?: DB::table('attendance_sessions')->insertGetId([
                        'company_id' => $cid, 'employee_id' => $eId, 'attendance_date' => $date,
                        'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id')
                    ]);

                case 'attendance_logs':
                    $sId = $this->maps['attendance_sessions'][$this->clean($data[1])] ?? null;
                    $eId = $this->maps['employees'][$this->clean($data[2])] ?? null;
                    $time = $this->clean($data[5]);
                    if (!$sId || !$eId) return null;
                    if (DB::table('attendance_logs')->where('employee_id', $eId)->where('scanned_at', $time)->exists()) return true;
                    return DB::table('attendance_logs')->insert([
                        'company_id' => $cid, 'attendance_session_id' => $sId, 'employee_id' => $eId,
                        'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id'),
                        'scan_type' => $this->clean($data[4]), 'scanned_at' => $time,
                        'latitude' => $this->clean($data[6]) ?? 0, 'longitude' => $this->clean($data[7]) ?? 0,
                        'created_at' => $this->clean($data[12]) ?? now()
                    ]);

                case 'attendance_qr_tokens':
                    $bId = $this->maps['branches'][$this->clean($data[1])] ?? null;
                    if (!$bId) return null;
                    $token = $this->clean($data[3]);
                    if (DB::table('attendance_qr_tokens')->where('token', $token)->exists()) return true;
                    return DB::table('attendance_qr_tokens')->insert([
                        'company_id' => $cid, 'branch_id' => $bId,
                        'token_date' => $this->clean($data[2]), 'token' => $token,
                        'expires_at' => $this->clean($data[4]), 'is_active' => $this->clean($data[5]) ?? 1,
                        'created_at' => $this->clean($data[6]) ?? now(), 'updated_at' => now()
                    ]);
            }
        } catch (\Exception $e) { return null; }
        return null;
    }
}

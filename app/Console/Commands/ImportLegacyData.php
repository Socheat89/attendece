<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportLegacyData extends Command
{
    protected $signature = 'db:import-legacy {file} {company_id=20}';
    protected $description = 'Import employees and logs by mapping emails from SQL';

    protected $idMaps = ['users' => [], 'branches' => [], 'employees' => [], 'roles' => [], 'sessions' => []];

    public function handle()
    {
        $filePath = $this->argument('file');
        $companyId = $this->argument('company_id');

        if (!File::exists($filePath)) {
            $this->error("រកមិនឃើញ SQL File: {$filePath}");
            return Command::FAILURE;
        }

        $this->info("🚀 [V4] Starting Deep Import: Company ID {$companyId}");
        $sql = File::get($filePath);

        DB::beginTransaction();
        try {
            // 1. Map Roles & Branches
            $this->idMaps['roles'] = $this->process($sql, 'roles', $companyId, [$this, 'mapRole']);
            $this->idMaps['branches'] = $this->process($sql, 'branches', $companyId, [$this, 'mapBranch']);
            
            // 2. Map Users (Important for IDs 36-42)
            $this->idMaps['users'] = $this->process($sql, 'users', $companyId, [$this, 'mapUser']);

            // 3. Map Employees (Using Email to Link)
            $this->idMaps['employees'] = $this->process($sql, 'employees', $companyId, [$this, 'mapEmployee']);

            // 4. Map Sessions
            $this->idMaps['sessions'] = $this->process($sql, 'attendance_sessions', $companyId, [$this, 'mapSession']);

            // 5. Map Logs (Scan times)
            $this->process($sql, 'attendance_logs', $companyId, [$this, 'mapLog']);

            DB::commit();
            $this->info("\n✅ ជោគជ័យ! Data ត្រូវបានបញ្ចូល និងភ្ជាប់ជាមួយ User ID ថ្មីរួចរាល់។");
            return Command::SUCCESS;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("\n❌ Error: " . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function process($sql, $table, $cid, $callback) {
        $this->comment("\n👉 Processing `{$table}`...");
        $pattern = "/INSERT\s+INTO\s+[`]?{$table}[`]?\s*(?:\([^)]*\))?\s*VALUES\s*(.*);/isU";
        $maps = []; $found = 0; $success = 0;

        if (preg_match_all($pattern, $sql, $matches)) {
            foreach ($matches[1] as $block) {
                $rows = $this->splitRows($block);
                $found += count($rows);
                foreach ($rows as $row) {
                    try {
                        $newId = call_user_func($callback, $row, $cid);
                        if ($newId) { $maps[$this->clean($row[0])] = $newId; $success++; }
                    } catch (\Exception $e) {}
                }
            }
        }
        if ($found > 0) $this->info("   🎯 Found {$found} | Imported {$success}");
        else $this->warn("   ⚠️ No data found for `{$table}`");
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
        return DB::table('roles')->updateOrInsert(['name' => $name, 'guard_name' => 'web'], ['name' => $name]) ? DB::table('roles')->where('name', $name)->value('id') : null;
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
        // Data ចាស់ មិនដឹង User ID លេខប៉ុន្មាន តែយើងមាន Name/Info ផ្សេងៗ
        // ក្នុងករណីនេះ យើងយក User ដំបូងដែលមិនទាន់មាន Employee ក្នុងក្រុមហ៊ុននេះ (ឬតាមលំដាប់)
        $user = DB::table('users')->where('company_id', $cid)
                ->whereNotExists(function($q) { $q->select(DB::raw(1))->from('employees')->whereColumn('employees.user_id', 'users.id'); })
                ->first();

        if (!$user) return null;

        return DB::table('employees')->insertGetId([
            'company_id' => $cid, 'user_id' => $user->id, 'employee_id' => $this->clean($r[2]),
            'branch_id' => DB::table('branches')->where('company_id', $cid)->value('id') ?? 1,
            'position' => $this->clean($r[5]), 'join_date' => $this->clean($r[11]) ?: now()
        ]);
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

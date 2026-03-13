<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportLegacyData extends Command
{
    protected $signature = 'db:import-legacy {file} {company_id=20}';
    protected $description = 'Robust import from custom SQL dump';

    protected $idMaps = [
        'users' => [],
        'branches' => [],
        'departments' => [],
        'employees' => [],
        'roles' => [],
        'attendance_sessions' => [],
    ];

    protected $defaultBranchId = null;

    public function handle()
    {
        $filePath = $this->argument('file');
        $companyId = $this->argument('company_id');

        if (!File::exists($filePath)) {
            $this->error("រកមិនឃើញ SQL File: {$filePath}");
            return Command::FAILURE;
        }

        $this->info("--------------------------------------------------");
        $this->info("🚀 ចាប់ផ្តើមទាញយក Data ទៅក្រុមហ៊ុន ID: {$companyId}");
        $this->info("--------------------------------------------------");

        $this->ensureCompanyExists($companyId);

        $this->info("📖 កំពុងអាន File...");
        $sqlContent = File::get($filePath);

        DB::beginTransaction();
        try {
            // STEP 1: ROLES
            $this->idMaps['roles'] = $this->importTable($sqlContent, 'roles', $companyId, [$this, 'mapRole']);

            // STEP 2: BRANCHES
            $this->idMaps['branches'] = $this->importTable($sqlContent, 'branches', $companyId, [$this, 'mapBranch']);
            $this->defaultBranchId = reset($this->idMaps['branches']) ?: 1;

            // STEP 3: USERS
            $this->idMaps['users'] = $this->importTable($sqlContent, 'users', $companyId, [$this, 'mapUser']);

            // STEP 4: MODEL_HAS_ROLES
            $this->importTable($sqlContent, 'model_has_roles', $companyId, [$this, 'mapUserRole']);

            // STEP 5: DEPARTMENTS
            $this->idMaps['departments'] = $this->importTable($sqlContent, 'departments', $companyId, [$this, 'mapDepartment']);

            // STEP 6: EMPLOYEES
            $this->idMaps['employees'] = $this->importTable($sqlContent, 'employees', $companyId, [$this, 'mapEmployee']);

            // STEP 7: ATTENDANCE SESSIONS
            $this->idMaps['attendance_sessions'] = $this->importTable($sqlContent, 'attendance_sessions', $companyId, [$this, 'mapSession']);

            // STEP 8: ATTENDANCE LOGS
            $this->importTable($sqlContent, 'attendance_logs', $companyId, [$this, 'mapLog']);

            DB::commit();
            $this->info("--------------------------------------------------");
            $this->info("✅ ជោគជ័យ! សូមពិនិត្យមើលក្នុង Database របស់លោកអ្នក។");
            $this->info("--------------------------------------------------");
            return Command::SUCCESS;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("❌ បរាជ័យ: " . $e->getMessage() . " (Line: " . $e->getLine() . ")");
            return Command::FAILURE;
        }
    }

    private function ensureCompanyExists($id)
    {
        if (!DB::table('companies')->where('id', $id)->exists()) {
            DB::table('companies')->insert([
                'id' => $id, 'name' => 'Imported Co', 'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }

    private function parseRows($sql, $table)
    {
        $pattern = "/INSERT INTO `{$table}`.*VALUES\s*(.*);/isU";
        if (preg_match($pattern, $sql, $match)) {
            $values = trim($match[1]);
            // Split rows by "),(" but be careful about strings
            // A more robust way:
            $rows = [];
            $len = strlen($values);
            $currentRow = "";
            $inString = false;
            $escape = false;
            $level = 0;

            for ($i = 0; $i < $len; $i++) {
                $char = $values[$i];
                if ($char === "'" && !$escape) $inString = !$inString;
                if ($char === "\\" && !$escape) $escape = true; else $escape = false;

                if (!$inString) {
                    if ($char === "(") $level++;
                    if ($char === ")") {
                        $level--;
                        if ($level === 0) {
                            $rows[] = $this->parseCsvRow(trim($currentRow, "() "));
                            $currentRow = "";
                            continue;
                        }
                    }
                }
                if ($level > 0 || $inString) {
                    if ($char === "(" && $level === 1 && !$inString) continue;
                    $currentRow .= $char;
                }
            }
            return array_filter($rows);
        }
        return [];
    }

    private function parseCsvRow($rowStr)
    {
        // Simple but effective mapping for SQL values
        return str_getcsv($rowStr, ",", "'");
    }

    private function importTable($sql, $table, $companyId, $callback)
    {
        $rows = $this->parseRows($sql, $table);
        $count = count($rows);
        $this->comment("👉 Table `{$table}`: អានបាន {$count} ជួរ");
        
        $mappings = [];
        foreach ($rows as $row) {
            try {
                $res = call_user_func($callback, $row, $companyId);
                if ($res) $mappings[$this->clean($row[0])] = $res;
            } catch (\Exception $e) {}
        }
        return $mappings;
    }

    private function clean($val) {
        $val = trim($val, "' ");
        return ($val === 'NULL' || $val === '') ? null : $val;
    }

    private function mapRole($row, $companyId) {
        $name = $this->clean($row[1]);
        $role = DB::table('roles')->where('name', $name)->first();
        if (!$role) {
            return DB::table('roles')->insertGetId(['name' => $name, 'guard_name' => 'web']);
        }
        return $role->id;
    }

    private function mapBranch($row, $companyId) {
        return DB::table('branches')->insertGetId([
            'company_id' => $companyId, 'name' => $this->clean($row[1]), 'is_active' => 1
        ]);
    }

    private function mapUser($row, $companyId) {
        $email = $this->clean($row[2]);
        $oldBranchId = $this->clean($row[3]);
        $user = DB::table('users')->where('email', $email)->first();
        if (!$user) {
            return DB::table('users')->insertGetId([
                'name' => $this->clean($row[1]), 'email' => $email, 'password' => $this->clean($row[8]),
                'branch_id' => $this->idMaps['branches'][$oldBranchId] ?? $this->defaultBranchId,
                'company_id' => $companyId, 'is_active' => 1
            ]);
        }
        DB::table('users')->where('id', $user->id)->update(['company_id' => $companyId]);
        return $user->id;
    }

    private function mapUserRole($row, $companyId) {
        $oldRoleId = $this->clean($row[0]);
        $oldUserId = $this->clean($row[2]);
        if (!isset($this->idMaps['users'][$oldUserId], $this->idMaps['roles'][$oldRoleId])) return null;

        $data = ['role_id' => $this->idMaps['roles'][$oldRoleId], 'model_id' => $this->idMaps['users'][$oldUserId], 'model_type' => 'App\Models\User'];
        if (Schema::hasColumn('model_has_roles', 'company_id')) $data['company_id'] = $companyId;
        
        DB::table('model_has_roles')->updateOrInsert($data, $data);
        return true;
    }

    private function mapDepartment($row, $companyId) {
        $oldBranchId = $this->clean($row[1]);
        return DB::table('departments')->insertGetId([
            'company_id' => $companyId, 'branch_id' => $this->idMaps['branches'][$oldBranchId] ?? $this->defaultBranchId,
            'name' => $this->clean($row[2]), 'is_active' => 1
        ]);
    }

    private function mapEmployee($row, $companyId) {
        $oldUserId = $this->clean($row[1]);
        if (!isset($this->idMaps['users'][$oldUserId])) return null;

        return DB::table('employees')->insertGetId([
            'company_id' => $companyId, 'user_id' => $this->idMaps['users'][$oldUserId],
            'employee_id' => $this->clean($row[2]), 'branch_id' => $this->defaultBranchId,
            'position' => $this->clean($row[5]), 'join_date' => $this->clean($row[11])
        ]);
    }

    private function mapSession($row, $companyId) {
        $oldEmpId = $this->clean($row[1]);
        if (!isset($this->idMaps['employees'][$oldEmpId])) return null;

        return DB::table('attendance_sessions')->insertGetId([
            'company_id' => $companyId, 'employee_id' => $this->idMaps['employees'][$oldEmpId],
            'branch_id' => $this->defaultBranchId, 'attendance_date' => $this->clean($row[3])
        ]);
    }

    private function mapLog($row, $companyId) {
        $oldSessId = $this->clean($row[1]);
        $oldEmpId = $this->clean($row[2]);
        if (!isset($this->idMaps['attendance_sessions'][$oldSessId], $this->idMaps['employees'][$oldEmpId])) return null;

        return DB::table('attendance_logs')->insert([
            'company_id' => $companyId, 'attendance_session_id' => $this->idMaps['attendance_sessions'][$oldSessId],
            'employee_id' => $this->idMaps['employees'][$oldEmpId], 'branch_id' => $this->defaultBranchId,
            'scan_type' => $this->clean($row[4]), 'scanned_at' => $this->clean($row[5]),
            'latitude' => $this->clean($row[6]) ?? 0, 'longitude' => $this->clean($row[7]) ?? 0,
            'created_at' => $this->clean($row[12]) ?? now(), 'updated_at' => $this->clean($row[13]) ?? now()
        ]);
    }
}

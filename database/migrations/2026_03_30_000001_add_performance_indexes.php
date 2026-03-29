<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ─── attendance_sessions ────────────────────────────────────────────
        // Used heavily in Dashboard, AttendanceController, ReportController
        Schema::table('attendance_sessions', function (Blueprint $table) {
            // WHERE attendance_date + late_minutes > 0  (dashboard late count)
            if (! $this->hasIndex('attendance_sessions', 'as_date_late_idx')) {
                $table->index(['attendance_date', 'late_minutes'], 'as_date_late_idx');
            }
            // WHERE attendance_date + overtime_minutes > 0
            if (! $this->hasIndex('attendance_sessions', 'as_date_ot_idx')) {
                $table->index(['attendance_date', 'overtime_minutes'], 'as_date_ot_idx');
            }
        });

        // ─── attendance_logs ────────────────────────────────────────────────
        // Paginated list filtered by date + branch/employee
        Schema::table('attendance_logs', function (Blueprint $table) {
            if (! $this->hasIndex('attendance_logs', 'al_date_branch_idx')) {
                $table->index(['scanned_at', 'branch_id'], 'al_date_branch_idx');
            }
        });

        // ─── leave_requests ─────────────────────────────────────────────────
        // Dashboard: status=pending latest 8; on_leave_today range check
        Schema::table('leave_requests', function (Blueprint $table) {
            if (! $this->hasIndex('leave_requests', 'lr_status_created_idx')) {
                $table->index(['status', 'created_at'], 'lr_status_created_idx');
            }
            // Approved + date range (on-leave today count)
            if (! $this->hasIndex('leave_requests', 'lr_status_dates_idx')) {
                $table->index(['status', 'start_date', 'end_date'], 'lr_status_dates_idx');
            }
        });

        // ─── payrolls ───────────────────────────────────────────────────────
        // Reports: SUM(net_salary) WHERE month/year of period_start
        Schema::table('payrolls', function (Blueprint $table) {
            if (! $this->hasIndex('payrolls', 'p_period_start_idx')) {
                $table->index(['period_start'], 'p_period_start_idx');
            }
        });

        // ─── users ──────────────────────────────────────────────────────────
        // Frequent lookup: company_id + is_active
        Schema::table('users', function (Blueprint $table) {
            if (! $this->hasIndex('users', 'u_company_active_idx')) {
                $table->index(['company_id', 'is_active'], 'u_company_active_idx');
            }
        });

        // ─── employees ──────────────────────────────────────────────────────
        // company_id filter (tenant scope) + employment_status lookup
        Schema::table('employees', function (Blueprint $table) {
            if (! $this->hasIndex('employees', 'emp_status_branch_idx')) {
                $table->index(['employment_status', 'branch_id'], 'emp_status_branch_idx');
            }
        });
    }

    public function down(): void
    {
        Schema::table('attendance_sessions', function (Blueprint $table) {
            $table->dropIndexIfExists('as_date_late_idx');
            $table->dropIndexIfExists('as_date_ot_idx');
        });
        Schema::table('attendance_logs', function (Blueprint $table) {
            $table->dropIndexIfExists('al_date_branch_idx');
        });
        Schema::table('leave_requests', function (Blueprint $table) {
            $table->dropIndexIfExists('lr_status_created_idx');
            $table->dropIndexIfExists('lr_status_dates_idx');
        });
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropIndexIfExists('p_period_start_idx');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndexIfExists('u_company_active_idx');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->dropIndexIfExists('emp_status_branch_idx');
        });
    }

    /** Check if an index already exists (avoid duplicate-key error) */
    private function hasIndex(string $table, string $indexName): bool
    {
        $indexes = \Illuminate\Support\Facades\DB::select(
            "SHOW INDEX FROM `{$table}` WHERE Key_name = ?",
            [$indexName]
        );
        return ! empty($indexes);
    }
};

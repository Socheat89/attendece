<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceSession;
use App\Models\LeaveRequest;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ReportController extends Controller
{
    public function index()
    {
        $now       = Carbon::now();
        $companyId = auth()->user()->company_id;
        $monthKey  = $now->format('Ym');
        $ttl       = 600; // 10 minutes

        $attendanceByBranch = Cache::remember(
            "report_attendance_branch_{$companyId}_{$monthKey}",
            $ttl,
            fn () => AttendanceSession::query()
                ->selectRaw('branch_id, COUNT(*) as total')
                ->with('branch:id,name')
                ->whereMonth('attendance_date', $now->month)
                ->whereYear('attendance_date', $now->year)
                ->groupBy('branch_id')
                ->get()
        );

        $leaveByType = Cache::remember(
            "report_leave_type_{$companyId}_{$monthKey}",
            $ttl,
            fn () => LeaveRequest::query()
                ->selectRaw('leave_type_id, COUNT(*) as total')
                ->with('leaveType:id,name')
                ->whereMonth('start_date', $now->month)
                ->whereYear('start_date', $now->year)
                ->groupBy('leave_type_id')
                ->get()
        );

        $monthlyPayroll = Cache::remember(
            "report_payroll_total_{$companyId}_{$monthKey}",
            $ttl,
            fn () => Payroll::query()
                ->whereMonth('period_start', $now->month)
                ->whereYear('period_start', $now->year)
                ->sum('net_salary')
        );

        return view('admin.reports.index', compact('attendanceByBranch', 'leaveByType', 'monthlyPayroll'));
    }
}

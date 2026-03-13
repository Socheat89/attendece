<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceSession;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\LeaveRequest;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $today = Carbon::today();
        $cacheKey = 'admin_dashboard_summary_'.auth()->user()->company_id.'_'.$today->format('Ymd');

        $summary = Cache::remember($cacheKey, 300, function () use ($today) {
            $lateEmployees = AttendanceSession::query()
                ->with('employee.user')
                ->whereDate('attendance_date', $today->toDateString())
                ->where('late_minutes', '>', 0)
                ->orderByDesc('late_minutes')
                ->limit(8)
                ->get();

            $pendingLeaves = LeaveRequest::query()
                ->with(['employee.user', 'leaveType'])
                ->where('status', 'pending')
                ->latest()
                ->limit(8)
                ->get();

            $chartRows = AttendanceSession::query()
                ->selectRaw('DATE(attendance_date) as date, COUNT(*) as total')
                ->whereMonth('attendance_date', $today->month)
                ->whereYear('attendance_date', $today->year)
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $firstDayOfMonth = $today->copy()->startOfMonth();
            $lastDayForChart = $today->copy();
            $totalsByDate = $chartRows->pluck('total', 'date');

            $chartLabels = collect();
            $chartValues = collect();

            for ($date = $firstDayOfMonth->copy(); $date->lte($lastDayForChart); $date->addDay()) {
                $ymd = $date->format('Y-m-d');
                $chartLabels->push($date->format('d M'));
                $chartValues->push((int) ($totalsByDate[$ymd] ?? 0));
            }

            return [
                'totalEmployees' => Employee::query()->count(),
                'todayAttendance' => AttendanceSession::query()->whereDate('attendance_date', $today->toDateString())->count(),
                'lateEmployeesCount' => AttendanceSession::query()->whereDate('attendance_date', $today->toDateString())->where('late_minutes', '>', 0)->count(),
                'onLeaveToday' => LeaveRequest::query()
                    ->where('status', 'approved')
                    ->whereDate('start_date', '<=', $today->toDateString())
                    ->whereDate('end_date', '>=', $today->toDateString())
                    ->count(),
                'monthlyPayrollCost' => Payroll::query()
                    ->whereMonth('period_start', $today->month)
                    ->whereYear('period_start', $today->year)
                    ->sum('net_salary'),
                'chartLabels' => $chartLabels,
                'chartValues' => $chartValues,
                'hasMonthlyAttendanceData' => $chartValues->sum() > 0,
                'lateEmployees' => $lateEmployees,
                'pendingLeaves' => $pendingLeaves,
                'totalRevenue' => Invoice::where('company_id', auth()->user()->company_id)->where('status', 'paid')->sum('amount'),
                'recentInvoices' => Invoice::query()->with('subscriptionPlan')
                    ->where('company_id', auth()->user()->company_id)
                    ->where('status', 'paid')
                    ->latest()
                    ->limit(5)
                    ->get(),
            ];
        });

        return view('admin.dashboard', $summary);
    }
}

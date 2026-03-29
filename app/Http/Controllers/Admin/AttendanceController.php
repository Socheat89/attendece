<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceLog;
use App\Models\AttendanceSession;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date      = $request->input('date', now()->toDateString());
        $tab       = $request->input('tab', 'all'); // all | late
        $companyId = auth()->user()->company_id;

        $attendanceLogs = AttendanceLog::query()
            ->with(['employee.user', 'employee.branch', 'employee.department', 'attendanceSession'])
            ->when($request->filled('branch_id'),   fn ($q) => $q->where('branch_id',   $request->integer('branch_id')))
            ->when($request->filled('employee_id'), fn ($q) => $q->where('employee_id', $request->integer('employee_id')))
            ->when($tab === 'late', fn ($q) => $q->whereHas('attendanceSession', fn ($sq) => $sq->where('late_minutes', '>', 0)))
            ->whereDate('scanned_at', $date)
            ->latest('scanned_at')
            ->paginate(30)
            ->withQueryString();

        $dayOfWeek   = Carbon::parse($date)->dayOfWeek;
        $scheduleMap = Schedule::query()
            ->where('day_of_week', $dayOfWeek)
            ->get()
            ->keyBy('branch_id');

        // Summary counts cached 2 min — avoids 3 extra COUNT queries per reload
        $summary = Cache::remember(
            "attendance_summary_{$companyId}_{$date}",
            120,
            fn () => [
                'total'    => AttendanceLog::query()->whereDate('scanned_at', $date)->count(),
                'late'     => AttendanceSession::query()->whereDate('attendance_date', $date)->where('late_minutes', '>', 0)->count(),
                'overtime' => AttendanceSession::query()->whereDate('attendance_date', $date)->where('overtime_minutes', '>', 0)->count(),
            ]
        );

        // Branch list rarely changes — cache 1 hour
        $branches = Cache::remember(
            "branches_list_{$companyId}",
            3600,
            fn () => Branch::query()->orderBy('name')->get(['id', 'name'])
        );

        // Employee dropdown — select only needed columns
        $employees = Employee::query()
            ->with(['user:id,name'])
            ->select(['id', 'user_id', 'employee_id'])
            ->orderBy('employee_id')
            ->get();

        return view('admin.attendance.index', [
            'attendanceLogs' => $attendanceLogs,
            'branches'       => $branches,
            'employees'      => $employees,
            'selectedDate'   => $date,
            'activeTab'      => $tab,
            'summary'        => $summary,
            'scheduleMap'    => $scheduleMap,
        ]);
    }
}


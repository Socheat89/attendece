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
    public function exportPdf(Request $request)
    {
        $date      = $request->input('date', now()->toDateString());
        $attendanceLogs = AttendanceLog::query()
            ->with(['employee.user', 'employee.branch', 'employee.department'])
            ->whereDate('scanned_at', $date)
            ->latest('scanned_at')
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.attendance.export_pdf', compact('attendanceLogs', 'date'));
        return $pdf->download('Attendance_'.$date.'.pdf');
    }

    public function exportExcel(Request $request)
    {
        $date = $request->input('date', now()->toDateString());
        $attendanceLogs = AttendanceLog::query()
            ->with(['employee.user', 'employee.branch', 'employee.department', 'attendanceSession'])
            ->whereDate('scanned_at', $date)
            ->latest('scanned_at')
            ->get();
        
        $filename = "Attendance_" . $date . ".csv";
        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($attendanceLogs, $date) {
            $file = fopen('php://output', 'w');
            fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            
            fputcsv($file, ['Employee ID', 'Name', 'Branch', 'Department', 'Date', 'Type', 'Time']);

            foreach ($attendanceLogs as $log) {
                fputcsv($file, [
                    $log->employee->employee_id ?? 'N/A',
                    $log->employee->user->name ?? 'N/A',
                    $log->employee->branch->name ?? 'N/A',
                    $log->employee->department->name ?? 'N/A',
                    $date,
                    $log->scan_type ?? 'Scan',
                    $log->scanned_at ? $log->scanned_at->format('H:i') : 'N/A'
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function index(Request $request)
    {

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


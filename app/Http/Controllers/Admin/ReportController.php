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
    private function getReportData()
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

        $monthlyPayroll = (float) Cache::remember(
            "report_payroll_total_{$companyId}_{$monthKey}",
            $ttl,
            fn () => Payroll::query()
                ->whereMonth('period_start', $now->month)
                ->whereYear('period_start', $now->year)
                ->sum('net_salary')
        );

        return compact('attendanceByBranch', 'leaveByType', 'monthlyPayroll', 'now');
    }

    public function index()
    {
        return view('admin.reports.index', $this->getReportData());
    }

    public function exportPdf()
    {
        $data = $this->getReportData();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.reports.pdf', $data);
        return $pdf->download('HR_Report_'.$data['now']->format('M_Y').'.pdf');
    }

    public function exportExcel()
    {
        $data = $this->getReportData();
        
        $filename = "HR_Report_" . $data['now']->format('M_Y') . ".csv";
        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($data) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for proper excel rendering
            fputs($file, $bom =(chr(0xEF) . chr(0xBB) . chr(0xBF)));
            
            fputcsv($file, ['Category', 'Item / Name', 'Total / Amount']);

            fputcsv($file, ['PAYROLL', 'Monthly Estimated Payroll', '$' . number_format($data['monthlyPayroll'], 2)]);
            fputcsv($file, ['', '', '']);

            fputcsv($file, ['ATTENDANCE BY BRANCH', '', '']);
            if ($data['attendanceByBranch']->isEmpty()) {
                fputcsv($file, ['', 'No data available', '0']);
            } else {
                foreach ($data['attendanceByBranch'] as $row) {
                    $name = $row->branch ? $row->branch->name : 'N/A';
                    fputcsv($file, ['', $name, $row->total]);
                }
            }
            fputcsv($file, ['', '', '']);

            fputcsv($file, ['LEAVE BY TYPE', '', '']);
            if ($data['leaveByType']->isEmpty()) {
                fputcsv($file, ['', 'No data available', '0']);
            } else {
                foreach ($data['leaveByType'] as $row) {
                    $name = $row->leaveType ? $row->leaveType->name : 'N/A';
                    fputcsv($file, ['', $name, $row->total]);
                }
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attendance Report {{ $date }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #e2e8f0; padding: 8px; text-align: left; font-size: 13px; }
        th { background: #f1f5f9; color: #475569; font-weight: bold; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Company Attendance Report</h2>
        <p style="color: #64748b; font-size: 14px;">Date: {{ \Carbon\Carbon::parse($date)->format('l, jS F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Type</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attendanceLogs as $log)
            <tr>
                <td>{{ $log->employee->employee_id ?? 'N/A' }}</td>
                <td>{{ $log->employee->user->name ?? 'N/A' }}</td>
                <td>{{ $log->employee->branch->name ?? 'N/A' }}</td>
                <td>{{ $log->scan_type ?? 'Scan' }}</td>
                <td>{{ $log->scanned_at ? $log->scanned_at->format('H:i') : 'N/A' }}</td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No attendance records found for this date.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

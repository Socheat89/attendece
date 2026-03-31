<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HR Report {{ $now->format('M Y') }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        .header h1 { margin: 0 0 5px 0; font-size: 24px; color: #1e3a8a;}
        .stat-box { background: #f8fafc; padding: 20px; text-align: center; border: 1px solid #e2e8f0; margin-bottom: 30px; border-radius: 8px;}
        .stat-box h3 { margin: 0; font-size: 14px; color: #64748b; text-transform: uppercase; letter-spacing: 1px;}
        .stat-box h2 { margin: 10px 0 0; font-size: 32px; color: #0f172a; }
        .table-wrap { margin-bottom: 35px; }
        .table-wrap h3 { color: #334155; font-size: 18px; margin-bottom: 15px; border-left: 4px solid #3b82f6; padding-left: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border-bottom: 1px solid #e2e8f0; padding: 12px 10px; text-align: left; font-size: 14px; }
        th { background: #f1f5f9; color: #475569; font-weight: bold; text-transform: uppercase; font-size: 12px;}
        .text-right { text-align: right; }
        .footer { text-align: center; margin-top: 50px; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Company HR Analytics Report</h1>
        <p style="color: #64748b; font-size: 14px;">Report Period: {{ $now->format('F Y') }} - Generated on: {{ date('M d, Y') }}</p>
    </div>

    <div class="stat-box">
        <h3>Estimated Monthly Payroll</h3>
        <h2>${{ number_format($monthlyPayroll, 2) }}</h2>
    </div>

    <table width="100%" style="border: 0; margin-bottom: 0;">
        <tr>
            <td style="width: 50%; vertical-align: top; padding-right: 15px; border: 0;">
                <div class="table-wrap">
                    <h3>Attendance by Branch</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Branch Location</th>
                                <th class="text-right">Total Scans</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attendanceByBranch as $row)
                            <tr>
                                <td>{{ $row->branch?->name ?? 'N/A' }}</td>
                                <td class="text-right"><strong>{{ $row->total }}</strong></td>
                            </tr>
                            @empty
                            <tr><td colspan="2" style="text-align: center; color: #94a3b8;">No attendance data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="width: 50%; vertical-align: top; padding-left: 15px; border: 0;">
                <div class="table-wrap">
                    <h3>Leave Summary by Type</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Leave Type</th>
                                <th class="text-right">Requests</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leaveByType as $row)
                            <tr>
                                <td>{{ $row->leaveType?->name ?? 'N/A' }}</td>
                                <td class="text-right"><strong>{{ $row->total }}</strong></td>
                            </tr>
                            @empty
                            <tr><td colspan="2" style="text-align: center; color: #94a3b8;">No leave data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <div class="footer">
        Generated automatically by the HRM System.
    </div>
</body>
</html>

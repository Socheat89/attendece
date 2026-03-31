<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payroll List {{ now()->format('M Y') }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #e2e8f0; padding: 10px; text-align: left; font-size: 13px; }
        th { background: #f1f5f9; color: #475569; font-weight: bold; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Company Payroll List</h2>
        <p style="color: #64748b; font-size: 14px;">Extracted on: {{ date('M d, Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Period</th>
                <th class="text-right">Gross</th>
                <th class="text-right">Net</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->employee->employee_id ?? 'N/A' }}</td>
                <td>{{ $payroll->employee->user->name ?? 'N/A' }}</td>
                <td>{{ $payroll->period_start->format('M d') }} - {{ $payroll->period_end->format('M d, Y') }}</td>
                <td class="text-right">${{ number_format($payroll->gross_salary, 2) }}</td>
                <td class="text-right"><strong>${{ number_format($payroll->net_salary, 2) }}</strong></td>
                <td class="text-center" style="text-transform: capitalize;">{{ $payroll->status }}</td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No payroll records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body{font-family:DejaVu Sans,sans-serif;font-size:12px;color:#111}
        table{width:100%;border-collapse:collapse;margin-top:10px}
        th,td{border:1px solid #d1d5db;padding:6px}
        .right{text-align:right}
        .header-wrapper{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px}
        .qr-section{text-align:center;font-size:10px;color:#555}
        .qr-section img{width:110px;height:110px;object-fit:contain;border:1px solid #e5e7eb;padding:4px;border-radius:6px}
    </style>
</head>
<body>
    <div class="header-wrapper">
        <div>
            <h2 style="margin:0 0 6px 0">Payslip</h2>
            <p style="margin:2px 0"><strong>Employee:</strong> {{ $payroll->employee->user->name }} ({{ $payroll->employee->employee_id }})</p>
            <p style="margin:2px 0"><strong>Period:</strong> {{ $payroll->period_start->toDateString() }} to {{ $payroll->period_end->toDateString() }}</p>
            <p style="margin:2px 0"><strong>Status:</strong> {{ ucfirst($payroll->status) }}</p>
            <p style="margin:4px 0"><strong>Net Salary:</strong> ${{ number_format($payroll->net_salary, 2) }}</p>
        </div>
        @if($payroll->employee->bank_qr_path)
        <div class="qr-section">
            <img src="{{ public_path('storage/' . $payroll->employee->bank_qr_path) }}" alt="Bank QR">
            <p style="margin:4px 0 0">Bank QR Code</p>
            <p style="margin:2px 0">Scan to transfer salary</p>
        </div>
        @endif
    </div>

    <table>
        <thead><tr><th>Type</th><th>Description</th><th class="right">Amount</th></tr></thead>
        <tbody>
            @foreach($payroll->items as $item)
                <tr><td>{{ ucfirst($item->type) }}</td><td>{{ $item->label }}</td><td class="right">{{ number_format($item->amount,2) }}</td></tr>
            @endforeach
            <tr><th colspan="2">Net Salary</th><th class="right">{{ number_format($payroll->net_salary,2) }}</th></tr>
        </tbody>
    </table>
</body>
</html>


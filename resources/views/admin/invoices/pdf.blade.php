<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1e293b;
            background: #fff;
            padding: 40px;
        }

        /* ── Header ── */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 24px;
            margin-bottom: 32px;
        }
        .brand-logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            border-radius: 10px;
            display: inline-block;
        }
        .brand-name {
            font-size: 22px;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.5px;
            margin-top: 4px;
        }
        .brand-sub {
            font-size: 10px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .invoice-meta {
            text-align: right;
        }
        .invoice-title {
            font-size: 28px;
            font-weight: 800;
            color: #2563eb;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .invoice-number {
            font-size: 13px;
            color: #475569;
            margin-top: 4px;
        }
        .invoice-date {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }

        /* ── Status Badge ── */
        .badge-paid {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            border-radius: 999px;
            padding: 3px 12px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 6px;
        }

        /* ── Bill To Section ── */
        .billing-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 32px;
            gap: 24px;
        }
        .billing-box {
            flex: 1;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px 20px;
        }
        .billing-label {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #94a3b8;
            margin-bottom: 8px;
        }
        .billing-name {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .billing-detail {
            font-size: 11px;
            color: #475569;
            line-height: 1.6;
        }

        /* ── Items Table ── */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }
        .items-table thead tr {
            background: #1e3a5f;
        }
        .items-table thead th {
            padding: 10px 16px;
            text-align: left;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
        }
        .items-table thead th:last-child { text-align: right; }
        .items-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
        }
        .items-table tbody tr:nth-child(even) {
            background: #f8fafc;
        }
        .items-table tbody td {
            padding: 12px 16px;
            font-size: 12px;
            color: #334155;
        }
        .items-table tbody td:last-child { text-align: right; font-weight: 700; }

        /* ── Totals ── */
        .totals-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 32px;
        }
        .totals-box {
            width: 260px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }
        .totals-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 16px;
            font-size: 12px;
            border-bottom: 1px solid #f1f5f9;
        }
        .totals-row:last-child {
            background: #2563eb;
            border-bottom: none;
        }
        .totals-row:last-child span {
            color: #fff;
            font-weight: 800;
            font-size: 14px;
        }
        .totals-label { color: #64748b; font-weight: 500; }

        /* ── Payment Info ── */
        .payment-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            padding: 16px 20px;
            margin-bottom: 32px;
        }
        .payment-info-label {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #3b82f6;
            margin-bottom: 10px;
        }
        .payment-grid {
            display: flex;
            gap: 32px;
        }
        .payment-item-label { font-size: 10px; color: #64748b; margin-bottom: 2px; }
        .payment-item-value { font-size: 12px; font-weight: 600; color: #1e40af; }

        /* ── Footer ── */
        .footer {
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
            line-height: 1.8;
        }
        .footer strong { color: #475569; }

        /* ── Watermark PAID ── */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 100px;
            font-weight: 900;
            color: rgba(37, 99, 235, 0.05);
            text-transform: uppercase;
            letter-spacing: 10px;
            pointer-events: none;
        }
    </style>
</head>
<body>

    <div class="watermark">PAID</div>

    <!-- Header -->
    <div class="header">
        <div>
            <div class="brand-logo"></div>
            <div class="brand-name" style="margin-top:8px;">Mekong HRM</div>
            <div class="brand-sub">SaaS HR Management Platform</div>
        </div>
        <div class="invoice-meta">
            <div class="invoice-title">Invoice</div>
            <div class="invoice-number"># {{ $invoice->invoice_number }}</div>
            <div class="invoice-date">Issued: {{ $invoice->paid_at->format('d M Y') }}</div>
            <div><span class="badge-paid">✓ Paid</span></div>
        </div>
    </div>

    <!-- Billing Info -->
    <div class="billing-section">
        <div class="billing-box">
            <div class="billing-label">Bill To</div>
            <div class="billing-name">{{ $invoice->company_name }}</div>
            @if($invoice->contact)
                <div class="billing-detail">{{ $invoice->contact }}</div>
            @endif
        </div>
        <div class="billing-box">
            <div class="billing-label">Bill From</div>
            <div class="billing-name">Mekong HRM</div>
            <div class="billing-detail">
                SaaS HR Platform<br>
                support@mekonghrm.com
            </div>
        </div>
        <div class="billing-box">
            <div class="billing-label">Subscription Period</div>
            <div class="billing-name">{{ $invoice->paid_at->format('M d, Y') }}</div>
            <div class="billing-detail">
                to {{ $invoice->valid_until->format('M d, Y') }}<br>
                <span style="color:#16a34a; font-weight:600;">{{ $invoice->months }} {{ $invoice->months == 1 ? 'Month' : 'Months' }}</span>
            </div>
        </div>
    </div>

    <!-- Items Table -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width:40%;">Description</th>
                <th>Plan</th>
                <th>Duration</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>{{ $invoice->plan_name }} Subscription</strong><br>
                    <span style="font-size:10.5px; color:#64748b; margin-top:2px; display:block;">
                        HR Management Platform &mdash; {{ ucfirst($invoice->billing_cycle) }} Plan
                    </span>
                </td>
                <td>{{ $invoice->plan_name }}</td>
                <td>{{ $invoice->months }} {{ $invoice->months == 1 ? 'month' : 'months' }}</td>
                <td>${{ number_format($invoice->amount / $invoice->months, 2) }}/mo</td>
                <td>${{ number_format($invoice->amount, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Totals -->
    <div class="totals-section">
        <div class="totals-box">
            <div class="totals-row">
                <span class="totals-label">Subtotal</span>
                <span>${{ number_format($invoice->amount, 2) }}</span>
            </div>
            <div class="totals-row">
                <span class="totals-label">Tax (0%)</span>
                <span>$0.00</span>
            </div>
            <div class="totals-row">
                <span>Total Amount</span>
                <span>${{ number_format($invoice->amount, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Payment Info -->
    <div class="payment-info">
        <div class="payment-info-label">Payment Details</div>
        <div class="payment-grid">
            <div>
                <div class="payment-item-label">Payment Method</div>
                <div class="payment-item-value">{{ $invoice->payment_method }}</div>
            </div>
            <div>
                <div class="payment-item-label">Payment Date</div>
                <div class="payment-item-value">{{ $invoice->paid_at->format('d M Y') }}</div>
            </div>
            <div>
                <div class="payment-item-label">Status</div>
                <div class="payment-item-value" style="color:#16a34a;">● Paid in Full</div>
            </div>
            <div>
                <div class="payment-item-label">Invoice Number</div>
                <div class="payment-item-value">{{ $invoice->invoice_number }}</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <strong>Thank you for your business!</strong><br>
        This invoice was automatically generated by Mekong HRM &bull; Questions? Contact support@mekonghrm.com<br>
        &copy; {{ now()->year }} Mekong HRM &bull; All rights reserved.
    </div>

</body>
</html>

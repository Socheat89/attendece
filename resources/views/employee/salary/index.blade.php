<x-layouts.employee page-title="ប្រាក់ខែរបស់ខ្ញុំ (My Salary)" :back-url="route('employee.dashboard')">

    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        [x-cloak] { display: none !important; }

        /* Salary Hero */
        .salary-card {
            background: linear-gradient(135deg, var(--brand) 0%, #1e40af 100%);
            border-radius: var(--radius-xl);
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            margin-bottom: 2rem;
        }
        .salary-card::before {
            content: ''; position: absolute; top: -50%; right: -20%;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .salary-label {
            font-size: 0.8rem; font-weight: 600; opacity: 0.9;
            text-transform: uppercase; letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }
        .salary-amount {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem; font-weight: 800;
            line-height: 1; letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }
        .salary-sub { font-size: 0.85rem; opacity: 0.8; }

        /* Listing */
        .list-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1rem;
        }
        .list-title { font-size: 1rem; font-weight: 700; color: var(--ink); }
        .list-count { 
            font-size: 0.75rem; font-weight: 600; 
            padding: 0.2rem 0.6rem; background: var(--surface); 
            border-radius: 50px; color: var(--muted); 
        }

        .payslip-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 1.25rem;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s;
        }
        .payslip-card:hover { transform: translateY(-2px); }

        .payslip-header {
            display: flex; justify-content: space-between; align-items: flex-start;
            margin-bottom: 1rem;
        }
        .payslip-month { font-family: 'Sora'; font-weight: 700; color: var(--ink); font-size: 1.1rem; }
        .payslip-date { font-size: 0.8rem; color: var(--muted); margin-top: 0.2rem; }

        .status-badge {
            font-size: 0.7rem; font-weight: 700;
            padding: 0.3rem 0.7rem; border-radius: 50px;
            text-transform: uppercase;
        }
        .status-paid { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef9c3; color: #a16207; }

        .payslip-body {
            display: flex; justify-content: space-between; align-items: flex-end;
            padding-top: 1rem;
            border-top: 1px solid var(--surface-soft);
        }
        
        .net-label { font-size: 0.75rem; font-weight: 600; color: var(--muted); text-transform: uppercase; }
        .net-amount { font-family: 'Sora'; font-size: 1.4rem; font-weight: 800; color: var(--ink); line-height: 1; margin-top: 0.3rem; }

        .action-btns { display: flex; gap: 0.5rem; }
        .btn-icon-soft {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: var(--surface);
            color: var(--ink);
            display: flex; align-items: center; justify-content: center;
            border: none; cursor: pointer;
            transition: background 0.2s;
        }
        .btn-icon-soft:hover { background: var(--line); }
        .btn-action-primary {
            padding: 0 1rem; height: 36px;
            border-radius: 10px;
            background: var(--ink); color: #fff;
            font-size: 0.8rem; font-weight: 600;
            display: flex; align-items: center; gap: 0.4rem;
            text-decoration: none; border: none;
        }

        /* Modal / Sheet */
        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(2px);
            z-index: 1000;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s;
        }
        .modal-open { opacity: 1; pointer-events: auto; }
        
        .modal-card {
            background: #fff;
            width: 90%; max-width: 400px;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-2xl);
            transform: scale(0.95);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .modal-open .modal-card { transform: scale(1); }

        .modal-header {
            background: var(--surface);
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid var(--line);
        }
        .modal-title { font-family: 'Sora'; font-weight: 700; font-size: 1.1rem; color: var(--ink); }
        
        .detail-list { padding: 1.5rem; }
        .detail-row {
            display: flex; justify-content: space-between;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
        }
        .detail-row span { color: var(--muted); }
        .detail-row strong { color: var(--ink); font-weight: 600; }
        
        .detail-row.total-row {
            margin-top: 1rem; padding-top: 1rem;
            border-top: 1px dashed var(--line);
        }
        .detail-row.total-row span { font-weight: 700; color: var(--ink); }
        .detail-row.total-row strong { color: var(--brand); font-size: 1.1rem; }
    </style>
    
    <div x-data="{ openModal: false, selected: null }">

        <!-- Hero -->
        <div class="salary-card">
            <div class="salary-label">{{ __('Basic Salary') }}</div>
            <div class="salary-amount">${{ number_format($baseSalary, 2) }}</div>
            <div class="salary-sub">មុនពេលកាត់ពន្ធ និងការកាត់រំលស់ (Before taxes & deductions)</div>
        </div>

        <!-- List -->
        <div class="list-header">
            <div class="list-title">{{ __('Payment History') }}</div>
            <div class="list-count">{{ $payrolls->total() }} {{ __('records') }}</div>
        </div>

        <div class="flex flex-col gap-3">
            @forelse($payrolls as $payroll)
                @php
                    // Pre-calculate data for Alpine
                    $modalData = [
                        'month' => $payroll->period_start->format('F Y'),
                        'net' => number_format($payroll->net_salary, 2),
                        'bonus' => number_format($payroll->bonus, 2),
                        'deductions' => number_format($payroll->other_deduction, 2),
                        'items' => $payroll->items->map(fn($i) => ['label'=>$i->label, 'amount'=>number_format($i->amount, 2)])
                    ];
                @endphp
                <div class="payslip-card">
                    <div class="payslip-header">
                        <div>
                            <div class="payslip-month">{{ $payroll->period_start->format('F Y') }}</div>
                            <div class="payslip-date">កំឡុងពេល (Period): {{ $payroll->period_start->format('d') }} - {{ $payroll->period_end->format('d M') }}</div>
                        </div>
                        <div class="status-badge {{ $payroll->status === 'paid' ? 'status-paid' : 'status-pending' }}">
                            {{ $payroll->status }}
                        </div>
                    </div>
                    
                    <div class="payslip-body">
                        <div>
                            <div class="net-label">{{ __('Net Salary') }}</div>
                            <div class="net-amount">${{ number_format($payroll->net_salary, 2) }}</div>
                        </div>
                        <div class="action-btns">
                            <button class="btn-icon-soft" @click="selected = {{ json_encode($modalData) }}; openModal = true">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <a href="{{ route('employee.salary.download', $payroll) }}" class="btn-action-primary">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                PDF
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align:center; padding:3rem 1rem; color:var(--muted)">{{ __('No payment records found.') }}</div>
            @endforelse
            
            <div class="mt-3">{{ $payrolls->links() }}</div>
        </div>

        <!-- Modal -->
        <div class="modal-overlay" :class="openModal && 'modal-open'" @click.self="openModal = false">
            <div class="modal-card" x-show="openModal" @click.away="openModal = false">
                <template x-if="selected">
                    <div>
                        <div class="modal-header">
                            <div class="modal-title" x-text="selected.month + ' ប័ណ្ណបើកប្រាក់ខែ (Payslip)'"></div>
                        </div>
                        <div class="detail-list">
                            <!-- Items -->
                            <template x-for="item in selected.items">
                                <div class="detail-row">
                                    <span x-text="item.label"></span>
                                    <strong x-text="'$' + item.amount"></strong>
                                </div>
                            </template>
                            
                            <div class="detail-row">
                                <span>{{ __('Allowances') }}</span>
                                <strong x-text="'$' + selected.bonus"></strong>
                            </div>
                            <div class="detail-row">
                                <span>{{ __('Deductions') }}</span>
                                <strong class="text-danger" x-text="'-$' + selected.deductions"></strong>
                            </div>
                            
                            <div class="detail-row total-row">
                                <span>{{ __('Net Salary') }}</span>
                                <strong x-text="'$' + selected.net"></strong>
                            </div>
                            
                            <button class="btn-submit mt-4" @click="openModal = false">{{ __('Close') }}</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>

</x-layouts.employee>
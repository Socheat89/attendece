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
            <div class="salary-sub">មុនពេលកាត់ពន្ធ និងការកាត់រំលស់ (Before taxes &amp; deductions)</div>
        </div>

        {{-- Bank QR Upload Card --}}
        @php $empQr = auth()->user()->employee?->bank_qr_path; @endphp
        <div style="background:#fff; border:1px solid var(--line); border-radius:var(--radius-lg); padding:1.25rem; margin-bottom:1.5rem; box-shadow:var(--shadow-sm);">
            <div style="font-weight:700; font-size:0.95rem; color:var(--ink); margin-bottom:0.75rem; display:flex; align-items:center; gap:0.5rem;">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                {{ __('Bank QR Code') }}
                <span style="font-size:0.7rem; font-weight:400; color:var(--muted); margin-left:0.25rem;">(QR ធនាគាររបស់ខ្ញុំ)</span>
            </div>

            @if(session('status'))
                <div style="background:#dcfce7; color:#166534; border-radius:8px; padding:0.6rem 0.9rem; margin-bottom:0.75rem; font-size:0.82rem; font-weight:600;">
                    ✓ {{ session('status') }}
                </div>
            @endif

            @if($empQr)
                <div style="display:flex; align-items:flex-start; gap:1rem; flex-wrap:wrap; margin-bottom:1rem;">
                    <div style="border:1px solid var(--line); border-radius:12px; padding:0.5rem; background:var(--surface);">
                        <img src="{{ asset('storage/' . $empQr) }}" alt="Bank QR" style="width:100px; height:100px; object-fit:contain; border-radius:8px; display:block;">
                    </div>
                    <div style="flex:1; min-width:120px;">
                        <p style="margin:0 0 0.4rem; font-size:0.82rem; color:#16a34a; font-weight:600;">✓ {{ __('QR Code uploaded') }}</p>
                        <p style="margin:0 0 0.75rem; font-size:0.75rem; color:var(--muted);">Upload image ថ្មីខាងក្រោម ដើម្បីប្ដូរ ឬ លុបចេញ។</p>
                        <form method="POST" action="{{ route('employee.bank-qr.destroy') }}" onsubmit="return confirm('លុប QR Code?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#ef4444; font-size:0.8rem; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:0.3rem; padding:0;">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                {{ __('Remove QR') }}
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <p style="font-size:0.8rem; color:var(--muted); margin-bottom:0.75rem;">មិន​ទាន់​មាន QR Code ធនាគារ — Upload ខ្លួនឯងបាន!</p>
            @endif

            <form method="POST" action="{{ route('employee.bank-qr.update') }}" enctype="multipart/form-data">
                @csrf
                <label style="display:block; font-size:0.78rem; font-weight:600; color:var(--muted); margin-bottom:0.4rem; text-transform:uppercase; letter-spacing:0.04em;">
                    {{ $empQr ? __('Replace QR Image') : __('Upload QR Image') }}
                </label>
                <div style="display:flex; gap:0.6rem; align-items:center; flex-wrap:wrap;">
                    <input type="file" name="bank_qr_image" accept="image/*" required
                           style="flex:1; min-width:180px; font-size:0.82rem; border:1px solid var(--line); border-radius:8px; padding:0.4rem 0.5rem; color:var(--muted);">
                    <button type="submit" class="btn-submit" style="white-space:nowrap; padding:0.55rem 1.1rem; font-size:0.82rem;">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:inline; vertical-align:middle; margin-right:0.3rem;"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        {{ __('Upload') }}
                    </button>
                </div>
                @error('bank_qr_image')
                    <p style="color:#ef4444; font-size:0.78rem; margin-top:0.4rem;">{{ $message }}</p>
                @enderror
            </form>
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
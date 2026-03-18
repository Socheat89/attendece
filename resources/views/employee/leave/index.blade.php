<x-layouts.employee page-title="សំណើ (Requests)" :back-url="route('employee.dashboard')">

    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        [x-cloak] { display: none !important; }

        /* Segmented Control */
        .segmented-control {
            display: flex;
            background: var(--surface);
            padding: 4px;
            border-radius: var(--radius-lg);
            margin-bottom: 1.5rem;
            position: relative;
            border: 1px solid var(--line);
        }
        
        .segment-btn {
            flex: 1;
            text-align: center;
            padding: 0.6rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
            border-radius: var(--radius-md);
            transition: all 0.2s;
            position: relative;
            z-index: 2;
        }
        
        .segment-btn.active {
            background: #fff;
            color: var(--brand);
            box-shadow: var(--shadow-sm);
            font-weight: 700;
        }

        /* Action Bar */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .section-label {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--ink);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .btn-new {
            background: var(--brand);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex; align-items: center; gap: 0.4rem;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-new:active { transform: scale(0.96); }
        .btn-cancel {
            background: var(--surface);
            color: var(--muted);
        }

        /* Forms */
        .form-card {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            border: 1px solid var(--line);
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            animation: slideDown 0.3s ease-out;
        }
        @keyframes slideDown { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }

        .form-group { margin-bottom: 1.25rem; }
        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--ink);
        }
        
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--line);
            background: var(--surface-light);
            font-size: 0.95rem;
            color: var(--ink);
            transition: border-color 0.2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--brand);
            background: #fff;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: var(--brand);
            color: #fff;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 12px var(--brand-light);
        }

        /* History List */
        .history-list { display: flex; flex-direction: column; gap: 0.75rem; }
        
        .history-card {
            background: #fff;
            padding: 1rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform 0.2s;
        }
        .history-card:hover { transform: translateY(-2px); }

        .type-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: var(--surface);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            color: var(--muted);
            flex-shrink: 0;
        }
        
        .req-info { flex: 1; }
        .req-title { font-weight: 700; color: var(--ink); font-size: 0.95rem; margin-bottom: 0.2rem; }
        .req-date { font-size: 0.8rem; color: var(--muted); }
        
        .status-badge {
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            text-transform: uppercase;
        }
        .status-pending { background: #fff7ed; color: #c2410c; border: 1px solid #ffedd5; }
        .status-approved { background: #effdf5; color: #15803d; border: 1px solid #dcfce7; }
        .status-rejected { background: #fef2f2; color: #b91c1c; border: 1px solid #fee2e2; }

    </style>

    <div x-data="{ tab: 'leave', showForm: false }" class="pb-5">

        <!-- Tabs -->
        <div class="segmented-control">
            <div class="segment-btn" :class="tab==='leave' && 'active'" @click="tab='leave'; showForm=false">{{ __('Leave') }}</div>
            <div class="segment-btn" :class="tab==='ot' && 'active'" @click="tab='ot'; showForm=false">{{ __('Overtime') }}</div>
            <div class="segment-btn" :class="tab==='dayoff' && 'active'" @click="tab='dayoff'; showForm=false">{{ __('Change Dayoff') }}</div>
        </div>

        <!-- Toolbar -->
        <div class="action-bar">
            <div class="section-label" x-text="showForm ? 'សំណើថ្មី (New Request)' : 'ប្រវត្តិថ្មីៗ (Recent History)'"></div>
            <button class="btn-new" :class="showForm ? 'btn-cancel' : ''" @click="showForm = !showForm">
                <span x-text="showForm ? 'បោះបង់ (Cancel)' : 'សំណើថ្មី (New Request)'"></span>
                <span x-show="!showForm">+</span>
            </button>
        </div>

        <!-- Forms -->
        <div x-show="showForm" x-transition>
            
            <!-- Leave Form -->
            <div x-show="tab === 'leave'" class="form-card">
                <form method="POST" enctype="multipart/form-data" action="{{ route('employee.leave.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{ __('Leave Type') }}</label>
                        <select name="leave_type_id" class="form-select" required>
                            <option value="">ជ្រើសរើសប្រភេទ (Select Type...)</option>
                            @foreach($leaveTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full flex gap-4">
                        <div class="flex-1 form-group">
                            <label class="form-label">{{ __('From') }}</label>
                            <input type="date" name="start_date" class="form-input" required>
                        </div>
                        <div class="flex-1 form-group">
                            <label class="form-label">{{ __('To') }}</label>
                            <input type="date" name="end_date" class="form-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Reason') }}</label>
                        <textarea name="reason" class="form-textarea" rows="3" placeholder="មូលហេតុនៃការសុំច្បាប់... (Reason for leave...)"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">{{ __('Submit') }}</button>
                </form>
            </div>

            <!-- OT Form -->
            <div x-show="tab === 'ot'" class="form-card">
                <form method="POST" action="{{ route('employee.overtime.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">កាលបរិច្ឆេទ (Date)</label>
                        <input type="date" name="ot_date" class="form-input" required>
                    </div>
                    <div class="w-full flex gap-4">
                        <div class="flex-1 form-group">
                            <label class="form-label">ម៉ោងចាប់ផ្តើម (Start Time)</label>
                            <input type="time" name="start_time" class="form-input" required>
                        </div>
                        <div class="flex-1 form-group">
                            <label class="form-label">ម៉ោងបញ្ចប់ (End Time)</label>
                            <input type="time" name="end_time" class="form-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">ការងារ / មូលហេតុ (Task / Reason)</label>
                        <textarea name="reason" class="form-textarea" rows="3" placeholder="ការពិពណ៌នាការងារ... (Work description...)"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">បញ្ជូនសំណើថែមម៉ោង (Submit OT)</button>
                </form>
            </div>

            <!-- Day Off Form -->
            <div x-show="tab === 'dayoff'" class="form-card">
                <form method="POST" action="{{ route('employee.changedayoff.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">ថ្ងៃសម្រាកបច្ចុប្បន្ន (Current Day Off)</label>
                        <input type="date" name="original_date" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">កាលបរិច្ឆេទថ្មី (New Date)</label>
                        <input type="date" name="requested_date" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">មូលហេតុ (Reason)</label>
                        <textarea name="reason" class="form-textarea" rows="3" placeholder="មូលហេតុនៃការផ្លាស់ប្តូរ... (Reason for change...)"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">បញ្ជូនការផ្លាស់ប្តូរ (Submit Change)</button>
                </form>
            </div>

        </div>

        <!-- History Lists -->
        <div x-show="!showForm" class="history-list">
            
            <!-- Leave List -->
            <template x-if="tab === 'leave'">
                <div class="flex flex-col gap-3">
                    @forelse($leaveRequests as $leave)
                        <div class="history-card">
                            <div class="type-icon" style="color:var(--brand); background:var(--brand-light)">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/></svg>
                            </div>
                            <div class="req-info">
                                <div class="req-title">{{ $leave->leaveType->name }}</div>
                                <div class="req-date">{{ $leave->start_date->format('M d') }} - {{ $leave->end_date->format('M d, Y') }}</div>
                            </div>
                            <div class="status-badge status-{{ strtolower($leave->status) }}">{{ $leave->status }}</div>
                        </div>
                    @empty
                        <div style="text-align:center; padding:3rem 1rem; color:var(--muted)">{{ __('No requests found.') }}</div>
                    @endforelse
                    <div class="mt-3">{{ $leaveRequests->links() }}</div>
                </div>
            </template>
            
            <!-- OT List -->
            <template x-if="tab === 'ot'">
                <div class="flex flex-col gap-3">
                    @forelse($otRequests as $ot)
                        <div class="history-card">
                            <div class="type-icon" style="color:#d97706; background:#fef3c7">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                            </div>
                            <div class="req-info">
                                <div class="req-title">Overtime</div>
                                <div class="req-date">{{ \Carbon\Carbon::parse($ot->ot_date)->format('M d, Y') }} • {{ number_format($ot->total_hours, 1) }} hrs</div>
                            </div>
                            <div class="status-badge status-{{ strtolower($ot->status) }}">{{ $ot->status }}</div>
                        </div>
                    @empty
                        <div style="text-align:center; padding:3rem 1rem; color:var(--muted)">{{ __('No requests found.') }}</div>
                    @endforelse
                    <div class="mt-3">{{ $otRequests->links() }}</div>
                </div>
            </template>

            <!-- Day Off List -->
            <template x-if="tab === 'dayoff'">
                <div class="flex flex-col gap-3">
                    @forelse($dayoffRequests as $req)
                        <div class="history-card">
                            <div class="type-icon" style="color:#9333ea; background:#f3e8ff">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                            </div>
                            <div class="req-info">
                                <div class="req-title">Day Off Change</div>
                                <div class="req-date">
                                    <span style="text-decoration:line-through; opacity:0.6">{{ \Carbon\Carbon::parse($req->original_date)->format('M d') }}</span>
                                    → {{ \Carbon\Carbon::parse($req->requested_date)->format('M d') }}
                                </div>
                            </div>
                            <div class="status-badge status-{{ strtolower($req->status) }}">{{ $req->status }}</div>
                        </div>
                    @empty
                        <div style="text-align:center; padding:3rem 1rem; color:var(--muted)">{{ __('No requests found.') }}</div>
                    @endforelse
                    <div class="mt-3">{{ $dayoffRequests->links() }}</div>
                </div>
            </template>

        </div>

    </div>

</x-layouts.employee>
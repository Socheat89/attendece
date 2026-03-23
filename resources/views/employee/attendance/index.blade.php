<x-layouts.employee page-title="វត្តមាន (Attendance)" :back-url="route('employee.dashboard')">

    <style>
        .month-selector {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 1rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            border: 1px solid var(--line);
        }
        
        .month-nav-btn {
            background: var(--surface);
            border: none;
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--ink);
            cursor: pointer;
        }
        
        .current-month {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            color: var(--ink);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #fff;
            padding: 1rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--line);
            text-align: center;
        }
        
        .stat-value {
            font-family: 'Sora', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.2;
        }
        .stat-label {
            font-size: 0.75rem;
            color: var(--muted);
            font-weight: 600;
            margin-top: 0.25rem;
        }

        /* Calendar */
        .calendar-container {
            background: #fff;
            border-radius: var(--radius-xl);
            padding: 1rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--line);
            overflow: hidden;
        }
        
        .weekdays-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .weekday-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--muted);
            text-transform: uppercase;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
        }
        
        .day-cell {
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
            border: 1px solid transparent;
        }
        
        .day-cell.empty { background: transparent; cursor: default; }
        
        /* Status Colors */
        .status-present { background: #dcfce7; color: #166534; }
        .status-late    { background: #fef9c3; color: #a16207; }
        .status-absent  { background: #fee2e2; color: #991b1b; }
        .status-leave   { background: #dbeafe; color: #1e40af; }
        .status-holiday { background: #f3e8ff; color: #6b21a8; }
        .status-none    { background: var(--surface); color: var(--muted); }
        
        .day-cell.today {
            border-color: var(--brand);
            box-shadow: 0 0 0 2px var(--brand-light);
        }

        .status-dot {
            width: 4px; height: 4px; border-radius: 50%;
            margin-top: 2px;
            background: currentColor;
            opacity: 0.7;
        }

        /* Bottom Sheet */
        .sheet-overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1060;
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s;
            backdrop-filter: blur(2px);
        }
        .sheet-container {
            position: fixed; left: 0; right: 0; bottom: 0;
            background: #fff;
            border-radius: 24px 24px 0 0;
            z-index: 1061;
            transform: translateY(100%);
            transition: transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            max-height: 85vh;
            display: flex; flex-direction: column;
        }
        
        .sheet-open .sheet-overlay { opacity: 1; pointer-events: auto; }
        .sheet-open .sheet-container { transform: translateY(0); }
        
        .sheet-header {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid var(--line);
        }
        .sheet-handle {
            width: 40px; height: 4px; background: var(--line);
            border-radius: 10px; margin: 0 auto 1rem;
        }
        .sheet-date { font-family: 'Sora'; font-size: 1.25rem; font-weight: 700; color: var(--ink); }
        .sheet-status { 
            display: inline-block; padding: 0.25rem 0.75rem; 
            border-radius: 50px; font-size: 0.8rem; font-weight: 600; 
            margin-top: 0.5rem;
        }

        .sheet-body { padding: 1.5rem; padding-bottom: calc(1.5rem + env(safe-area-inset-bottom)); overflow-y: auto; }
        
        .detail-row {
            display: flex; justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .detail-label { color: var(--muted); }
        .detail-val { font-weight: 600; color: var(--ink); }

        .timeline-item {
            display: flex; gap: 1rem;
            padding-bottom: 1.5rem;
            position: relative;
        }
        .timeline-item::before {
            content: ''; position: absolute; left: 7px; top: 24px; bottom: 0;
            width: 2px; background: var(--line);
        }
        .timeline-item:last-child::before { display: none; }
        
        .timeline-dot {
            width: 16px; height: 16px; border-radius: 50%;
            background: var(--brand);
            flex-shrink: 0; margin-top: 4px;
            border: 2px solid #fff; box-shadow: 0 0 0 2px var(--line);
        }
        .timeline-dot.out { background: var(--muted); }
        
        .timeline-content h4 { margin: 0; font-size: 0.95rem; font-weight: 600; color: var(--ink); }
        .timeline-content p { margin: 0; font-size: 0.8rem; color: var(--muted); }
    </style>

    @php
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m', $month);
        $prevMonth = $currentDate->copy()->subMonth()->format('Y-m');
        $nextMonth = $currentDate->copy()->addMonth()->format('Y-m');
        $isFuture = $currentDate->isFuture();
    @endphp

    <!-- Month Selector -->
    <div class="month-selector">
        <a href="?month={{ $prevMonth }}" class="month-nav-btn">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <div class="current-month">{{ $currentDate->format('F Y') }}</div>
        @if(!$isFuture)
        <a href="?month={{ $nextMonth }}" class="month-nav-btn">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
        @else
        <div class="month-nav-btn" style="opacity:0.3; cursor:default">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </div>
        @endif
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-value" style="color:var(--success)">{{ $summary['present'] ?? 0 }}</div>
            <div class="stat-label">{{ __('Present') }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" style="color:var(--warning)">{{ $summary['late'] ?? 0 }}</div>
            <div class="stat-label">{{ __('Late') }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" style="color:var(--danger)">{{ $summary['absent'] ?? 0 }}</div>
            <div class="stat-label">{{ __('Absent') }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" style="color:var(--info)">{{ $summary['leave'] ?? 0 }}</div>
            <div class="stat-label">{{ __('Leave') }}</div>
        </div>
    </div>

    <!-- Calendar -->
    <div class="calendar-container">
        <div class="weekdays-grid">
            <div class="weekday-label">Sun</div>
            <div class="weekday-label">Mon</div>
            <div class="weekday-label">Tue</div>
            <div class="weekday-label">Wed</div>
            <div class="weekday-label">Thu</div>
            <div class="weekday-label">Fri</div>
            <div class="weekday-label">Sat</div>
        </div>
        
        <div class="days-grid">
            @php
                $start = $currentDate->copy()->startOfMonth();
                $end = $currentDate->copy()->endOfMonth();
                $firstDayOfWeek = $start->dayOfWeek;
                $daysInMonth = $start->daysInMonth;
                $todayDate = now()->toDateString();
            @endphp
            
            @for($i = 0; $i < $firstDayOfWeek; $i++)
                <div class="day-cell empty"></div>
            @endfor

            @for($d = 1; $d <= $daysInMonth; $d++)
                @php
                    $thisDate = $start->copy()->day($d)->toDateString();
                    $data = $calendarData[$thisDate] ?? [];
                    $status = $data['status'] ?? ($thisDate <= $todayDate ? 'absent' : 'none');
                    if($thisDate > $todayDate) $status = 'none';
                    
                    $statusClass = match($status) {
                        'present' => 'status-present',
                        'late' => 'status-late',
                        'absent' => 'status-absent',
                        'leave' => 'status-leave',
                        'holiday' => 'status-holiday',
                        default => 'status-none'
                    };
                    
                    $isToday = ($thisDate === $todayDate);
                    $lateMinutes = $data['late_minutes'] ?? 0;
                @endphp
                
                <div class="day-cell {{ $statusClass }} {{ $isToday ? 'today' : '' }}" 
                     onclick="openSheet('{{ $thisDate }}', '{{ $status }}', '{{ json_encode($data['scans'] ?? []) }}', {{ $lateMinutes }})">
                    <span>{{ $d }}</span>
                    @if($status !== 'none' && $status !== 'absent')
                        <div class="status-dot"></div>
                    @endif
                </div>
            @endfor
        </div>
    </div>
    
    <div style="text-align:center; margin-top:1.5rem">
        <a href="{{ route('employee.attendance.export', ['month' => $month]) }}" class="btn-secondary" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.6rem 1.2rem; border-radius:50px; font-size:0.9rem; font-weight:600; text-decoration:none;">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z"/></svg>
            {{ __('Download Report') }}
        </a>
    </div>

    <!-- Bottom Sheet -->
    <div class="sheet-overlay" id="sheetOverlay" onclick="closeSheet()"></div>
    <div class="sheet-container" id="sheetContainer">
        <div class="sheet-header">
            <div class="sheet-handle"></div>
            <div class="sheet-date" id="sheetDate">October 24, 2023</div>
            <div class="sheet-status" id="sheetStatus">Present</div>
        </div>
        <div class="sheet-body">
            <div id="sheetContent">
                <!-- Timeline populated by JS -->
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const overlay = document.getElementById('sheetOverlay');
        const container = document.getElementById('sheetContainer');
        if (overlay && container) {
            document.body.appendChild(overlay);
            document.body.appendChild(container);
        }
    });

    function openSheet(dateStr, status, scansJson, lateMin = 0) {
        const date = new Date(dateStr);
        document.getElementById('sheetDate').textContent = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
        
        const statusEl = document.getElementById('sheetStatus');
        
        let color = '#64748b'; let bg = '#f1f5f9'; let label = status.charAt(0).toUpperCase() + status.slice(1);
        
        if (status === 'present') { 
            color = '#166534'; bg = '#dcfce7'; 
        } else if (status === 'late') { 
            color = '#a16207'; bg = '#fef9c3'; 
        } else if (status === 'absent') { 
            color = '#991b1b'; bg = '#fee2e2'; 
        } else if (status === 'leave') { 
            color = '#1e40af'; bg = '#dbeafe'; 
        }
        
        statusEl.textContent = label;
        statusEl.style.color = color;
        statusEl.style.background = bg;
        
        const scans = JSON.parse(scansJson);
        const content = document.getElementById('sheetContent');
        content.innerHTML = '';
        
        const scanTypes = {
            'Morning In': scans['Morning In'] || null,
            'Lunch Out': scans['Lunch Out'] || null,
            'Lunch In': scans['Lunch In'] || null,
            'Evening Out': scans['Evening Out'] || null
        };
        
        let hasData = false;
        
        for (const [scanLabel, time] of Object.entries(scanTypes)) {
            if(time) {
                hasData = true;
                const isOut = scanLabel.includes('Out');
                
                let extraTag = '';
                if (scanLabel === 'Morning In') {
                    if (status === 'late') {
                        extraTag = `<span style="margin-left:6px; font-size:0.65rem; padding:2px 8px; border-radius:12px; background:#fef9c3; color:#a16207; font-weight:700;">Late (${lateMin}m)</span>`;
                    } else if (status === 'present') {
                        extraTag = `<span style="margin-left:6px; font-size:0.65rem; padding:2px 8px; border-radius:12px; background:#dcfce7; color:#166534; font-weight:700;">Good</span>`;
                    }
                }

                const html = `
                    <div class="timeline-item">
                        <div class="timeline-dot ${isOut ? 'out' : ''}"></div>
                        <div class="timeline-content">
                            <h4>${scanLabel}${extraTag}</h4>
                            <p>${time}</p>
                        </div>
                    </div>
                `;
                content.insertAdjacentHTML('beforeend', html);
            }
        }
        
                if (!hasData) {
            content.innerHTML = '<div style="text-align:center; color:var(--muted); padding:2rem;">' + '{{ __('No scan records found.') }}' + '</div>';
        }
        
        document.body.classList.add('sheet-open');
    }
    
    function closeSheet() {
        document.body.classList.remove('sheet-open');
    }
    </script>

</x-layouts.employee>
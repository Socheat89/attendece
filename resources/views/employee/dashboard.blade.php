<x-layouts.employee page-title="Dashboard" :showPageBanner="false">
    @php
        $statusColors = [
            'Present'  => ['bg'=>'#ecfdf5', 'text'=>'#059669', 'border'=>'#d1fae5', 'icon'=>'check-circle'],
            'Late'     => ['bg'=>'#fffbeb', 'text'=>'#d97706', 'border'=>'#fde68a', 'icon'=>'clock'],
            'Absent'   => ['bg'=>'#fef2f2', 'text'=>'#dc2626', 'border'=>'#fecaca', 'icon'=>'x-circle'],
            'On Leave' => ['bg'=>'#eff6ff', 'text'=>'#2563eb', 'border'=>'#bfdbfe', 'icon'=>'calendar'],
        ];
        $s = $statusColors[$todayStatus] ?? ['bg'=>'#f1f5f9', 'text'=>'#475569', 'border'=>'#e2e8f0', 'icon'=>'help-circle'];
        
        $greeting = (now()->hour < 12 ? __('Good Morning') : (now()->hour < 18 ? __('Good Afternoon') : __('Good Evening')));
    @endphp

    <style>
        .hero-section {
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            border-radius: var(--radius-xl);
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            margin-bottom: 1.5rem;
        }
        
        .hero-pattern {
            position: absolute;
            top: 0; right: 0; bottom: 0; left: 0;
            background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.6;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-card {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 1rem;
            border: 1px solid var(--line);
            box-shadow: var(--shadow-soft);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.2s;
        }
        .stat-card:active { transform: scale(0.98); }
        
        .stat-value { font-size: 1.5rem; font-weight: 800; font-family: 'Sora', sans-serif; line-height: 1.2; }
        .stat-label { font-size: 0.7rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.25rem; }
        
        .section-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .action-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .action-item {
            background: #fff;
            padding: 1rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: var(--ink);
            transition: border-color 0.2s;
        }
        .action-item:active { background: var(--surface-soft); }

        .action-icon {
            width: 42px; height: 42px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .timeline-container {
            position: relative;
            padding-left: 1.5rem;
        }
        .timeline-container::before {
            content: '';
            position: absolute;
            left: 7px; top: 10px; bottom: 10px;
            width: 2px; background: var(--line);
            border-radius: 2px;
        }
        .timeline-item {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .timeline-dot {
            position: absolute;
            left: -1.5rem; top: 0.25rem;
            width: 16px; height: 16px;
            border-radius: 50%;
            background: #fff;
            border: 3px solid var(--muted);
            z-index: 1;
        }
        .timeline-dot.active { border-color: var(--brand); box-shadow: 0 0 0 3px var(--brand-light); }
    </style>

    <!-- Welcome / Status Card -->
    <div class="hero-section">
        <div class="hero-pattern"></div>
        <div style="position:relative; z-index:2;">
            <div style="display:flex; justify-content:space-between; align-items:start;">
                <div>
                    <p style="margin:0; font-size:0.85rem; opacity:0.9;">{{ $greeting }}, {{ auth()->user()->first_name }}</p>
                    <h1 style="margin:0.25rem 0 0.5rem; font-size:1.75rem; font-weight:800; font-family:'Sora',sans-serif;">{{ __($todayStatus) }}</h1>
                    <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.8rem; opacity:0.8;">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ now()->format('l, M jS') }}
                    </div>
                </div>
                
                @if($todayStatus !== 'Present' && $todayStatus !== 'On Leave')
                <a href="{{ route('employee.attendance.scan') }}" style="background:white; color:var(--brand); border:none; padding:0.6rem 1rem; border-radius:var(--radius-md); font-weight:700; font-size:0.85rem; text-decoration:none; display:inline-flex; align-items:center; gap:0.5rem; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                    {{ __('Scan') }}
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stat-grid">
        <div class="stat-card">
            <span class="stat-value" style="color:var(--success)">{{ $presentDays }}</span>
            <span class="stat-label">{{ __('Present') }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-value" style="color:var(--warning)">{{ $lateDays }}</span>
            <span class="stat-label">{{ __('Late') }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-value" style="color:var(--danger)">{{ $absentDays }}</span>
            <span class="stat-label">{{ __('Absent') }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-value" style="color:var(--info)">{{ $leaveTaken }}</span>
            <span class="stat-label">{{ __('On Leave') }}</span>
        </div>
    </div>

    <!-- Quick Actions -->
    <h3 class="section-title">{{ __('Quick Actions') }}</h3>
    <div class="action-list">
        <a href="{{ route('employee.leave.index') }}" class="action-item">
            <div class="action-icon" style="background:var(--warning-bg); color:var(--warning);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div style="flex:1;">
                <div style="font-weight:600; font-size:0.95rem;">{{ __('Request Leave') }}</div>
                <div style="font-size:0.75rem; color:var(--muted);">{{ __('Create new leave or dayoff requests.') }}</div>
            </div>
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:var(--line)"><path d="M9 5l7 7-7 7"/></svg>
        </a>

        <a href="{{ route('employee.attendance.index') }}" class="action-item">
            <div class="action-icon" style="background:var(--info-bg); color:var(--info);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div style="flex:1;">
                <div style="font-weight:600; font-size:0.95rem;">{{ __('Attendance History') }}</div>
                <div style="font-size:0.75rem; color:var(--muted);">{{ __('Review calendar activity and logs.') }}</div>
            </div>
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:var(--line)"><path d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    <!-- Today's Activity -->
    <div class="card">
        <div class="section-title" style="margin-bottom:1.25rem;">
            <span>{{ __("Today's Activity") }}</span>
            <span style="font-size:0.75rem; color:var(--muted); font-weight:400;">{{ now()->format('H:i') }}</span>
        </div>
        
        <div class="timeline-container">
            @php 
                $scannedLogs = collect($timelineLogs ?? [])->filter(fn($l) => $l['scanned']); 
            @endphp
            
            @forelse($scannedLogs as $log)
                <div class="timeline-item">
                    <div class="timeline-dot active"></div>
                    <div style="font-weight:600; font-size:0.9rem; color:var(--ink);">{{ $log['label'] }}</div>
                    <div style="font-size:0.75rem; color:var(--muted);">{{ $log['time'] }}</div>
                </div>
            @empty
                <div style="text-align:center; padding:1rem 0; color:var(--muted); font-size:0.85rem;">
                    {{ __('No activity recorded yet for today.') }}
                </div>
            @endforelse
            
            @if($scannedLogs->count() > 0 && $scannedLogs->count() < 4)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div style="font-weight:500; font-size:0.9rem; color:var(--muted);">{{ __('Next Scan') }}</div>
                    <div style="font-size:0.75rem; color:var(--muted);">{{ __('Upcoming') }}</div>
                </div>
            @endif
        </div>
    </div>

</x-layouts.employee>
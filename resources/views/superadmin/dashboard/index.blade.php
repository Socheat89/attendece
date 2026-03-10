@extends('superadmin.layouts.app')

@section('header')
    <div class="flex flex-col pt-2">
        <h2 class="font-extrabold text-3xl text-[#0F172A] tracking-[-0.02em] leading-tight flex items-center gap-2">
            Welcome back, System Admin
        </h2>
        <p class="text-slate-500 text-sm mt-1 flex items-center gap-2">
            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
            Here is your daily snapshot of all platform tenants.
        </p>
    </div>
@endsection

@section('content')

<!-- Main Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- Total Tenants Widget -->
    <div class="premium-card p-6 flex items-start justify-between relative overflow-hidden group">
        <!-- Background decoration -->
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-blue-500/5 rounded-full blur-2xl group-hover:bg-blue-500/10 transition-colors"></div>
        
        <div>
            <div class="flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.6)]"></span>
                <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Tenants</h3>
            </div>
            <div class="flex items-baseline gap-3">
                <p class="text-5xl font-extrabold tracking-tight text-[#0F172A]">{{ $companiesCount }}</p>
                @if($companiesGrowth >= 0)
                <div class="flex items-center text-emerald-500 text-sm font-semibold bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-100" title="Compared to last month">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +{{ number_format($companiesGrowth, 1) }}%
                </div>
                @else
                <div class="flex items-center text-rose-500 text-sm font-semibold bg-rose-50 px-2 py-0.5 rounded-md border border-rose-100" title="Compared to last month">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path></svg>
                    {{ number_format($companiesGrowth, 1) }}%
                </div>
                @endif
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                <span class="text-xs text-slate-400 font-medium">Platform instances</span>
                <a href="{{ route('superadmin.companies.index') }}" class="text-blue-600 hover:text-blue-700 text-xs font-bold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    View Registry &rightarrow;
                </a>
            </div>
        </div>
        <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center border border-blue-100 shadow-sm z-10">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        </div>
    </div>

    <!-- Active Subscriptions -->
    <div class="premium-card p-6 flex items-start justify-between relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition-colors"></div>
        <div>
            <div class="flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)] animate-pulse"></span>
                <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest">Active Plans</h3>
            </div>
            <div class="flex items-baseline gap-3">
                <p class="text-5xl font-extrabold tracking-tight text-[#0F172A]">{{ $activeCompaniesCount }}</p>
                <div class="text-slate-400 text-sm font-medium">/ {{ $companiesCount }}</div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                <span class="text-xs text-slate-400 font-medium">Paying customers</span>
                <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $companiesCount > 0 ? ($activeCompaniesCount/$companiesCount)*100 : 0 }}%"></div>
                </div>
            </div>
        </div>
        <div class="w-14 h-14 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center border border-emerald-100 shadow-sm z-10">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
    </div>

    <!-- Total End Users -->
    <div class="premium-card p-6 flex items-start justify-between relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-32 h-32 bg-purple-500/5 rounded-full blur-2xl group-hover:bg-purple-500/10 transition-colors"></div>
        <div>
            <div class="flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-purple-500 shadow-[0_0_8px_rgba(168,85,247,0.6)]"></span>
                <h3 class="text-slate-500 text-xs font-bold uppercase tracking-widest">Global Users</h3>
            </div>
            <div class="flex items-baseline gap-3">
                <p class="text-5xl font-extrabold tracking-tight text-[#0F172A]">{{ $totalUsers }}</p>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                <span class="text-xs text-slate-400 font-medium">Across all tenants</span>
                <div class="flex -space-x-2">
                    @php $colors = ['indigo', 'pink', 'emerald']; @endphp
                    @foreach($recentUsers as $index => $user)
                        <div class="w-6 h-6 rounded-full bg-{{ $colors[$index % 3] }}-100 border-2 border-white flex justify-center items-center text-[10px] font-bold text-{{ $colors[$index % 3] }}-700" title="{{ $user->name }}">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center border border-purple-100 shadow-sm z-10">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
    </div>

</div>

<!-- Second Row -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Platform Banner -->
    <div class="lg:col-span-2">
        <div class="rounded-2xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 shadow-xl p-1 overflow-hidden relative">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0id2hpdGUiIG9wYWNpdHk9IjAuMiIvPjwvc3ZnPg==')] opacity-30"></div>
            
            <div class="bg-gradient-to-r from-slate-900/40 to-slate-900/10 backdrop-blur-md rounded-xl p-8 relative z-10 h-full flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-white text-xs font-semibold backdrop-blur-md border border-white/20 mb-4 tracking-wide uppercase">
                        <span>New</span> Feature
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2 tracking-tight">Multi-Tenant Global Engine</h3>
                    <p class="text-blue-100 mb-8 max-w-lg text-sm leading-relaxed font-medium">
                        The core HRM module is now fully isolated across tenants using global scopes. Master controls allow you to seamlessly inject new features to all subscribers at once.
                    </p>
                </div>
                
                <div class="flex gap-4 mt-auto">
                    <a href="{{ route('superadmin.companies.index') }}" class="px-6 py-3 bg-white text-indigo-600 font-bold text-sm rounded-xl shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:shadow-[0_0_25px_rgba(255,255,255,0.5)] hover:-translate-y-0.5 transition-all">
                        Launch Tenants
                    </a>
                    <button class="px-6 py-3 bg-indigo-500/30 hover:bg-indigo-500/40 text-white font-bold text-sm rounded-xl backdrop-blur-md border border-white/20 transition-all hover:border-white/40">
                        View Audit Logs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions / System Health -->
    <div class="premium-card p-0 overflow-hidden flex flex-col">
        <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                System Status
            </h3>
        </div>
        
        <div class="p-6 flex-1 flex flex-col gap-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Global Database</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Automated Backups ON</p>
                    </div>
                </div>
                <div class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded text-xs font-bold border border-emerald-100">Healthy</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Auth Gateway</h4>
                        <p class="text-xs text-slate-500 mt-0.5">JWT & Session Mgmt</p>
                    </div>
                </div>
                <div class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded text-xs font-bold border border-emerald-100">Optimal</div>
            </div>

             <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Storage Cluster</h4>
                        <p class="text-xs text-slate-500 mt-0.5">14.2 GB / 500 GB Used</p>
                    </div>
                </div>
                <div class="text-blue-500 bg-blue-50 px-2 py-1 rounded text-xs font-bold border border-blue-100">2% Load</div>
            </div>
            
        </div>
    </div>

</div>

@endsection

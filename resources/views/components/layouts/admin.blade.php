<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $uiCompanySetting->company_name ?? config('app.name', 'HRM') }} - Admin Portal</title>
    
    @php
        $faviconUrl = auth()->check() 
            ? (auth()->user()->photo_path ? route('users.photo', auth()->user()) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=0D8ABC&color=fff')
            : asset('favicon.ico');
    @endphp
    <link rel="icon" type="image/png" href="{{ $faviconUrl }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        .font-sans { font-family: 'Inter', system-ui, sans-serif; }
    </style>
</head>
<body class="h-full font-sans antialiased text-slate-600 bg-slate-50" x-data="{ sidebarOpen: false, pageLoading: true }" x-init="setTimeout(() => pageLoading = false, 2000); window.addEventListener('load', () => pageLoading = false)">
    
    <!-- Page Loading Overlay -->
    <div x-show="pageLoading" 
         style="display: flex;"
         class="fixed inset-0 z-[60] flex items-center justify-center bg-slate-50/90 backdrop-blur-sm transition-opacity duration-500"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="flex flex-col items-center">
            <div class="relative w-16 h-16 mb-2">
                <div class="absolute inset-0 rounded-full border-t-2 border-blue-600 animate-[spin_1s_linear_infinite]"></div>
                <div class="absolute inset-2 rounded-full border-r-2 border-indigo-400 animate-[spin_1.5s_linear_infinite_reverse]"></div>
            </div>
            <p class="mt-4 text-sm text-slate-500 font-medium animate-pulse">Loading...</p>
        </div>
    </div>

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 bg-slate-900/80 backdrop-blur-sm lg:hidden" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:flex-shrink-0 flex flex-col shadow-2xl overflow-y-auto custom-scrollbar">
            
            <!-- Brand -->
            <div class="flex h-20 shrink-0 items-center px-6 bg-slate-950/50 border-b border-white/5">
                <div class="flex items-center gap-3 w-full">
                    <div class="h-10 w-10 rounded-xl bg-slate-800 flex items-center justify-center text-white font-bold text-xl shadow-lg ring-1 ring-white/10 overflow-hidden">
                        <img src="{{ $faviconUrl }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-lg font-bold text-white tracking-wide truncate leading-none">{{ $uiCompanySetting->company_name ?? config('app.name') }}</span>
                        <span class="text-[10px] text-slate-400 font-medium uppercase tracking-wider mt-1">Admin Portal</span>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 space-y-1 px-4 py-6">
                @php
                    $user = auth()->user();
                    $isSuperAdmin = $user->hasRole('Super Admin');
                    $hrPerms = [];
                    if (!$isSuperAdmin && $user->hasRole('Admin / HR')) {
                        $settingPerms = $uiCompanySetting->hr_permissions ?? [];
                        $hrPerms = is_string($settingPerms) ? json_decode($settingPerms, true) : $settingPerms;
                        if (!is_array($hrPerms)) $hrPerms = [];
                    }
                    $canAccess = function($module) use ($isSuperAdmin, $hrPerms) {
                        return $isSuperAdmin || in_array($module, $hrPerms);
                    };
                @endphp
                
                <div class="mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Dashboards</div>
                
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                    Overview
                </a>
                
                @if($canAccess('attendance') || $canAccess('payrolls'))
                <a href="{{ route('admin.reports.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.reports.index') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-file-invoice w-5 h-5 mr-3 {{ request()->routeIs('admin.reports.index') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                    Reports
                </a>
                @endif


                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">People</div>

                <!-- Employees Group -->
                @if($canAccess('employees'))
                <div x-data="{ open: {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') || request()->routeIs('admin.schedules.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') || request()->routeIs('admin.schedules.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-users w-5 h-5 mr-3 {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') || request()->routeIs('admin.schedules.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            Employees
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.employees.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.employees.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.employees.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            All Employees
                        </a>
                        <a href="{{ route('admin.departments.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.departments.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.departments.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Departments
                        </a>
                        <a href="{{ route('admin.schedules.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.schedules.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.schedules.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Schedules
                        </a>
                    </div>
                </div>
                @endif

                <!-- Attendance Group -->
                @if($canAccess('attendance'))
                <div x-data="{ open: {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clock w-5 h-5 mr-3 {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            Attendance
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.attendance.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.attendance.index') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.attendance.index') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Daily Logs
                        </a>
                        <a href="{{ route('admin.attendance-qr.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.attendance-qr.index') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.attendance-qr.index') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            QR Manager
                        </a>
                        <a href="{{ route('admin.live-map.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.live-map.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.live-map.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Live Map
                        </a>
                    </div>
                </div>
                @endif

                <!-- Requests Group -->
                @if($canAccess('requests'))
                <div x-data="{ open: {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') || request()->routeIs('admin.overtime-requests.*') || request()->routeIs('admin.change-dayoff-requests.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') || request()->routeIs('admin.overtime-requests.*') || request()->routeIs('admin.change-dayoff-requests.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clipboard-check w-5 h-5 mr-3 {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            Requests
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                         <a href="{{ route('admin.leave-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.leave-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.leave-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Leave
                        </a>
                        <a href="{{ route('admin.leave-types.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.leave-types.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.leave-types.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Leave Types
                        </a>
                        <a href="{{ route('admin.overtime-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.overtime-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.overtime-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Overtime
                        </a>
                        <a href="{{ route('admin.change-dayoff-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.change-dayoff-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.change-dayoff-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Change Dayoff
                        </a>
                    </div>
                </div>
                @endif

                @if($canAccess('payrolls'))
                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Finance</div>
                <a href="{{ route('admin.payrolls.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.payrolls.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-money-bill-wave w-5 h-5 mr-3 {{ request()->routeIs('admin.payrolls.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                    Payroll
                </a>
                @endif

                @if($canAccess('performance'))
                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Performance</div>
                <div x-data="{ open: {{ request()->routeIs('admin.performance.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.performance.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-chart-line w-5 h-5 mr-3 {{ request()->routeIs('admin.performance.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            Performance
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                         <a href="{{ route('admin.performance.kpi.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.performance.kpi.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.performance.kpi.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            KPI Setup
                        </a>
                        <a href="{{ route('admin.performance.evaluations.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.performance.evaluations.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.performance.evaluations.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Evaluations
                        </a>
                    </div>
                </div>
                @endif

                @if($canAccess('security'))
                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Security</div>
                <div x-data="{ open: {{ request()->routeIs('admin.security.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.security.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-shield-halved w-5 h-5 mr-3 {{ request()->routeIs('admin.security.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            Security
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                         <a href="{{ route('admin.security.activity-log') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.activity-log') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.activity-log') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Activity Log
                        </a>
                        <a href="{{ route('admin.security.ip-whitelist.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.ip-whitelist.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.ip-whitelist.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            IP Whitelist
                        </a>
                        <a href="{{ route('admin.security.backup.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.backup.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.backup.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            Backups
                        </a>
                    </div>
                </div>
                @endif

                @if($canAccess('settings'))
                    <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Administration</div>
                    
                    <a href="{{ route('admin.branches.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.branches.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-building w-5 h-5 mr-3 {{ request()->routeIs('admin.branches.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        Branches
                    </a>

                    <a href="{{ route('admin.subscription.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.subscription.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-credit-card w-5 h-5 mr-3 {{ request()->routeIs('admin.subscription.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        Subscription
                    </a>

                    <a href="{{ route('admin.settings.edit') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-gear w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        Settings
                    </a>
                @endif
                
                <div class="mt-8 pt-8 border-t border-white/5 px-6">


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center text-slate-400 hover:text-white text-sm font-medium transition-colors mt-3">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>
                            Sign Out
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="flex h-20 flex-shrink-0 items-center justify-between border-b border-slate-200/60 bg-white/80 backdrop-blur-xl px-6 shadow-sm z-20">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-slate-500 hover:text-slate-800 lg:hidden mr-6 focus:outline-none transition-colors">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Breadcrumbs (Simplified) -->
                     <h1 class="text-xl font-bold text-slate-800 tracking-tight">
                        @if(request()->routeIs('admin.dashboard')) Dashboard
                        @elseif(request()->routeIs('admin.employees.*')) Employees
                        @elseif(request()->routeIs('admin.attendance.*')) Attendance
                        @elseif(request()->routeIs('admin.payrolls.*')) Payroll
                        @else {{ config('app.name') }} @endif
                    </h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <!-- Notifications (Placeholder) -->
                    <button class="relative text-slate-400 hover:text-slate-600 transition-colors">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" class="group flex items-center gap-3 focus:outline-none">
                            <div class="text-right hidden md:block">
                                <div class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500">{{ auth()->user()->roles->first()->name ?? 'User' }}</div>
                            </div>
                            <div class="h-10 w-10 rounded-full bg-slate-200 border-2 border-white shadow-sm ring-2 ring-transparent group-hover:ring-blue-100 transition-all overflow-hidden duration-300">
                                <img src="{{ auth()->user()->photo_path ? route('users.photo', auth()->user()) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=0D8ABC&color=fff' }}" 
                                     alt="{{ auth()->user()->name }}" 
                                     class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                        </button>
                        
                        <div x-show="userMenuOpen" x-cloak
                             x-transition:enter="transition ease-out duration-100" 
                             x-transition:enter-start="transform opacity-0 scale-95" 
                             x-transition:enter-end="transform opacity-100 scale-100" 
                             x-transition:leave="transition ease-in duration-75" 
                             x-transition:leave-start="transform opacity-100 scale-100" 
                             x-transition:leave-end="transform opacity-0 scale-95" 
                             class="absolute right-0 mt-2 w-56 transform rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 py-2 z-50">
                            
                            <div class="px-4 py-3 border-b border-slate-100 md:hidden">
                                <div class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500">{{ auth()->user()->email }}</div>
                            </div>

                            <button x-on:click.prevent="$dispatch('open-modal', 'profile-modal')" class="flex w-full items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <i class="fa-regular fa-user w-5 mr-2 text-slate-400"></i> Profile
                            </button>
                            <button x-on:click.prevent="$dispatch('open-modal', 'profile-modal')" class="flex w-full items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <i class="fa-solid fa-lock w-5 mr-2 text-slate-400"></i> Security
                            </button>
                            
                            <div class="border-t border-slate-100 my-1"></div>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex w-full items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fa-solid fa-arrow-right-from-bracket w-5 mr-2 opacity-70"></i> Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-slate-50 p-4 sm:p-6 lg:p-8">
                @php
                    $currentCompany = auth()->user()?->company;
                    $isExpiringSoon = false;
                    $daysLeft = null;
                    if ($currentCompany && $currentCompany->expiry_date) {
                        $daysLeft = now()->diffInDays($currentCompany->expiry_date, false);
                        $isExpiringSoon = $daysLeft >= 0 && $daysLeft <= 7;
                    }
                @endphp
                @if ($isExpiringSoon)
                    <div class="mb-6 rounded-xl bg-orange-50 p-4 border border-orange-200 shadow-sm flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center border border-orange-200">
                            <i class="fa-solid fa-triangle-exclamation text-orange-600 text-lg"></i>
                        </div>
                        <div class="flex-1 pt-0.5">
                            <h3 class="text-sm font-bold text-orange-800">Subscription Expiring Soon</h3>
                            <p class="text-sm font-medium text-orange-700 mt-1 leading-relaxed">Your company's subscription will expire in <strong>{{ floor($daysLeft) }} {{ floor($daysLeft) == 1 ? 'day' : 'days' }}</strong> (on {{ $currentCompany->expiry_date->format('M d, Y') }}). Please renew your plan to avoid service interruption.</p>
                            <div class="mt-4 flex flex-wrap gap-3">
                                <a href="https://t.me/SOCHEAT_DOEM" target="_blank" 
                                   class="relative inline-flex items-center gap-2.5 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-xs font-extrabold rounded-xl transition-all shadow-[0_8px_20px_-6px_rgba(37,99,235,0.5)] hover:shadow-[0_12px_25px_-4px_rgba(37,99,235,0.6)] hover:-translate-y-0.5 active:translate-y-0 group overflow-hidden">
                                    <!-- Animated glow background -->
                                    <div class="absolute inset-0 bg-white/20 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700 skew-x-[-20deg]"></div>
                                    
                                    <i class="fa-brands fa-telegram text-base animate-bounce-slow"></i>
                                    <span class="relative z-10 tracking-wide uppercase">Renew via Telegram</span>
                                    <i class="fa-solid fa-arrow-right text-[10px] opacity-70 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                                
                                <button type="button" class="px-5 py-2.5 bg-white/50 hover:bg-white text-orange-700 text-xs font-bold rounded-xl border border-orange-200 transition-all">
                                    Dismiss
                                </button>
                            </div>
                        </div>

                        <style>
                            @keyframes bounce-slow {
                                0%, 100% { transform: translateY(0); }
                                50% { transform: translateY(-3px); }
                            }
                            .animate-bounce-slow {
                                animation: bounce-slow 2s infinite;
                            }
                        </style>

                    </div>
                @endif

                @if (session('status') || session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 border border-green-200 flex items-center shadow-sm" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        {{ session('status') ?? session('success') }}
                        <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 border border-red-200 shadow-sm" x-data="{ show: true }" x-show="show">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-3 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            <span class="font-bold">Errors occurred</span>
                            <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                        </div>
                        <ul class="list-disc list-inside ml-8">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #4b5563; }
        .menu-disclosure summary::-webkit-details-marker { display: none; }
        .menu-disclosure > summary { outline: none; }
        [x-cloak] { display: none !important; }
    </style>
    <x-profile-modal />
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ $uiCompanySetting->company_name ?? 'Mekong HRM' }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <meta name="mobile-web-app-capable" content="yes">

    <title>{{ config('app.name', 'HRM') }} - Admin</title>

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
         class="fixed inset-0 z-[60] flex items-center justify-center bg-white transition-opacity duration-500"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
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
               class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:flex-shrink-0 flex flex-col shadow-2xl overflow-y-auto">
            
            <!-- Brand -->
            <div class="flex h-20 shrink-0 items-center px-6 bg-slate-950/50 border-b border-white/5">
                <div class="flex items-center gap-3 w-full">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-lg ring-1 ring-white/10">
                        {{ substr($uiCompanySetting->company_name ?? 'H', 0, 1) }}
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-lg font-bold text-white tracking-wide truncate leading-none">{{ $uiCompanySetting->company_name ?? config('app.name') }}</span>
                        <span class="text-[10px] text-slate-400 font-medium uppercase tracking-wider mt-1">{{ __('Admin') }}</span>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 space-y-1 px-4 py-6">
                
                <div class="mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Dashboards') }}</div>
                
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                    {{ __('Overview') }}
                </a>


                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('People') }}</div>

                <!-- Employees Group -->
                <div x-data="{ open: {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-users w-5 h-5 mr-3 {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.departments.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            {{ __('Employees') }}
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.employees.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.employees.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.employees.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('All Employees') }}
                        </a>
                        <a href="{{ route('admin.departments.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.departments.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.departments.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Departments') }}
                        </a>
                    </div>
                </div>

                <!-- Attendance Group -->
                <div x-data="{ open: {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clock w-5 h-5 mr-3 {{ request()->routeIs('admin.attendance.*') || request()->routeIs('admin.attendance-qr.*') || request()->routeIs('admin.live-map.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            {{ __('Attendance') }}
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.attendance.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.attendance.index') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.attendance.index') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Daily Logs') }}
                        </a>
                        <a href="{{ route('admin.attendance-qr.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.attendance-qr.index') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.attendance-qr.index') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('QR Manager') }}
                        </a>
                        <a href="{{ route('admin.live-map.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.live-map.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.live-map.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Live Map') }}
                        </a>
                    </div>
                </div>

                <!-- Requests Group -->
                <div x-data="{ open: {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') || request()->routeIs('admin.overtime-requests.*') || request()->routeIs('admin.change-dayoff-requests.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') || request()->routeIs('admin.overtime-requests.*') || request()->routeIs('admin.change-dayoff-requests.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clipboard-check w-5 h-5 mr-3 {{ request()->routeIs('admin.leave-requests.*') || request()->routeIs('admin.leave-types.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            {{ __('Requests') }}
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                         <a href="{{ route('admin.leave-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.leave-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.leave-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Leave') }}
                        </a>
                        <a href="{{ route('admin.overtime-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.overtime-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.overtime-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Overtime') }}
                        </a>
                        <a href="{{ route('admin.change-dayoff-requests.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.change-dayoff-requests.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.change-dayoff-requests.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Change Dayoff') }}
                        </a>
                    </div>
                </div>

                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Finance') }}</div>

                <a href="{{ route('admin.payrolls.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.payrolls.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-money-bill-wave w-5 h-5 mr-3 {{ request()->routeIs('admin.payrolls.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                    {{ __('Payroll') }}
                </a>

                {{-- ─── Performance ────────────────────────────────────────── --}}
                <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Performance') }}</div>

                <div x-data="{ open: {{ request()->routeIs('admin.performance.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.performance.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-chart-line w-5 h-5 mr-3 {{ request()->routeIs('admin.performance.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            {{ __('Performance') }}
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.performance.kpi.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.performance.kpi.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.performance.kpi.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('KPI Setup') }}
                        </a>
                        <a href="{{ route('admin.performance.evaluations.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.performance.evaluations.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.performance.evaluations.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Evaluations') }}
                        </a>
                    </div>
                </div>

                {{-- ─── Notifications ───────────────────────────────────────── --}}
                <a href="{{ route('admin.notifications.index') }}" class="group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.notifications.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="flex items-center">
                        <i class="fa-regular fa-bell w-5 h-5 mr-3 {{ request()->routeIs('admin.notifications.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        {{ __('Notifications') }}
                    </span>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="ml-auto text-[10px] font-bold px-1.5 py-0.5 rounded-full bg-red-500 text-white">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>

                {{-- ─── Security ────────────────────────────────────────────── --}}
                <div class="mt-4 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Security') }}</div>

                <div x-data="{ open: {{ request()->routeIs('admin.security.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" type="button" class="w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.security.*') ? 'text-white bg-white/5' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <span class="flex items-center">
                            <i class="fa-solid fa-shield-halved w-5 h-5 mr-3 {{ request()->routeIs('admin.security.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-white' }}"></i>
                            {{ __('Security') }}
                        </span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-90 text-slate-300' : 'text-slate-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    <div x-show="open" x-collapse class="pl-4 space-y-1">
                        <a href="{{ route('admin.security.activity-log') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.activity-log') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.activity-log') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Activity Log') }}
                        </a>
                        <a href="{{ route('admin.security.ip-whitelist.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.ip-whitelist.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.ip-whitelist.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('IP Whitelist') }}
                        </a>
                        <a href="{{ route('admin.security.backup.index') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.security.backup.*') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('admin.security.backup.*') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('Database Backup') }}
                        </a>
                        <a href="{{ route('two-factor.setup') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('two-factor.setup') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-3 {{ request()->routeIs('two-factor.setup') ? 'bg-blue-400' : 'bg-slate-600' }}"></span>
                            {{ __('2FA Setup') }}
                            @if(!auth()->user()->two_factor_enabled)
                                <span class="ml-auto text-[9px] font-bold px-1.5 py-0.5 rounded bg-orange-500 text-white">OFF</span>
                            @else
                                <span class="ml-auto text-[9px] font-bold px-1.5 py-0.5 rounded bg-green-500 text-white">ON</span>
                            @endif
                        </a>
                    </div>
                </div>

                @if(auth()->user()->hasAnyRole(['Super Admin', 'Admin / HR']))
                    <div class="mt-8 mb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-widest">{{ __('Administration') }}</div>
                    
                    <a href="{{ route('admin.branches.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.branches.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-building w-5 h-5 mr-3 {{ request()->routeIs('admin.branches.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        {{ __('Branches') }}
                    </a>

                    <a href="{{ route('admin.subscription.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.subscription.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-credit-card w-5 h-5 mr-3 {{ request()->routeIs('admin.subscription.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        {{ __('Subscription') }}
                    </a>

                    <a href="{{ route('admin.settings.edit') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-900/20' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-gear w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-slate-500 group-hover:text-white' }} transition-colors"></i>
                        {{ __('Settings') }}
                    </a>
                @endif
                
                <div class="mt-8 pt-8 border-t border-white/5 px-6">


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center text-slate-400 hover:text-white text-sm font-medium transition-colors mt-3">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>
                            {{ __('Sign Out') }}
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="flex h-20 flex-shrink-0 items-center justify-between border-b border-slate-200 bg-white px-6 shadow-sm z-20">
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
                    <!-- Language Selection -->
                    <div class="relative" x-data="{ langMenuOpen: false }">
                        <button @click="langMenuOpen = !langMenuOpen" @click.away="langMenuOpen = false" 
                            class="flex items-center gap-2 px-3 py-1.5 rounded-full border border-slate-200 bg-white hover:border-blue-300 hover:bg-blue-50 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1">
                            @if(app()->getLocale() == 'km')
                                <span class="text-lg leading-none">🇰🇭</span>
                                <span class="text-xs font-bold text-slate-700 hidden sm:inline">ខ្មែរ</span>
                            @else
                                <span class="text-lg leading-none">🇬🇧</span>
                                <span class="text-xs font-bold text-slate-700 hidden sm:inline">EN</span>
                            @endif
                            <svg class="w-3 h-3 text-slate-400 transition-transform duration-200" :class="langMenuOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <div x-show="langMenuOpen" x-cloak
                             x-transition:enter="transition ease-out duration-150" 
                             x-transition:enter-start="transform opacity-0 scale-95 -translate-y-1" 
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave="transition ease-in duration-100" 
                             x-transition:leave-start="transform opacity-100 scale-100" 
                             x-transition:leave-end="transform opacity-0 scale-95" 
                             class="absolute right-0 mt-2 w-44 rounded-2xl bg-white shadow-2xl border border-slate-100 py-1.5 z-50 overflow-hidden">
                            <div class="px-3 py-2 border-b border-slate-50 mb-1">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ app()->getLocale() == 'km' ? 'ជ្រើសរើសភាសា' : 'Select Language' }}</p>
                            </div>
                            <a href="{{ route('lang.switch', 'en') }}" class="flex items-center justify-between gap-3 px-3 py-2.5 mx-1.5 rounded-xl {{ app()->getLocale() == 'en' ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }} transition-colors group">
                                <div class="flex items-center gap-2.5">
                                    <span class="text-xl leading-none">🇬🇧</span>
                                    <div>
                                        <p class="text-sm font-semibold leading-tight">English</p>
                                        <p class="text-[10px] text-slate-400 leading-tight">International</p>
                                    </div>
                                </div>
                                @if(app()->getLocale() == 'en')
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                @endif
                            </a>
                            <a href="{{ route('lang.switch', 'km') }}" class="flex items-center justify-between gap-3 px-3 py-2.5 mx-1.5 rounded-xl {{ app()->getLocale() == 'km' ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }} transition-colors group">
                                <div class="flex items-center gap-2.5">
                                    <span class="text-xl leading-none">🇰🇭</span>
                                    <div>
                                        <p class="text-sm font-semibold leading-tight">ភាសាខ្មែរ</p>
                                        <p class="text-[10px] text-slate-400 leading-tight">Khmer</p>
                                    </div>
                                </div>
                                @if(app()->getLocale() == 'km')
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                @endif
                            </a>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="relative" x-data="{ 
                        notifOpen: false, 
                        unreadCount: {{ auth()->user()->unreadNotifications->count() }} 
                    }">
                        <button @click="notifOpen = !notifOpen" @click.away="notifOpen = false" 
                            class="relative p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all focus:outline-none">
                            <i class="fa-regular fa-bell text-xl"></i>
                            <template x-if="unreadCount > 0">
                                <span class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white animate-pulse"></span>
                            </template>
                        </button>

                        <!-- Notification Dropdown -->
                        <div x-show="notifOpen" x-cloak
                             x-transition:enter="transition ease-out duration-150" 
                             x-transition:enter-start="transform opacity-0 scale-95 translate-y-2" 
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0" 
                             x-transition:leave="transition ease-in duration-100" 
                             x-transition:leave-start="transform opacity-100 scale-100" 
                             x-transition:leave-end="transform opacity-0 scale-95" 
                             class="absolute right-0 mt-3 w-80 sm:w-96 rounded-2xl bg-white shadow-2xl border border-slate-100 z-50 overflow-hidden">
                            
                            <div class="px-5 py-4 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                                <h3 class="text-sm font-bold text-slate-800">{{ __('Notifications') }}</h3>
                                <template x-if="unreadCount > 0">
                                    <span class="px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold" x-text="unreadCount + ' New'"></span>
                                </template>
                            </div>

                            <div class="max-h-[400px] overflow-y-auto custom-scrollbar">
                                @forelse(auth()->user()->notifications->take(10) as $notification)
                                    <a href="{{ $notification->data['link'] ?? '#' }}" class="block px-5 py-4 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0 {{ $notification->read_at ? 'opacity-60' : '' }}">
                                        <div class="flex gap-4">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-xl {{ $notification->data['color'] ?? 'bg-blue-100 text-blue-600' }} flex items-center justify-center text-lg">
                                                <i class="{{ $notification->data['icon'] ?? 'fa-solid fa-bell' }}"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-bold text-slate-800 leading-tight mb-1">{{ $notification->data['title'] ?? 'New Update' }}</p>
                                                <p class="text-xs text-slate-500 line-clamp-2">{{ $notification->data['message'] ?? 'You have a new notification.' }}</p>
                                                <p class="text-[10px] text-slate-400 mt-2 font-medium">{{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            @if(!$notification->read_at)
                                                <div class="w-2 h-2 rounded-full bg-blue-500 mt-1.5 shadow-sm shadow-blue-500/50"></div>
                                            @endif
                                        </div>
                                    </a>
                                @empty
                                    <div class="py-12 text-center">
                                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fa-regular fa-bell-slash text-2xl text-slate-400"></i>
                                        </div>
                                        <p class="text-sm font-bold text-slate-800">{{ __('All caught up!') }}</p>
                                        <p class="text-xs text-slate-500 mt-1">{{ __('No new notifications at the moment.') }}</p>
                                    </div>
                                @endforelse
                            </div>

                            @if(auth()->user()->notifications->count() > 0)
                                <div class="p-3 border-t border-slate-50 text-center bg-slate-50/30">
                                    <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors">{{ __('View All Notifications') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ userMenuOpen: false, profileModalOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" class="flex items-center gap-3 focus:outline-none">
                            <div class="text-right hidden md:block">
                                <div class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-slate-500">{{ auth()->user()->roles->first()->name ?? 'User' }}</div>
                            </div>
                            <div class="h-10 w-10 rounded-full bg-slate-200 border-2 border-white shadow-sm overflow-hidden cursor-pointer">
                                <img @click.stop="profileModalOpen = true" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" alt="{{ auth()->user()->name }}" class="h-full w-full object-cover">
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

                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <i class="fa-regular fa-user w-5 mr-2 text-slate-400"></i> Profile
                            </a>
                            <a href="{{ route('profile.edit') }}#password-section" class="flex items-center px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <i class="fa-solid fa-lock w-5 mr-2 text-slate-400"></i> Security
                            </a>
                            
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

            <!-- Profile Modal (opened from header avatar) -->
            <div x-show="profileModalOpen" x-cloak x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div @click.away="profileModalOpen = false" class="w-full max-w-2xl mx-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4 flex items-start justify-between">
                        <div class="flex items-center gap-4">
                            <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/images/avatar-default.jpg" alt="Avatar">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-300">{{ auth()->user()->roles->first()->name ?? 'User' }}</p>
                            </div>
                        </div>
                        <button @click="profileModalOpen = false" class="text-gray-500 hover:text-gray-700">✕</button>
                    </div>

                    <div class="px-6 pb-6">
                        <p class="text-sm text-gray-600 dark:text-gray-300">Bio: Passionate about building clean, accessible interfaces.</p>

                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                                <div class="text-sm text-gray-500 dark:text-gray-300">Attendance</div>
                                <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">98%</div>
                            </div>
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                                <div class="text-sm text-gray-500 dark:text-gray-300">Leaves</div>
                                <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">2 / 12</div>
                            </div>
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
                                <div class="text-sm text-gray-500 dark:text-gray-300">Overtime</div>
                                <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">5h</div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <div class="lg:col-span-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                                <h3 class="font-medium text-gray-800 dark:text-gray-100">Recent Activity</h3>
                                <ul class="mt-3 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                                    <li class="flex justify-between"><span>Checked in</span><span class="text-gray-500">Today · 08:02</span></li>
                                    <li class="flex justify-between"><span>Requested leave</span><span class="text-gray-500">Mar 01</span></li>
                                    <li class="flex justify-between"><span>Overtime approved</span><span class="text-gray-500">Feb 27</span></li>
                                </ul>
                            </div>

                            <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                                <h3 class="font-medium text-gray-800 dark:text-gray-100">Contact</h3>
                                <div class="mt-3 text-sm text-gray-600 dark:text-gray-300 space-y-2">
                                    <div>Email: {{ auth()->user()->email }}</div>
                                    <div>Phone: +855 12 345 678</div>
                                    <div>Department: {{ auth()->user()->employee?->department?->name ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
</body>
</html>

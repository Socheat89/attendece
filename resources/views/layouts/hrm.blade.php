<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#f8fafc]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0a0f1d">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <title>{{ config('app.name', 'HRM Intelligence') }}</title>

    <!-- Essential Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Modern Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

        .page-transition { animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="h-full antialiased text-slate-900 overflow-hidden" x-data="{ sidebarOpen: false }">
    
    <div class="flex h-screen bg-[#f8fafc]">
        
        <!-- Premium Sidebar -->
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            
            <!-- Dynamic Navigation Bar -->
            @include('layouts.navigation')

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-y-auto custom-scrollbar relative p-4 sm:p-6 lg:p-10 page-transition">
               
                <!-- Alerts & Success Notifications -->
                <div class="max-w-7xl mx-auto space-y-4 mb-8">
                    @if(session('status'))
                        <div x-data="{ show: true }" x-show="show" class="bg-emerald-50 border border-emerald-100 p-4 rounded-2xl flex items-center gap-4 shadow-sm animate-bounce-in">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-lg shadow-emerald-500/20">
                                <i class="fa-solid fa-check-double"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-emerald-900 tracking-tight leading-none">{{ __('System Alert') }}</p>
                                <p class="text-xs font-semibold text-emerald-700/80 mt-1">{{ session('status') }}</p>
                            </div>
                            <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 transition-colors"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div x-data="{ show: true }" x-show="show" class="bg-rose-50 border border-rose-100 p-4 rounded-2xl flex items-center gap-4 shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-rose-500 text-white flex items-center justify-center shadow-lg shadow-rose-500/20">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-rose-900 tracking-tight leading-none">{{ __('Logic Error Detected') }}</p>
                                <ul class="mt-1 space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li class="text-xs font-semibold text-rose-700/80">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button @click="show = false" class="text-rose-400 hover:text-rose-600 transition-colors"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    @endif
                </div>

                <!-- Central Content -->
                <div class="max-w-7xl mx-auto pb-12">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <!-- Background Decorative Elements -->
    <div class="fixed top-0 right-0 w-[800px] h-[800px] bg-blue-500/5 rounded-full blur-[120px] pointer-events-none -z-10 translate-x-1/2 -translate-y-1/2"></div>
    <div class="fixed bottom-0 left-0 w-[600px] h-[600px] bg-indigo-500/5 rounded-full blur-[100px] pointer-events-none -z-10 -translate-x-1/3 translate-y-1/3"></div>

    @stack('scripts')
</body>
</html>


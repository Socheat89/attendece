<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRM') }} — Design V2</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root{
            --primary: #0b5f9b; /* corporate blue */
            --primary-600: #0b5f9b;
            --neutral-900: #0f1724;
            --muted: #6b7280;
            --surface: #ffffff;
        }

        /* Accessibility helpers */
        :focus-visible { outline: 3px solid color-mix(in srgb, var(--primary) 30%, white); outline-offset: 2px; }
        .primary-btn { background: var(--primary-600); color: white; border-radius: 6px; padding: .45rem .75rem; }
        .card { background: var(--surface); border-radius: .5rem; box-shadow: 0 6px 18px rgba(15,23,42,0.06); }
        @media (prefers-reduced-motion: reduce) { * { transition: none !important; animation: none !important; } }
        /* Ensure high contrast text on small components */
        .text-contrast { color: var(--neutral-900); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-slate-800">
    <div class="min-h-screen flex">
        <aside id="v2Sidebar" class="w-72 bg-white border-r hidden md:block">
            <div class="p-4 border-b">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-sky-600"></div>
                    <div>
                        <div class="font-semibold">{{ $companyName ?? config('app.name') }}</div>
                        <div class="text-xs text-slate-500">Corporate HRM</div>
                    </div>
                </div>
            </div>
            <nav class="p-4">
                <a href="{{ route('designv2.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-100 font-medium">Dashboard</a>
                <a href="{{ route('designv2.employees.index') }}" class="block px-3 py-2 rounded hover:bg-slate-100 font-medium">Employees</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-slate-100 font-medium">Attendance</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-slate-100 font-medium">Payroll</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-slate-100 font-medium">Reports</a>
            </nav>
        </aside>

        <div class="flex-1">
            <header class="bg-white border-b">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
                    <div class="flex items-center gap-3">
                        <button id="toggleSidebarBtn" class="md:hidden p-2 rounded bg-slate-100">Menu</button>
                        <h1 class="text-lg font-semibold">{{ $title ?? 'Dashboard' }}</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <button x-on:click.prevent="$dispatch('open-modal', 'profile-modal')" class="text-sm text-slate-600">Profile</button>
                        <form method="POST" action="{{ route('logout') }}">@csrf<button class="ml-3 bg-sky-600 text-white px-3 py-1 rounded">Logout</button></form>
                    </div>
                </div>
            </header>

            <main class="p-6 max-w-7xl mx-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebarBtn')?.addEventListener('click', () => {
            const sb = document.getElementById('v2Sidebar');
            if (!sb) return;
            sb.classList.toggle('hidden');
        });
    </script>
    <x-profile-modal />
</body>
</html>

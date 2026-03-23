<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Restricted — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="h-full flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-red-950 font-sans">
    <div class="text-center px-8 py-16 max-w-md">
        <div class="w-24 h-24 rounded-full bg-red-500/20 border border-red-500/30 flex items-center justify-center mx-auto mb-8 shadow-2xl shadow-red-900">
            <i class="fa-solid fa-shield-halved text-5xl text-red-400"></i>
        </div>
        <h1 class="text-4xl font-extrabold text-white mb-3">403</h1>
        <h2 class="text-xl font-bold text-red-300 mb-4">Access Restricted</h2>
        <p class="text-slate-400 text-sm leading-relaxed mb-4">
            Your IP address <strong class="text-white font-mono bg-white/10 px-2 py-0.5 rounded-md">{{ $ip ?? request()->ip() }}</strong>
            is not authorized to access this application.
        </p>
        <p class="text-slate-500 text-xs mb-8">Please contact your system administrator to whitelist your IP address.</p>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-red-600 text-white text-sm font-bold hover:bg-red-700 transition shadow-lg shadow-red-900">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out
            </button>
        </form>
    </div>
</body>
</html>

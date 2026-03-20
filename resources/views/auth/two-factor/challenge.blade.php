<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="h-full flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-950 font-sans">
    <div class="w-full max-w-md px-6">
        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            {{-- Top banner --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-8 text-center">
                <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fa-solid fa-lock text-3xl text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-white">Two-Factor Authentication</h1>
                <p class="text-blue-200 text-sm mt-1">Enter the 6-digit code from your authenticator app</p>
            </div>

            {{-- Form --}}
            <div class="px-8 py-8">
                @if ($errors->any())
                    <div class="mb-5 bg-red-50 border border-red-200 rounded-xl px-4 py-3 text-sm text-red-700 flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('two-factor.verify') }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Authentication Code</label>
                        <input type="text" name="otp" required autofocus autocomplete="off"
                            maxlength="6" minlength="6"
                            placeholder="000000"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-2xl font-mono font-bold text-center tracking-widest text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold text-sm shadow-lg shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-0.5 transition-all">
                        <i class="fa-solid fa-shield-check mr-2"></i> Verify & Sign In
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs text-slate-400 hover:text-slate-600 transition">
                            ← Back to Login
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <p class="text-center text-slate-500 text-xs mt-6">
            Open Google Authenticator and find your <strong>{{ config('app.name') }}</strong> code.
        </p>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0b1628">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Mekong HRM">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <title>{{ config('app.name', 'Mekong CyberUnit') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Sora:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --blue: #2d7cf6;
            --blue-dark: #1a5ed4;
            --indigo: #6366f1;
            --dark: #070e1c;
            --dark2: #0b1628;
            --card: rgba(11, 22, 40, 0.92);
            --border: rgba(45, 124, 246, 0.18);
            --text: #7f98b8;
            --white: #eef3fe;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text);
            margin: 0; padding: 0;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        [x-cloak] { display: none !important; }

        /* ─── BACKGROUND ─── */
        .auth-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            background: radial-gradient(ellipse 80% 60% at 20% 10%, rgba(45,124,246,0.18) 0%, transparent 60%),
                        radial-gradient(ellipse 60% 50% at 80% 80%, rgba(99,102,241,0.12) 0%, transparent 55%),
                        radial-gradient(ellipse 100% 80% at 50% 50%, #0c1524 0%, #070e1c 100%);
        }
        .auth-bg-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image: radial-gradient(rgba(45,124,246,0.18) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.3;
        }

        /* ─── LAYOUT ─── */
        .auth-wrap {
            min-height: 100vh;
            display: flex;
            position: relative;
            z-index: 1;
        }

        /* ─── LEFT PANEL (desktop only) ─── */
        .auth-left {
            width: 52%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        @media (max-width: 1023px) { .auth-left { display: none; } }

        .auth-logo-wrap {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }
        .auth-logo-img {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            object-fit: contain;
            background: #fff;
            padding: 4px;
            box-shadow: 0 0 24px rgba(45,124,246,0.3);
        }
        .auth-logo-text {
            font-family: 'Sora', sans-serif;
            font-size: 1.4rem;
            font-weight: 900;
            color: var(--white);
            letter-spacing: -0.03em;
        }
        .auth-logo-text span { color: var(--blue); }

        .auth-left-body {
            max-width: 420px;
        }
        .auth-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 1rem;
            border-radius: 100px;
            background: rgba(45,124,246,0.1);
            border: 1px solid rgba(45,124,246,0.22);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #60a5fa;
            margin-bottom: 1.5rem;
        }
        .auth-badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #60a5fa;
            animation: dot-pulse 1.4s infinite;
        }
        @keyframes dot-pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.3; transform: scale(0.5); }
        }

        .auth-headline {
            font-family: 'Sora', sans-serif;
            font-size: clamp(2rem, 3vw, 2.8rem);
            font-weight: 900;
            color: var(--white);
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: 1.1rem;
        }
        .auth-headline .grad {
            background: linear-gradient(135deg, #60a5fa, #a78bfa, #f472b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .auth-sub {
            font-size: 0.95rem;
            color: var(--text);
            line-height: 1.8;
            margin-bottom: 2.5rem;
        }

        .auth-features { display: flex; flex-direction: column; gap: 0.75rem; }
        .auth-feat {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.2rem;
            border-radius: 14px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(45,124,246,0.12);
            transition: border-color 0.2s;
        }
        .auth-feat:hover { border-color: rgba(45,124,246,0.3); }
        .auth-feat-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        .fi-blue  { background: rgba(45,124,246,0.14); color: #60a5fa; }
        .fi-green { background: rgba(34,197,94,0.12); color: #4ade80; }
        .fi-purple { background: rgba(139,92,246,0.14); color: #a78bfa; }
        .auth-feat strong { display: block; font-size: 0.84rem; font-weight: 700; color: var(--white); }
        .auth-feat span { font-size: 0.76rem; color: var(--text); }

        .auth-stats {
            display: flex;
            gap: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }
        .stat-num { font-size: 1.5rem; font-weight: 900; color: var(--white); line-height: 1; }
        .stat-num em { color: var(--blue); font-style: normal; }
        .stat-lbl { font-size: 0.68rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #475569; margin-top: 0.3rem; }

        /* ─── RIGHT PANEL ─── */
        .auth-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            min-height: 100vh;
        }

        /* Mobile top logo */
        .auth-mobile-logo {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            text-decoration: none;
        }
        @media (max-width: 1023px) {
            .auth-mobile-logo { display: flex; }
        }
        .auth-mobile-logo-img {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            object-fit: contain;
            background: #fff;
            padding: 6px;
            box-shadow: 0 12px 40px rgba(45,124,246,0.3);
            margin-bottom: 0.85rem;
        }
        .auth-mobile-brand {
            font-family: 'Sora', sans-serif;
            font-size: 1.25rem;
            font-weight: 900;
            color: var(--white);
            letter-spacing: -0.02em;
        }
        .auth-mobile-brand span { color: var(--blue); }
        .auth-mobile-tagline {
            font-size: 0.72rem;
            color: #475569;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-top: 0.3rem;
        }

        /* Card */
        .auth-card {
            width: 100%;
            max-width: 420px;
            position: relative;
        }
        .auth-card-inner {
            background: rgba(11, 22, 40, 0.9);
            border: 1px solid rgba(45,124,246,0.2);
            border-radius: 24px;
            padding: 2.25rem;
            box-shadow: 0 32px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        @media (max-width: 400px) {
            .auth-card-inner { padding: 1.75rem 1.25rem; }
        }

        /* Form elements */
        .auth-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #4e6a86;
            margin-bottom: 0.45rem;
        }
        .auth-input-wrap { position: relative; }
        .auth-input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #2e4762;
            font-size: 0.82rem;
            pointer-events: none;
            transition: color 0.2s;
        }
        .auth-input-wrap:focus-within .auth-input-icon { color: var(--blue); }
        .auth-input {
            display: block;
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.6rem;
            background: rgba(255,255,255,0.04);
            border: 1.5px solid rgba(45,124,246,0.15);
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 500;
            color: var(--white);
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: all 0.22s;
            -webkit-appearance: none;
        }
        .auth-input::placeholder { color: #243040; }
        .auth-input:focus {
            border-color: var(--blue);
            background: rgba(45,124,246,0.06);
            box-shadow: 0 0 0 3px rgba(45,124,246,0.12);
        }
        .pw-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #2e4762;
            cursor: pointer;
            font-size: 0.82rem;
            padding: 0;
            transition: color 0.2s;
        }
        .pw-toggle:hover { color: var(--blue); }

        .auth-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            width: 100%;
            padding: 1rem;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--blue), var(--blue-dark));
            color: #fff;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.02em;
            border: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 8px 28px rgba(45,124,246,0.38);
            transition: all 0.25s;
            position: relative;
            overflow: hidden;
        }
        .auth-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
        }
        .auth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 36px rgba(45,124,246,0.5);
        }
        .auth-btn:active { transform: translateY(0); }
        .auth-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }

        .auth-link { color: var(--blue); font-weight: 700; text-decoration: none; transition: opacity 0.2s; }
        .auth-link:hover { opacity: 0.8; text-decoration: underline; }

        /* Error */
        .auth-error {
            color: #f87171;
            font-size: 0.76rem;
            font-weight: 600;
            margin-top: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        /* Checkbox */
        .auth-check-label {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.84rem;
            font-weight: 500;
            color: #475569;
            cursor: pointer;
            user-select: none;
        }
        .auth-check-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--blue);
            cursor: pointer;
            flex-shrink: 0;
        }

        /* Left footer */
        .auth-left-footer { font-size: 0.78rem; font-weight: 600; color: #283b50; display: flex; gap: 1.5rem; }
        .auth-left-footer a { color: #334155; text-decoration: none; transition: color 0.2s; }
        .auth-left-footer a:hover { color: var(--white); }

        /* Bottom helper */
        .auth-bottom { text-align: center; margin-top: 1.25rem; font-size: 0.82rem; font-weight: 500; color: #475569; }

        /* Separator */
        .auth-sep { display: flex; align-items: center; gap: 0.75rem; margin: 1.25rem 0; }
        .auth-sep-line { flex: 1; height: 1px; background: rgba(45,124,246,0.12); }
        .auth-sep-text { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #2e4762; }

        /* Animate in */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .auth-card { animation: fadeSlideUp 0.45s ease both; }
    </style>
</head>
<body>
    <div class="auth-bg"></div>
    <div class="auth-bg-grid"></div>

    <div class="auth-wrap">
        {{-- LEFT PANEL --}}
        <div class="auth-left">
            {{-- Logo --}}
            <a href="/" class="auth-logo-wrap">
                <img src="{{ asset('images/logo.jpg') }}" alt="Mekong HRM" class="auth-logo-img">
                <span class="auth-logo-text">Mekong<span>CyberUnit</span></span>
            </a>

            {{-- Body --}}
            <div class="auth-left-body">
                <div class="auth-badge">
                    <div class="auth-badge-dot"></div>
                    MODERN HR SYSTEM
                </div>
                <h2 class="auth-headline">
                    Smart HR &<br>
                    <span class="grad">Attendance Tool</span>
                </h2>
                <p class="auth-sub">
                    Mekong CyberUnit helps you manage employees, attendance, and payroll in one smart, fast, and accurate system.
                </p>

                <div class="auth-features">
                    <div class="auth-feat">
                        <div class="auth-feat-icon fi-blue"><i class="fa-solid fa-qrcode"></i></div>
                        <div>
                            <strong>QR Code Attendance</strong>
                            <span>Instant clock-in/out with GPS verification</span>
                        </div>
                    </div>
                    <div class="auth-feat">
                        <div class="auth-feat-icon fi-green"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <div>
                            <strong>Automated Payroll</strong>
                            <span>Calculate, deduct, and send automatically</span>
                        </div>
                    </div>
                    <div class="auth-feat">
                        <div class="auth-feat-icon fi-purple"><i class="fa-solid fa-chart-line"></i></div>
                        <div>
                            <strong>Real-time Reports</strong>
                            <span>Clear charts and analytics, easy to use</span>
                        </div>
                    </div>
                </div>

                <div class="auth-stats" style="margin-top:2.5rem">
                    <div>
                        <div class="stat-num">500<em>+</em></div>
                        <div class="stat-lbl">Companies</div>
                    </div>
                    <div>
                        <div class="stat-num">99.9<em>%</em></div>
                        <div class="stat-lbl">Uptime</div>
                    </div>
                    <div>
                        <div class="stat-num">24<em>/7</em></div>
                        <div class="stat-lbl">Support</div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="auth-left-footer">
                <span>&copy; {{ date('Y') }} Mekong CyberUnit</span>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
        </div>

        {{-- RIGHT PANEL --}}
        <div class="auth-right">
            {{-- Mobile Logo --}}
            <a href="/" class="auth-mobile-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Mekong HRM" class="auth-mobile-logo-img">
                <div class="auth-mobile-brand">Mekong<span>CyberUnit</span></div>
                <div class="auth-mobile-tagline">HR Management System</div>
            </a>

            <div class="auth-card">
                <div class="auth-card-inner">
                    {{ $slot }}
                </div>
                <p class="auth-bottom">
                    Need help? <a href="https://t.me/SOCHEAT_DOEM" target="_blank" class="auth-link">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

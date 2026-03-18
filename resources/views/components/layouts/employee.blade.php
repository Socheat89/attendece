@props([
    'pageTitle' => null,
    'pageDescription' => null,
    'showPageBanner' => true,
])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="{{ $uiCompanySetting->primary_color ?? '#0f4c81' }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    {{-- Apple/iOS PWA Meta Tags --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ $uiCompanySetting->company_name ?? 'Mekong HRM' }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/icon-192x192.png') }}">
    {{-- MS Tiles --}}
    <meta name="msapplication-TileColor" content="#0f4c81">
    <meta name="msapplication-TileImage" content="{{ asset('images/icons/icon-144x144.png') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <title>{{ $uiCompanySetting->company_name ?? config('app.name') }} - Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css', true) }}" rel="stylesheet">
    <style>
        :root {
            --brand: {{ $uiCompanySetting->primary_color ?? '#2563eb' }}; /* Default to a brighter blue */
            --brand-dark: #1e40af;
            --brand-light: #eff6ff;
            --ink: #0f172a; /* Slate 900 */
            --muted: #64748b; /* Slate 500 */
            --line: #e2e8f0; /* Slate 200 */
            --surface: #f8fafc; /* Slate 50 */
            --surface-soft: #f1f5f9; /* Slate 100 */
            
            --success: #10b981;
            --success-bg: #ecfdf5;
            --warning: #f59e0b;
            --warning-bg: #fffbeb;
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            --info: #3b82f6;
            --info-bg: #eff6ff;

            --radius-xl: 24px;
            --radius-lg: 16px;
            --radius-md: 12px;
            --radius-sm: 8px;

            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-soft: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);

            --topbar-h: 64px;
            --nav-h: 70px;
        }

        * { box-sizing: border-box; }

        html, body { min-height: 100%; }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 15px;
            color: var(--ink);
            background-color: var(--surface);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Modern subtle background pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(var(--line) 1px, transparent 1px);
            background-size: 32px 32px;
            opacity: 0.4;
            z-index: -1;
            pointer-events: none;
        }
        
        /* Top gradient accent */
        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 300px;
            background: linear-gradient(180deg, var(--brand-light) 0%, transparent 100%);
            z-index: -1;
            pointer-events: none;
            opacity: 0.6;
        }

        .emp-shell {
            position: relative;
            max-width: 600px; /* Constrain for mobile-first feel on desktop */
            min-height: 100vh;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 0 50px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 600px) {
            .emp-shell {
                margin: 20px auto;
                border-radius: var(--radius-xl);
                overflow: hidden;
                min-height: calc(100vh - 40px);
                border: 1px solid var(--line);
            }
        }

        /* ─── TOP BAR ─────────────────────────────────────── */
        .emp-topbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            height: var(--topbar-h);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1.25rem;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--line);
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .avatar-circle {
            width: 36px; height: 36px;
            background: var(--brand);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: var(--shadow-soft);
        }

        .brand-title {
            margin: 0;
            font-weight: 700;
            font-size: 0.95rem;
            line-height: 1.2;
            color: var(--ink);
        }

        .brand-subtitle {
            margin: 0;
            font-size: 0.75rem;
            color: var(--muted);
            font-weight: 500;
        }

        .top-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon-subtle {
            background: transparent;
            border: none;
            padding: 8px;
            border-radius: 50%;
            color: var(--muted);
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-icon-subtle:hover, .btn-icon-subtle:focus {
            background: var(--surface-soft);
            color: var(--brand);
        }

        /* ─── MAIN CONTENT ────────────────────────────────── */
        .emp-main {
            flex: 1;
            padding: 1.25rem;
            padding-bottom: calc(var(--nav-h) + 2rem);
        }

        /* Page Banner */
        .page-banner {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }

        .page-banner h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--ink);
            font-family: 'Sora', sans-serif;
        }

        .page-banner p {
            margin: 0.25rem 0 0;
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.5;
        }

        .date-chip {
            background: var(--surface-soft);
            color: var(--brand-dark);
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            white-space: nowrap;
            border: 1px solid var(--line);
        }

        /* ─── NAVIGATION ──────────────────────────────────── */
        .bottom-nav {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            height: var(--nav-h);
            background: #fff;
            display: flex;
            align-items: stretch;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.04);
            z-index: 1030;
            border-top: 1px solid var(--line);
            padding-bottom: env(safe-area-inset-bottom);
        }
        
        @media (min-width: 600px) {
            .bottom-nav {
                position: absolute;
            }
        }

        .bottom-nav a {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #94a3b8;
            font-size: 0.7rem;
            font-weight: 600;
            gap: 4px;
            transition: all 0.25s ease;
            position: relative;
        }
        
        .bottom-nav a svg {
            width: 24px;
            height: 24px;
            stroke-width: 2px;
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .bottom-nav a.active {
            color: var(--brand);
        }
        
        .bottom-nav a.active svg {
            transform: translateY(-2px);
            filter: drop-shadow(0 4px 6px var(--brand-light));
        }

        /* Active Indicator / Glow styling could go here, but kept simple for performance */
        .bottom-nav a.active::after {
            content: '';
            position: absolute;
            top: 0;
            width: 40%;
            height: 3px;
            background: var(--brand);
            border-radius: 0 0 4px 4px;
        }

        /* ─── GENERIC UTILITIES ───────────────────────────── */
        .card {
            background: #fff;
            border-radius: var(--radius-lg);
            border: 1px solid var(--line);
            box-shadow: var(--shadow-soft);
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: filter 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-primary:hover {
            filter: brightness(110%);
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--ink);
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--brand);
            outline: 0;
            box-shadow: 0 0 0 3px var(--brand-light);
        }

        /* Loading */
        .loading-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(4px);
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .emp-topbar h6, .emp-topbar p { margin: 0; }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            min-width: 0;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(140deg, #4e96d4 0%, #2b6cb0 100%);
            color: #fff;
            font-weight: 800;
            font-size: 1rem;
            letter-spacing: -0.02em;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }

        .brand-title {
            color: var(--ink);
            font-weight: 700;
            font-size: 0.92rem;
            line-height: 1.1;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 0.72rem;
            font-weight: 500;
            line-height: 1.3;
            margin-top: 0.1rem;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-shrink: 0;
        }

        .top-actions a,
        .top-actions button {
            border-radius: 10px;
            font-size: 0.76rem;
            font-weight: 600;
            padding: 0.38rem 0.75rem;
            line-height: 1.4;
            border: 1px solid var(--line);
            color: var(--muted);
            background: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .top-actions a:hover,
        .top-actions button:hover {
            border-color: var(--brand);
            background: var(--brand-light);
            color: var(--brand-dark);
        }

        /* ─── MAIN ────────────────────────────────────────── */
        .emp-main {
            padding: 1rem 0.95rem calc(var(--nav-h) + 2rem);
        }

        /* ─── PAGE BANNER ─────────────────────────────────── */
        .page-banner {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 1rem 1.2rem;
            margin-bottom: 1.1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--brand), #4e96d4);
            border-radius: 999px 0 0 999px;
        }

        .page-banner h1 {
            margin: 0;
            font-family: 'Sora', sans-serif;
            font-size: clamp(1.05rem, 2.5vw, 1.3rem);
            font-weight: 700;
            letter-spacing: -0.025em;
            color: var(--ink);
        }

        .page-banner p {
            margin: 0.3rem 0 0;
            color: var(--muted);
            font-size: 0.8rem;
            line-height: 1.55;
            max-width: 52ch;
        }

        .date-chip {
            background: var(--brand-light);
            border: 1px solid #c5d8f4;
            color: var(--brand);
            border-radius: 10px;
            font-size: 0.73rem;
            font-weight: 700;
            padding: 0.35rem 0.7rem;
            white-space: nowrap;
            line-height: 1.4;
            flex-shrink: 0;
        }

        /* ─── CARDS ───────────────────────────────────────── */
        .app-card {
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            background: #fff;
            box-shadow: var(--shadow-soft);
        }

        .card-soft {
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            background: #fff;
            box-shadow: var(--shadow-soft);
        }

        .card-quiet {
            border: 1px solid #dae3ef;
            border-radius: var(--radius-md);
            background: var(--surface);
        }

        .section-title {
            font-family: 'Sora', 'Inter', sans-serif;
            font-size: 0.97rem;
            font-weight: 700;
            letter-spacing: -0.015em;
            margin: 0 0 0.85rem;
            color: var(--ink);
        }

        .muted { color: var(--muted); }

        .badge-soft {
            background: var(--brand-light);
            color: #1d4d80;
            border: 1px solid #c2d8f4;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.24rem 0.6rem;
            font-size: 0.71rem;
            font-weight: 700;
        }

        .status-pill {
            border-radius: 8px;
            font-size: 0.71rem;
            font-weight: 700;
            padding: 0.27rem 0.62rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            letter-spacing: 0.01em;
        }

        .status-present  { background: var(--success-bg); color: var(--success); }
        .status-late     { background: var(--warning-bg); color: var(--warning); }
        .status-absent   { background: var(--danger-bg);  color: var(--danger);  }
        .status-leave    { background: var(--info-bg);    color: var(--info);    }
        .status-default  { background: #ecf0f6;           color: #516070;        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .stat-card {
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            background: #fff;
            padding: 0.9rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            transition: transform 0.18s, box-shadow 0.18s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .stat-card .stat-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1rem;
        }

        .stat-card .value {
            font-size: 1.75rem;
            font-weight: 800;
            line-height: 1;
            color: var(--ink);
            letter-spacing: -0.03em;
        }

        .stat-card .label {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ─── BUTTONS ─────────────────────────────────────── */
        .btn-brand {
            border: 0;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, #2d6ec0 0%, var(--brand-dark) 100%);
            color: #fff;
            font-weight: 700;
            font-size: 0.84rem;
            line-height: 1;
            padding: 0.7rem 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            box-shadow: 0 4px 14px rgba(23, 61, 96, 0.28);
            transition: filter 0.18s, transform 0.18s, box-shadow 0.18s;
        }

        .btn-brand:hover {
            color: #fff;
            filter: brightness(1.08);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(23, 61, 96, 0.32);
        }

        .btn-brand:active { transform: translateY(0); }

        .btn-quiet {
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            background: #fff;
            color: #26496e;
            font-weight: 600;
            font-size: 0.82rem;
            line-height: 1;
            padding: 0.65rem 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            transition: border-color 0.18s, background 0.18s;
        }

        .btn-quiet:hover {
            color: #1d405f;
            border-color: #adc7e2;
            background: var(--surface);
        }

        /* ─── FORMS ───────────────────────────────────────── */
        .input-label {
            font-size: 0.79rem;
            font-weight: 700;
            color: #253a52;
            margin-bottom: 0.38rem;
        }

        .form-control, .form-select {
            border-radius: var(--radius-md);
            border: 1.5px solid #ccd9ea;
            background: #f7fafe;
            color: #1a324d;
            padding: 0.65rem 0.8rem;
            font-size: 0.88rem;
            transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #5e9bd6;
            box-shadow: 0 0 0 3px rgba(50, 120, 200, 0.12);
            background: #fff;
            outline: none;
        }

        /* ─── BOTTOM NAV ──────────────────────────────────── */
        .bottom-nav {
            position: fixed;
            left: 0; right: 0; bottom: 0;
            z-index: 1040;
            display: grid;
            grid-template-columns: repeat(var(--nav-count), 1fr);
            align-items: end;
            background: rgba(255,255,255,0.97);
            border-top: 1px solid #dce6f1;
            padding: 0.4rem 0.25rem calc(0.5rem + env(safe-area-inset-bottom));
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            box-shadow: 0 -4px 24px rgba(10,25,50,0.07);
        }

        .bottom-nav a {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.22rem;
            padding: 0.45rem 0.2rem 0.3rem;
            border-radius: 14px;
            text-decoration: none;
            color: #6b7d90;
            font-size: 0.63rem;
            font-weight: 700;
            line-height: 1.1;
            transition: color 0.18s, background 0.18s;
            position: relative;
        }

        .bottom-nav a svg {
            width: 20px; height: 20px;
            transition: transform 0.22s;
        }

        .bottom-nav a.active {
            color: var(--brand);
        }

        .bottom-nav a.active svg {
            transform: translateY(-2px);
        }

        .bottom-nav a.active::before {
            content: '';
            position: absolute;
            top: 0; left: 25%; right: 25%;
            height: 3px;
            background: var(--brand);
            border-radius: 0 0 4px 4px;
        }

        /* ─── FLOATING SCAN BTN ───────────────────────────── */
        .floating-scan {
            position: fixed;
            left: 50%;
            bottom: 72px;
            transform: translateX(-50%);
            z-index: 1050;
        }

        .scan-button-lg {
            width: 62px; height: 62px;
            border: 3px solid #fff;
            border-radius: 18px;
            background: linear-gradient(135deg, #2d6ec0 0%, var(--brand-dark) 100%);
            color: #fff;
            font-size: 0.74rem;
            font-weight: 800;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 8px 28px rgba(22, 59, 94, 0.35);
            transition: transform 0.18s, box-shadow 0.18s;
        }

        .scan-button-lg:hover { color: #fff; transform: scale(1.06); }

        /* ─── PAGINATION ──────────────────────────────────── */
        .pagination { margin-bottom: 0; }

        /* ─── LOADER ──────────────────────────────────────── */
        .loading-overlay {
            position: fixed; inset: 0;
            background: rgba(11, 25, 42, 0.38);
            z-index: 1080;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(3px);
        }

        .loading-overlay .spinner-border { color: #fff; width: 2.5rem; height: 2.5rem; }

        @media (max-width: 575.98px) {
            .brand-title { font-size: 0.87rem; }
            .page-banner { flex-direction: column; align-items: stretch; }
            .date-chip { width: fit-content; }
            .emp-main { padding: 0.85rem 0.75rem calc(var(--nav-h) + 2rem); }
        }

        @media (min-width: 768px) {
            .emp-main { padding: 1.3rem 1.3rem calc(var(--nav-h) + 2rem); }
            .stat-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        @media (min-width: 992px) {
            .emp-shell { padding-bottom: 8rem; }

            .emp-topbar {
                border-radius: 0 0 20px 20px;
                margin: 0 1rem;
                top: 0.75rem;
            }

            .emp-main { padding-top: 2rem; }

            .bottom-nav {
                width: min(720px, calc(100% - 2rem));
                margin: 0 auto;
                left: 50%; right: auto;
                transform: translateX(-50%);
                border-radius: 18px 18px 0 0;
                border: 1px solid #d0dcea;
                border-bottom: 0;
                box-shadow: var(--shadow-xl);
                padding-bottom: 0.65rem;
            }

            .floating-scan { display: none; }
        }

        /* ─── SPLASH SCREEN ───────────────────────────────── */
        #app-splash {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: linear-gradient(160deg, #0f4c81 0%, #1a6bb5 50%, #0e3d6b 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #app-splash.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        #app-splash .splash-logo {
            width: 90px;
            height: 90px;
            border-radius: 20px;
            object-fit: contain;
            background: #fff;
            padding: 10px;
            box-shadow: 0 16px 48px rgba(0,0,0,0.28);
            animation: splashPop 0.5s cubic-bezier(0.34,1.56,0.64,1) both;
        }
        #app-splash .splash-name {
            margin-top: 22px;
            font-family: 'Sora', 'Inter', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.02em;
            animation: splashFadeUp 0.5s 0.15s ease both;
        }
        #app-splash .splash-tagline {
            margin-top: 6px;
            font-size: 0.78rem;
            color: rgba(255,255,255,0.65);
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            animation: splashFadeUp 0.5s 0.25s ease both;
        }
        #app-splash .splash-dots {
            margin-top: 48px;
            display: flex;
            gap: 8px;
            animation: splashFadeUp 0.5s 0.35s ease both;
        }
        #app-splash .splash-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            animation: dotPulse 1.2s infinite ease-in-out;
        }
        #app-splash .splash-dot:nth-child(2) { animation-delay: 0.2s; }
        #app-splash .splash-dot:nth-child(3) { animation-delay: 0.4s; }
        @keyframes splashPop {
            from { opacity: 0; transform: scale(0.6); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes splashFadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes dotPulse {
            0%, 100% { background: rgba(255,255,255,0.3); transform: scale(0.8); }
            50%       { background: rgba(255,255,255,0.85); transform: scale(1.15); }
        }

        /* ─── PAGE ENTER ANIMATION ── */
        @keyframes pageEnter {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes pageExit {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-8px); }
        }
        .emp-main {
            animation: pageEnter 0.35s ease both;
        }
        .emp-main.page-exit {
            animation: pageExit 0.18s ease both;
        }
    </style>
</head>
<body>
{{-- ═══ APP SPLASH SCREEN ═══ --}}
<div id="app-splash">
    <img src="{{ asset('images/logo.jpg') }}" alt="Mekong HRM" class="splash-logo">
    <div class="splash-name">{{ $uiCompanySetting->company_name ?? 'Mekong HRM' }}</div>
    <div class="splash-tagline">HR Management System</div>
    <div class="splash-dots">
        <div class="splash-dot"></div>
        <div class="splash-dot"></div>
        <div class="splash-dot"></div>
    </div>
</div>
@php($showSalary = $uiCompanySetting?->payroll_enabled ?? true)
@php($navCount = $showSalary ? 5 : 4)
@php($routeName = request()->route()?->getName())
@php($routeDetails = [
    'employee.dashboard' => ['ផ្ទាំងគ្រប់គ្រង (Dashboard)', 'តាមដានស្ថានភាពវត្តមាននិងប្រសិទ្ធភាពការងារប្រចាំថ្ងៃ (Track attendance from dashboard).'],
    'employee.attendance.scan' => ['ស្កេនវត្តមាន (Scan Attendance)', 'គោះម៉ោងជាមួយនឹងទីតាំងពិតប្រាកដរបស់អ្នក (Submit next check-in with location).'],
    'employee.attendance.index' => ['វត្តមានរបស់ខ្ញុំ (My Attendance)', 'ពិនិត្យសកម្មភាពប្រចាំខែ និងប្រវត្តិស្កេន (Review calendar activity and logs).'],
    'employee.leave.index' => ['សំណើរបស់ខ្ញុំ (My Requests)', 'បង្កើតសំណើច្បាប់ឈប់សម្រាក ថែមម៉ោង ឬប្តូរថ្ងៃ (Create new leave or dayoff requests).'],
    'employee.salary.index' => ['ប្រាក់ខែរបស់ខ្ញុំ (My Salary)', 'ពិនិត្យប្រវត្តិប្រាក់ខែ និងទាញយកសន្លឹកបើកប្រាក់ខែ (View payroll history and details).'],
    'profile.edit' => ['គណនី (Profile)', 'គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន និងសុវត្ថិភាព (Manage personal details and security).'],
])
@php([$fallbackTitle, $fallbackDescription] = $routeDetails[$routeName] ?? ['Employee Panel', 'Manage daily HR actions from one workspace.'])

<div class="emp-shell">
    <header class="emp-topbar">
        <div class="brand-wrap">
            <div class="avatar-circle" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div>
                <p class="brand-title">{{ auth()->user()->name }}</p>
                <p class="brand-subtitle">{{ $uiCompanySetting->company_name ?? config('app.name') }}</p>
            </div>
        </div>
        <div class="top-actions">
            <!-- Language Switcher -->
            <div class="relative" x-data="{ langOpen: false }">
                <button @click="langOpen = !langOpen" @click.away="langOpen = false"
                    style="display:flex; align-items:center; gap:6px; padding:0.35rem 0.75rem; border-radius:50px; border:1.5px solid var(--line); background:#fff; font-size:0.78rem; font-weight:700; color:var(--ink); cursor:pointer; box-shadow:0 1px 3px rgba(0,0,0,0.06); transition:all 0.2s;">
                    @if(app()->getLocale() == 'km')
                        <span style="font-size:1.1rem; line-height:1;">🇰🇭</span>
                        <span>ខ្មែរ</span>
                    @else
                        <span style="font-size:1.1rem; line-height:1;">🇬🇧</span>
                        <span>EN</span>
                    @endif
                    <svg x-bind:style="langOpen ? 'transform:rotate(180deg)' : ''" style="width:10px;height:10px;transition:transform 0.2s;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <div x-show="langOpen" x-cloak
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     style="position:absolute; right:0; top:calc(100% + 8px); width:170px; background:#fff; border-radius:16px; box-shadow:0 10px 40px rgba(0,0,0,0.15); border:1px solid rgba(0,0,0,0.06); padding:6px; z-index:999;">
                    <div style="padding:8px 10px 6px; border-bottom:1px solid #f1f5f9; margin-bottom:4px;">
                        <p style="font-size:9px; font-weight:800; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em; margin:0;">{{ app()->getLocale() == 'km' ? 'ជ្រើសរើស' : 'Language' }}</p>
                    </div>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       style="display:flex; align-items:center; justify-content:space-between; gap:10px; padding:10px; border-radius:10px; text-decoration:none; {{ app()->getLocale() == 'en' ? 'background:#eff6ff; color:#1d4ed8;' : 'color:#334155;' }} transition:background 0.15s;">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span style="font-size:1.3rem; line-height:1;">🇬🇧</span>
                            <div>
                                <p style="font-size:0.82rem; font-weight:700; margin:0; line-height:1.2;">English</p>
                                <p style="font-size:0.65rem; color:#94a3b8; margin:0;">International</p>
                            </div>
                        </div>
                        @if(app()->getLocale() == 'en')
                            <svg style="width:14px;height:14px;flex-shrink:0;color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        @endif
                    </a>
                    <a href="{{ route('lang.switch', 'km') }}"
                       style="display:flex; align-items:center; justify-content:space-between; gap:10px; padding:10px; border-radius:10px; text-decoration:none; {{ app()->getLocale() == 'km' ? 'background:#eff6ff; color:#1d4ed8;' : 'color:#334155;' }} transition:background 0.15s;">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span style="font-size:1.3rem; line-height:1;">🇰🇭</span>
                            <div>
                                <p style="font-size:0.82rem; font-weight:700; margin:0; line-height:1.2;">ភាសាខ្មែរ</p>
                                <p style="font-size:0.65rem; color:#94a3b8; margin:0;">Khmer</p>
                            </div>
                        </div>
                        @if(app()->getLocale() == 'km')
                            <svg style="width:14px;height:14px;flex-shrink:0;color:#2563eb;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        @endif
                    </a>
                </div>
            </div>
            
            <a href="{{ route('profile.edit') }}">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="margin-right:3px"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                {{ __('Profile') }}
            </a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0">
                @csrf
                <button type="submit">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="margin-right:3px"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </header>

    <main class="emp-main">
        @if($showPageBanner)
            <section class="page-banner">
                <div>
                    <h1>{{ $pageTitle ?? $fallbackTitle }}</h1>
                    <p>{{ $pageDescription ?? $fallbackDescription }}</p>
                </div>
                <span class="date-chip">{{ now()->format('D, M d') }}</span>
            </section>
        @endif
        {{ $slot }}
    </main>

    <nav class="bottom-nav" style="--nav-count: {{ $navCount }};">
        <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span>{{ __('Home') }}</span>
        </a>
        <a href="{{ route('employee.attendance.scan') }}" class="{{ request()->routeIs('employee.attendance.scan') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="5" height="5" rx="1"/><rect x="16" y="3" width="5" height="5" rx="1"/><rect x="3" y="16" width="5" height="5" rx="1"/><path d="M21 16h-3a2 2 0 0 0-2 2v3"/><path d="M21 21v.01"/><path d="M12 7v3a2 2 0 0 1-2 2H7"/><path d="M3 12h.01"/><path d="M12 3h.01"/><path d="M12 16v.01"/><path d="M16 12h1"/><path d="M21 12v.01"/><path d="M12 21v-1"/></svg>
            <span>{{ __('Scan') }}</span>
        </a>
        <a href="{{ route('employee.attendance.index') }}" class="{{ request()->routeIs('employee.attendance.index') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            <span>{{ __('Attendance') }}</span>
        </a>
        <a href="{{ route('employee.leave.index') }}" class="{{ request()->routeIs('employee.leave.*', 'employee.overtime.*', 'employee.changedayoff.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
            <span>{{ __('Requests') }}</span>
        </a>
        @if($showSalary)
            <a href="{{ route('employee.salary.index') }}" class="{{ request()->routeIs('employee.salary.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                <span>{{ __('Payroll') }}</span>
            </a>
        @endif
    </nav>


</div>

<!-- PWA Install Banner -->
<div id="pwa-install-banner" style="display:none; position:fixed; bottom:calc(var(--nav-h, 70px) + 8px); left:12px; right:12px; z-index:1070;
     background:#0f4c81; color:#fff; border-radius:16px; padding:14px 16px;
     align-items:center; gap:12px; box-shadow:0 8px 32px rgba(0,0,0,0.22); backdrop-filter:blur(8px);">
    <div style="flex:1; min-width:0;">
        <div style="font-weight:700; font-size:0.88rem; line-height:1.3;">📲 Install Mekong HRM</div>
        <div style="font-size:0.75rem; opacity:0.8; margin-top:2px;">Add to Home Screen for full app experience</div>
    </div>
    <button onclick="installPWA()" style="background:#fff; color:#0f4c81; border:none; border-radius:10px;
        padding:8px 16px; font-weight:700; font-size:0.8rem; cursor:pointer; white-space:nowrap; flex-shrink:0;">
        Install
    </button>
    <button onclick="dismissInstall()" style="background:rgba(255,255,255,0.18); border:none; border-radius:8px;
        padding:8px; cursor:pointer; flex-shrink:0; line-height:1; color:#fff; font-size:1rem;">✕</button>
</div>

<div class="loading-overlay" id="loadingOverlay"><div class="spinner-border"></div></div>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
    @if(session('status'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">{{ session('status') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">{{ $errors->first() }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif
</div>

<script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js', true) }}"></script>
<script>
// ── Splash Screen ──
(function() {
    const splash = document.getElementById('app-splash');
    if (!splash) return;

    // Use localStorage so splash only shows ONCE per device/browser
    const SPLASH_KEY = 'mekong-hrm-splash-shown';
    const alreadyShown = localStorage.getItem(SPLASH_KEY);

    if (alreadyShown) {
        // Already seen - hide instantly, no splash
        splash.style.display = 'none';
        return;
    }

    // First ever launch - mark it and show splash
    localStorage.setItem(SPLASH_KEY, '1');

    function hideSplash() {
        setTimeout(() => {
            splash.classList.add('hidden');
            setTimeout(() => splash.remove(), 550);
        }, 1800);
    }

    if (document.readyState === 'complete') {
        hideSplash();
    } else {
        window.addEventListener('load', hideSplash);
        setTimeout(hideSplash, 5000); // safety fallback
    }
})();

// ── Service Worker Registration ──
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').then(reg => {
            console.log('SW registered:', reg.scope);
        }).catch(() => {});
    });
}

// ── PWA Install Prompt ──
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    const banner = document.getElementById('pwa-install-banner');
    if (banner) banner.style.display = 'flex';
});
function installPWA() {
    if (!deferredPrompt) return;
    deferredPrompt.prompt();
    deferredPrompt.userChoice.then(() => {
        deferredPrompt = null;
        const banner = document.getElementById('pwa-install-banner');
        if (banner) banner.style.display = 'none';
    });
}
function dismissInstall() {
    const banner = document.getElementById('pwa-install-banner');
    if (banner) banner.style.display = 'none';
    sessionStorage.setItem('pwa-dismissed', '1');
}
window.addEventListener('appinstalled', () => {
    const banner = document.getElementById('pwa-install-banner');
    if (banner) banner.style.display = 'none';
});
// Hide banner if dismissed before
if (sessionStorage.getItem('pwa-dismissed')) {
    const banner = document.getElementById('pwa-install-banner');
    if (banner) banner.style.display = 'none';
}

document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', (event) => {
        if (form.dataset.confirm === 'true' && !window.confirm('Are you sure you want to continue?')) {
            event.preventDefault();
            return;
        }
        // Only show loading overlay for scan/upload forms, not logout or simple nav
        const action = form.getAttribute('action') || '';
        const isLogout = action.includes('logout');
        if (!isLogout) {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) overlay.style.display = 'flex';
        }
    });
});

// ── Navigation link animation ──
// Add subtle fade transition when tapping nav links
document.querySelectorAll('.bottom-nav a, .emp-topbar a').forEach(link => {
    link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript')) return;
        e.preventDefault();
        document.querySelector('.emp-main')?.classList.add('page-exit');
        setTimeout(() => { window.location.href = href; }, 180);
    });
});

// ── Background Location Tracking ──
(function() {
    let trackingInterval = null;

    function startLocationTracking() {
        if (!navigator.geolocation) return;

        // Optional: stop attempting if we know we are checked out
        if (localStorage.getItem('stop_location_tracking') === new Date().toDateString()) {
            return;
        }

        const sendLocation = () => {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const data = {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude,
                        accuracy: position.coords.accuracy,
                        speed: position.coords.speed,
                        heading: position.coords.heading,
                    };

                    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfTokenMeta) return;

                    fetch('/employee/attendance/track-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfTokenMeta.content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    }).then(response => {
                        if (response.status === 403) {
                            // Either not checked in yet, or already checked out.
                            response.json().then(res => {
                                if (res.message && res.message.includes('already checked out')) {
                                    clearInterval(trackingInterval);
                                    localStorage.setItem('stop_location_tracking', new Date().toDateString());
                                }
                            }).catch(() => {});
                        }
                    }).catch(e => console.log('Location track error', e));
                },
                (error) => {
                    // Could not get location, ignore
                },
                { enableHighAccuracy: true, maximumAge: 0 }
            );
        };

        // If not stopped, send immediately and then every 2 minutes (120,000ms)
        sendLocation();
        trackingInterval = setInterval(sendLocation, 120000);
    }

    startLocationTracking();
})();

</script>
</body>
</html>

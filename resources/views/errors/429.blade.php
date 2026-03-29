<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Too Many Requests — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=sora:400,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(ellipse at 60% 30%, #1e0a2e 0%, #0f172a 60%, #0c0a16 100%);
            font-family: 'Sora', sans-serif;
            color: #e2e8f0;
            overflow: hidden;
        }

        /* Animated grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(168,85,247,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168,85,247,.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .card {
            text-align: center;
            padding: 3rem 2.5rem;
            max-width: 440px;
            width: 90%;
            background: rgba(15,23,42,.7);
            border: 1px solid rgba(168,85,247,.2);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 60px rgba(168,85,247,.15), 0 0 120px rgba(168,85,247,.06);
            position: relative;
            z-index: 1;
        }

        .icon-ring {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(168,85,247,.12);
            border: 2px solid rgba(168,85,247,.35);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.75rem;
            animation: pulse-glow 2.5s ease-in-out infinite;
        }
        .icon-ring i { font-size: 2.6rem; color: #c084fc; }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(168,85,247,.35); }
            50%       { box-shadow: 0 0 0 16px rgba(168,85,247,0); }
        }

        .code {
            font-size: 4.5rem;
            font-weight: 800;
            letter-spacing: -.04em;
            background: linear-gradient(135deg, #c084fc, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: .5rem;
        }

        .title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #ddd6fe;
            margin-bottom: 1rem;
        }

        .desc {
            font-size: .875rem;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .ip-badge {
            display: inline-block;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 6px;
            padding: .1rem .55rem;
            font-family: monospace;
            color: #e2e8f0;
            font-size: .85rem;
        }

        /* Countdown bar */
        .bar-wrap {
            background: rgba(255,255,255,.06);
            border-radius: 999px;
            height: 6px;
            overflow: hidden;
            margin-bottom: .6rem;
        }
        .bar {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            animation: shrink linear forwards;
            animation-duration: var(--dur, 600s);
        }
        @keyframes shrink { from { width: 100%; } to { width: 0%; } }

        .timer-label {
            font-size: .75rem;
            color: #64748b;
            margin-bottom: 1.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .8rem 1.75rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: #fff;
            font-size: .875rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity .2s, transform .2s;
            box-shadow: 0 0 20px rgba(168,85,247,.35);
        }
        .btn:hover { opacity: .9; transform: translateY(-1px); }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon-ring">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <div class="code">429</div>
        <div class="title">Too Many Requests</div>

        <p class="desc">
            Your IP address <span class="ip-badge">{{ $ip ?? request()->ip() }}</span>
            has sent too many requests in a short period.<br><br>
            Our system has temporarily blocked access to protect the application.
            Please wait <strong style="color:#c084fc">{{ $minutes ?? 10 }} minute(s)</strong> before trying again.
        </p>

        {{-- Countdown bar --}}
        @php $secs = ($minutes ?? 10) * 60; @endphp
        <div class="bar-wrap">
            <div class="bar" style="--dur: {{ $secs }}s"></div>
        </div>
        <div class="timer-label" id="timerLabel">Cooldown in progress…</div>

        <a href="/" class="btn">
            <i class="fa-solid fa-rotate-left"></i>
            Try Again
        </a>
    </div>

    <script>
        const totalSecs = {{ $secs }};
        let remaining   = totalSecs;
        const label     = document.getElementById('timerLabel');

        function fmt(s) {
            const m = Math.floor(s / 60), sec = s % 60;
            return `${m}m ${String(sec).padStart(2,'0')}s remaining`;
        }

        label.textContent = fmt(remaining);
        const interval = setInterval(() => {
            remaining--;
            if (remaining <= 0) { clearInterval(interval); label.textContent = 'You may try again now.'; }
            else { label.textContent = fmt(remaining); }
        }, 1000);
    </script>
</body>
</html>

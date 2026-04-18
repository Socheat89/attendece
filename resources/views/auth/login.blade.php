<x-guest-layout>

    {{-- Header --}}
    <div style="margin-bottom:1.75rem">
        <h2 style="font-size:1.5rem;font-weight:900;color:#eef3fe;letter-spacing:-.025em;margin:0 0 .35rem;font-family:'Sora',sans-serif">
            {{ __('Welcome Back 👋') }}
        </h2>
        <p style="font-size:.85rem;font-weight:500;color:#475569;margin:0">
            {{ __('Sign in to your Mekong CyberUnit account') }}
        </p>
    </div>

    {{-- Session Status --}}
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="display:flex;flex-direction:column;gap:1.1rem" id="loginForm">
        @csrf

        {{-- Email --}}
        <div>
            <label class="auth-label" for="email">{{ __('Email Address') }}</label>
            <div class="auth-input-wrap" style="position:relative">
                <i class="fa-solid fa-envelope auth-input-icon" style="pointer-events:none;position:absolute;left:.95rem;top:50%;transform:translateY(-50%);z-index:1;color:#60a5fa;font-size:.85rem"></i>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="you@company.com"
                    class="auth-input"
                    style="position:relative;z-index:2;cursor:text"
                >
            </div>
            @error('email')
                <div class="auth-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.45rem">
                <label class="auth-label" for="password" style="margin:0">{{ __('Password') }}</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link" style="font-size:.73rem">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>
            <div class="auth-input-wrap" style="position:relative">
                <i class="fa-solid fa-lock auth-input-icon" style="pointer-events:none;position:absolute;left:.95rem;top:50%;transform:translateY(-50%);z-index:1;color:#60a5fa;font-size:.85rem"></i>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="auth-input"
                    style="padding-right:2.8rem;position:relative;z-index:2"
                >
                <button type="button" class="pw-toggle" onclick="togglePw('password','pwEye')" tabindex="-1" style="z-index:3;position:absolute;right:.6rem;top:50%;transform:translateY(-50%)">
                    <i class="fa-solid fa-eye" id="pwEye"></i>
                </button>
            </div>


            @error('password')
                <div class="auth-error"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <label class="auth-check-label">
            <input type="checkbox" name="remember" id="remember_me">
            {{ __('Keep me signed in') }}
        </label>

        {{-- Submit --}}
        <div style="padding-top:.25rem">
            <button type="submit" class="auth-btn" id="loginBtn">
                <i class="fa-solid fa-arrow-right-to-bracket" style="font-size:.85rem"></i>
                {{ __('Sign In') }}
            </button>
        </div>

        {{-- Separator --}}
        <div class="auth-sep">
            <div class="auth-sep-line"></div>
            <div class="auth-sep-text">{{ __('New here?') }}</div>
            <div class="auth-sep-line"></div>
        </div>

        {{-- Register Link --}}
        <a href="{{ route('register') }}"
           style="display:flex;align-items:center;justify-content:center;gap:.5rem;padding:.85rem;
                  border-radius:12px;border:1.5px solid rgba(45,124,246,0.2);
                  color:#60a5fa;font-size:.88rem;font-weight:700;text-decoration:none;
                  background:rgba(45,124,246,0.05);transition:all .2s"
           onmouseover="this.style.borderColor='rgba(45,124,246,0.4)';this.style.background='rgba(45,124,246,0.1)'"
           onmouseout="this.style.borderColor='rgba(45,124,246,0.2)';this.style.background='rgba(45,124,246,0.05)'">
            <i class="fa-solid fa-building-circle-arrow-right" style="font-size:.82rem"></i>
            {{ __('Register a new company') }}
        </a>
    </form>

    <script>
        function togglePw(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa-solid fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fa-solid fa-eye';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function (e) {
            const btn = document.getElementById('loginBtn');
            btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin" style="font-size:.85rem"></i> {{ __('Authenticating...') }}';
            btn.disabled = true;
        });
    </script>

</x-guest-layout>

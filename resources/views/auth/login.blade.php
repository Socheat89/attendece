<x-guest-layout>
    <!-- Node Activation Header -->
    <div class="mb-10 text-center lg:text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 mb-4 animate-pulse">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
            <span class="text-[9px] font-black text-blue-400 uppercase tracking-widest">Login Protocol Active</span>
        </div>
        <h2 class="text-4xl font-black text-white tracking-tighter leading-tight mb-2">
            Welcome <span class="text-blue-500">Back.</span>
        </h2>
        <p class="text-[13px] font-medium text-slate-400/80 leading-relaxed">
            Initialize your session to access the Mekong CyberUnit neural network.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 rounded-2xl border-emerald-500/20 bg-emerald-500/10 text-emerald-400 px-4 py-3 text-xs font-bold shadow-lg shadow-emerald-500/5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6 group/form" id="loginForm">
        @csrf

        <!-- Email Interface -->
        <div class="space-y-2 group/input">
            <div class="flex items-center justify-between">
                <label for="email" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-blue-400 transition-colors">Neural Identity (Email)</label>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <i class="fa-solid fa-envelope-open-text text-slate-600 group-focus-within/input:text-blue-500 transition-colors"></i>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                       placeholder="user@mekong.core" 
                       class="block w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white/10 transition-all placeholder:text-slate-700 placeholder:font-medium outline-none">
                <div class="absolute inset-0 rounded-[22px] bg-gradient-to-r from-blue-500/20 to-indigo-500/20 blur opacity-0 group-focus-within/input:opacity-100 transition-opacity pointer-events-none -z-10"></div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-[10px] font-black italic text-rose-500 mt-2 ml-4 uppercase tracking-widest" />
        </div>

        <!-- Token Access Interface -->
        <div class="space-y-2 group/input">
            <div class="flex items-center justify-between">
                <label for="password" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-blue-400 transition-colors">Access Code (Password)</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[10px] font-black text-blue-500/60 hover:text-blue-400 transition-colors uppercase tracking-widest decoration-dotted underline underline-offset-4">Reset Logic?</a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <i class="fa-solid fa-shield-keyhole text-slate-600 group-focus-within/input:text-blue-500 transition-colors"></i>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password" 
                       placeholder="••••••••••••" 
                       class="block w-full pl-14 pr-14 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 focus:bg-white/10 transition-all placeholder:text-slate-700 placeholder:font-medium outline-none">
                <button type="button" class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-600 hover:text-blue-400 transition-colors" onclick="togglePw('password','pwEye')" tabindex="-1">
                    <i class="fa-solid fa-eye-low-vision" id="pwEye"></i>
                </button>
                <div class="absolute inset-0 rounded-[22px] bg-gradient-to-r from-blue-500/20 to-indigo-500/20 blur opacity-0 group-focus-within/input:opacity-100 transition-opacity pointer-events-none -z-10"></div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="text-[10px] font-black italic text-rose-500 mt-2 ml-4 uppercase tracking-widest" />
        </div>

        <!-- System Persistence -->
        <div class="flex items-center justify-between py-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group/check">
                <div class="relative">
                    <input id="remember_me" type="checkbox" name="remember" class="sr-only">
                    <div class="w-10 h-5 bg-white/5 border border-white/10 rounded-full group-hover/check:border-blue-500/50 transition-colors"></div>
                    <div class="dot absolute left-1 top-1 w-3 h-3 bg-slate-500 rounded-full transition-all group-hover/check:bg-blue-400"></div>
                </div>
                <span class="ml-3 text-[11px] font-bold text-slate-500 group-hover/check:text-slate-300 transition-colors uppercase tracking-widest">Persist Session</span>
            </label>
        </div>

        <!-- Protocol Initialization -->
        <div class="pt-4">
            <button type="submit" id="loginBtn" class="relative w-full group overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[22px] transition-all group-hover:scale-[1.05] group-active:scale-95 shadow-[0_12px_40px_-12px_rgba(37,99,235,0.6)]"></div>
                <div class="relative py-4 flex items-center justify-center gap-3">
                    <i class="fa-solid fa-ghost text-white group-hover:animate-bounce-slow"></i>
                    <span class="text-xs font-black text-white uppercase tracking-[0.3em] font-mono">Execute Login</span>
                </div>
            </button>
        </div>

        <!-- Provisioning Option -->
        <div class="mt-10 pt-8 border-t border-white/5 text-center">
            <p class="text-[11px] font-black text-slate-600 uppercase tracking-widest mb-4">Node not Provisioned?</p>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 text-xs font-black text-white hover:text-blue-400 transition-all hover:gap-4">
                <span>Request Account Access</span>
                <i class="fa-solid fa-arrow-right-long text-blue-500"></i>
            </a>
        </div>
    </form>

    <script>
        function togglePw(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa-solid fa-eye';
            } else {
                input.type = 'password';
                icon.className = 'fa-solid fa-eye-low-vision';
            }
        }

        const rememberMe = document.getElementById('remember_me');
        if(rememberMe) {
            const dot = rememberMe.nextElementSibling.nextElementSibling;
            rememberMe.addEventListener('change', function() {
                if(this.checked) {
                    dot.classList.add('translate-x-5', 'bg-blue-500');
                    dot.parentElement.querySelector('div').classList.add('bg-blue-500/20', 'border-blue-500/30');
                } else {
                    dot.classList.remove('translate-x-5', 'bg-blue-500');
                    dot.parentElement.querySelector('div').classList.remove('bg-blue-500/20', 'border-blue-500/30');
                }
            });
        }

        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('loginBtn');
            const span = btn.querySelector('span');
            const icon = btn.querySelector('i');
            
            icon.className = 'fa-solid fa-circle-notch fa-spin text-white';
            span.innerHTML = 'Authenticating Node...';
            btn.style.pointerEvents = 'none';
        });
    </script>

    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }
        .animate-bounce-slow { animation: bounce-slow 2s infinite; }
    </style>
</x-guest-layout>


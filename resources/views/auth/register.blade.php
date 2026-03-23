<x-guest-layout>
    <!-- Node Provisioning Header -->
    <div class="mb-10 text-center lg:text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 mb-4">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
            <span class="text-[9px] font-black text-indigo-400 uppercase tracking-widest">Provisioning Protocol 02</span>
        </div>
        <h2 class="text-4xl font-black text-white tracking-tighter leading-tight mb-2">
            Create <span class="text-indigo-500">Account.</span>
        </h2>
        <p class="text-[13px] font-medium text-slate-400/80 leading-relaxed">
            Register your neural signature to join the Mekong CyberUnit platform.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6 group/form" id="registerForm">
        @csrf

        <!-- Full Name Interface -->
        <div class="space-y-2 group/input">
            <label for="name" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-indigo-400 transition-colors">Entity Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <i class="fa-solid fa-user-tag text-slate-600 group-focus-within/input:text-indigo-500 transition-colors"></i>
                </div>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                       placeholder="e.g. Commander Shepard" 
                       class="block w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white/10 transition-all placeholder:text-slate-700 placeholder:font-medium outline-none">
                <div class="absolute inset-0 rounded-[22px] bg-gradient-to-r from-indigo-500/20 to-purple-500/20 blur opacity-0 group-focus-within/input:opacity-100 transition-opacity pointer-events-none -z-10"></div>
            </div>
            <x-input-error :messages="$errors->get('name')" class="text-[10px] font-black italic text-rose-500 mt-2 ml-4 uppercase tracking-widest" />
        </div>

        <!-- Email Interface -->
        <div class="space-y-2 group/input">
            <label for="email" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-indigo-400 transition-colors">Work Hub Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <i class="fa-solid fa-at text-slate-600 group-focus-within/input:text-indigo-500 transition-colors"></i>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" 
                       placeholder="entity@cyber.core" 
                       class="block w-full pl-14 pr-6 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white/10 transition-all placeholder:text-slate-700 placeholder:font-medium outline-none">
                <div class="absolute inset-0 rounded-[22px] bg-gradient-to-r from-indigo-500/20 to-purple-500/20 blur opacity-0 group-focus-within/input:opacity-100 transition-opacity pointer-events-none -z-10"></div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-[10px] font-black italic text-rose-500 mt-2 ml-4 uppercase tracking-widest" />
        </div>

        <!-- Password Interface -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2 group/input">
                <label for="password" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-indigo-400 transition-colors">Security Code</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <i class="fa-solid fa-fingerprint text-slate-600 group-focus-within/input:text-indigo-500 transition-colors"></i>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="new-password" 
                           placeholder="••••••••" 
                           class="block w-full pl-14 pr-12 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white/10 transition-all placeholder:text-slate-700 outline-none">
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-600 hover:text-indigo-400" onclick="togglePw('password','eye1')">
                        <i class="fa-solid fa-eye-low-vision" id="eye1"></i>
                    </button>
                </div>
            </div>

            <div class="space-y-2 group/input">
                <label for="password_confirmation" class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-focus-within/input:text-indigo-400 transition-colors">Verify Code</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <i class="fa-solid fa-check-double text-slate-600 group-focus-within/input:text-indigo-500 transition-colors"></i>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                           placeholder="••••••••" 
                           class="block w-full pl-14 pr-12 py-4 bg-white/5 border border-white/10 rounded-[22px] text-white font-bold text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white/10 transition-all placeholder:text-slate-700 outline-none">
                    <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-600 hover:text-indigo-400" onclick="togglePw('password_confirmation','eye2')">
                        <i class="fa-solid fa-eye-low-vision" id="eye2"></i>
                    </button>
                </div>
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="text-[10px] font-black italic text-rose-500 ml-4 uppercase tracking-widest" />

        <!-- Policy Consent -->
        <div class="flex items-start gap-4 py-2 group/consent">
            <div class="relative mt-1">
                <input type="checkbox" id="terms" required class="sr-only peer">
                <div class="w-6 h-6 rounded-lg bg-white/5 border border-white/10 peer-checked:bg-indigo-600 peer-checked:border-indigo-500 transition-all flex items-center justify-center">
                    <i class="fa-solid fa-check text-white text-[10px] opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                </div>
            </div>
            <label for="terms" class="text-[11px] font-medium text-slate-500 leading-relaxed cursor-pointer group-hover/consent:text-slate-300">
                I hereby consent to the <a href="#" class="text-indigo-400 font-black hover:underline underline-offset-4">Terms of Neural Service</a> and acknowledge the <a href="#" class="text-indigo-400 font-black hover:underline underline-offset-4">Identity Privacy Protocol</a>.
            </label>
        </div>

        <!-- Protocol Execution -->
        <div class="pt-4">
            <button type="submit" id="registerBtn" class="relative w-full group overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 rounded-[22px] transition-all group-hover:scale-[1.05] group-active:scale-95 shadow-[0_12px_40px_-12px_rgba(79,70,229,0.6)]"></div>
                <div class="relative py-4.5 flex items-center justify-center gap-3">
                    <i class="fa-solid fa-rocket-launch text-white group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    <span class="text-xs font-black text-white uppercase tracking-[0.3em] font-mono">Initialize Entity</span>
                </div>
            </button>
        </div>

        <!-- Termination Option -->
        <div class="mt-10 pt-8 border-t border-white/5 text-center">
            <p class="text-[11px] font-black text-slate-600 uppercase tracking-widest mb-4">Already Part of the Network?</p>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-xs font-black text-white hover:text-indigo-400 transition-all hover:gap-4">
                <i class="fa-solid fa-arrow-left-long text-indigo-500"></i>
                <span>Navigate to Login</span>
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

        document.getElementById('registerForm').addEventListener('submit', function () {
            const btn = document.getElementById('registerBtn');
            const span = btn.querySelector('span');
            const icon = btn.querySelector('i');
            
            icon.className = 'fa-solid fa-shuttle-space fa-spin text-white';
            span.innerHTML = 'Provisioning Entity...';
            btn.style.pointerEvents = 'none';
        });
    </script>
</x-guest-layout>


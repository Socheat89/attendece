<aside class="flex-shrink-0 w-72 bg-[#0a0f1d] min-h-screen hidden lg:flex flex-col border-r border-white/5 relative overflow-hidden">
    <!-- Sophisticated Background Glows -->
    <div class="absolute -top-32 -left-32 w-64 h-64 bg-blue-600/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-32 -right-32 w-64 h-64 bg-indigo-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="h-24 flex items-center px-8 w-full relative z-10">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 rounded-[14px] bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-xl shadow-blue-500/20 ring-1 ring-white/20">
                <i class="fa-solid fa-microchip text-xl animate-pulse"></i>
            </div>
            <div class="flex flex-col">
                <span class="font-black text-xl tracking-tight text-white leading-none">{{ $uiCompanySetting?->company_name ?? config('app.name', 'Mekong') }}</span>
                <span class="text-[9px] font-black text-blue-400 uppercase tracking-[0.2em] mt-1 opacity-70">Cyber Intelligence</span>
            </div>
        </div>
    </div>
    
    <div class="flex-1 overflow-y-auto py-6 custom-scrollbar relative z-10">
        <nav class="space-y-8 px-4">
            <!-- Team Section -->
            <div>
                <p class="px-6 text-[9px] font-black text-slate-500 uppercase tracking-[0.25em] mb-4 opacity-50">Operational Hub</p>
                <div class="space-y-1.5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-xl shadow-black/20 ring-1 ring-white/10 backdrop-blur-md' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        <i class="fa-solid fa-rocket text-base {{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-slate-500 group-hover:text-blue-400' }} transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Main Terminal</span>
                        @if(request()->routeIs('dashboard'))
                           <div class="ml-auto w-1.5 h-1.5 rounded-full bg-blue-400 shadow-[0_0_10px_#60a5fa]"></div>
                        @endif
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-users-viewfinder text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Workforce</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-fingerprint text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Attendance</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-calendar-circle-exclamation text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Leave Vault</span>
                        <span class="ml-auto bg-blue-500/10 text-blue-400 text-[10px] font-black px-2 py-0.5 rounded-lg border border-blue-500/20">04</span>
                    </a>
                </div>
            </div>

            <!-- Finance Section -->
            <div>
                <p class="px-6 text-[9px] font-black text-slate-500 uppercase tracking-[0.25em] mb-4 opacity-50">Financial Core</p>
                <div class="space-y-1.5">
                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-vault text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Payroll Engine</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-chart-line-up text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Cost Analytics</span>
                    </a>
                </div>
            </div>

            <!-- Organization Section -->
            <div>
                <p class="px-6 text-[9px] font-black text-slate-500 uppercase tracking-[0.25em] mb-4 opacity-50">Environment</p>
                <div class="space-y-1.5">
                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-network-wired text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">Neural Network</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-6 py-3.5 rounded-2xl transition-all duration-300 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-gear-code text-base text-slate-500 group-hover:text-blue-400 transition-colors"></i>
                        <span class="font-bold text-[13px] tracking-wide">System Logic</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- User Profile Area -->
    <div class="p-6 relative z-10 border-t border-white/5">
        <button x-on:click.prevent="$dispatch('open-modal', 'profile-modal')" class="w-full flex items-center gap-4 p-4 rounded-[20px] bg-white/[0.03] hover:bg-white/[0.08] transition-all duration-300 cursor-pointer group text-left ring-1 ring-white/5">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" class="w-10 h-10 rounded-xl shadow-lg group-hover:scale-105 transition-transform" />
                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-emerald-500 border-2 border-[#0a0f1d] rounded-full"></div>
            </div>
            <div class="min-w-0">
                <p class="text-[13px] font-black text-white truncate group-hover:text-blue-400 transition-colors">{{ Auth::user()->name }}</p>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-0.5">Admin Core</p>
            </div>
            <i class="fa-solid fa-shield-halved ml-auto text-slate-600 group-hover:text-blue-400 transition-colors"></i>
        </button>
    </div>
    <x-profile-modal />
</aside>


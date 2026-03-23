<nav x-data="{ open: false }" class="bg-white/70 backdrop-blur-xl border-b border-slate-200/50 z-40 sticky top-0 h-20 flex items-center shadow-lg shadow-slate-900/[0.02]">
    <div class="w-full px-4 sm:px-10">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center gap-10 flex-1">
                <!-- Mobile Menu Toggle -->
                <div class="flex items-center lg:hidden">
                    <button @click="open = ! open" class="p-2.5 rounded-2xl text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition-all active:scale-95">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                </div>

                <!-- Intelligent Command Palette Search -->
                <div class="hidden md:flex items-center max-w-lg w-full relative group">
                    <div class="absolute left-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
                    </div>
                    <input type="text" placeholder="Access system nodes, employee records, or analytical modules..." 
                           class="w-full pl-12 pr-20 py-3 bg-slate-100/50 border-none rounded-2xl text-[13px] font-bold text-slate-700 focus:ring-4 focus:ring-blue-500/10 focus:bg-white transition-all placeholder:text-slate-400 placeholder:font-medium tracking-tight" />
                    <div class="absolute right-4 flex items-center gap-1">
                        <kbd class="px-2 py-1 text-[10px] font-black text-slate-400 bg-white border border-slate-200 rounded-lg shadow-sm font-mono">⌘</kbd>
                        <kbd class="px-2 py-1 text-[10px] font-black text-slate-400 bg-white border border-slate-200 rounded-lg shadow-sm font-mono">K</kbd>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 sm:gap-6">
                <!-- Status Monitor -->
                <div class="hidden xl:flex items-center gap-2 px-4 py-2 bg-emerald-50 rounded-xl border border-emerald-100/50">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-[10px] font-black text-emerald-700 uppercase tracking-widest">{{ __('Live Sync') }}</span>
                </div>

                <!-- Notifications Hub -->
                <button class="relative p-2.5 rounded-2xl text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-all group active:scale-95">
                    <i class="fa-solid fa-bell-on text-xl group-hover:animate-swing"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-blue-500 rounded-full ring-4 ring-white"></span>
                </button>

                <!-- Profile Node Dropdown -->
                <div class="h-10 w-px bg-slate-200/60 hidden sm:block mx-1"></div>

                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-4 p-1 rounded-2xl hover:bg-slate-100/50 transition-all active:scale-[0.98] group">
                            <div class="text-right hidden sm:block">
                                <p class="text-[13px] font-black text-slate-900 leading-none group-hover:text-blue-600 transition-colors">{{ Auth::user()->name }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1.5 opacity-70">{{ Auth::user()->roles->first()->name ?? 'System Admin' }}</p>
                            </div>
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" class="w-11 h-11 rounded-[16px] shadow-lg shadow-blue-500/10 border-2 border-white transition-transform group-hover:rotate-3" />
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-4 border-white rounded-full"></div>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="p-3">
                            <div class="px-4 py-3 mb-2 bg-slate-50 rounded-2xl border border-slate-100 md:hidden">
                                <p class="text-xs font-black text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-medium text-slate-500 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <x-dropdown-link href="#" x-on:click.prevent="$dispatch('open-modal', 'profile-modal')" class="rounded-xl flex items-center gap-4 py-3.5 hover:bg-blue-50 group border border-transparent hover:border-blue-100 transition-all">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                                    <i class="fa-solid fa-user-gear"></i>
                                </div>
                                <span class="font-bold text-sm text-slate-700 group-hover:text-blue-700">{{ __('Account Settings') }}</span>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="rounded-xl flex items-center gap-4 py-3.5 hover:bg-emerald-50 group border border-transparent hover:border-emerald-100 transition-all mt-1">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all">
                                    <i class="fa-solid fa-shield-check"></i>
                                </div>
                                <span class="font-bold text-sm text-slate-700 group-hover:text-emerald-700">{{ __('Security Center') }}</span>
                            </x-dropdown-link>

                            <div class="my-3 border-t border-slate-100 mx-2"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="rounded-xl flex items-center gap-4 py-3.5 text-rose-600 hover:bg-rose-50 hover:border-rose-100 border border-transparent transition-all group"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    <div class="w-8 h-8 rounded-lg bg-rose-50 text-rose-500 flex items-center justify-center group-hover:bg-rose-500 group-hover:text-white transition-all">
                                        <i class="fa-solid fa-power-off"></i>
                                    </div>
                                    <span class="font-bold text-sm">{{ __('Terminate Session') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-md" @click="open = false" x-cloak>
        <div class="w-80 h-full bg-[#0a0f1d] p-8 flex flex-col shadow-2xl relative overflow-hidden" @click.stop x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0">
             <!-- Sidebar Glow -->
             <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-600/20 rounded-full blur-[80px] pointer-events-none"></div>

            <div class="flex items-center justify-between mb-12 relative z-10">
                <span class="font-black text-2xl text-white tracking-tighter">MEKONG<span class="text-blue-500">.CORE</span></span>
                <button @click="open = false" class="w-10 h-10 rounded-xl bg-white/5 text-slate-400 hover:text-white flex items-center justify-center transition-all"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            
            <div class="flex-1 space-y-2 relative z-10 overflow-y-auto custom-scrollbar">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-2xl py-4 px-6 border-none transition-all flex items-center gap-4 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-xl shadow-blue-900/40' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fa-solid fa-rocket-launch text-lg"></i> 
                    <span class="font-bold">{{ __('Dashboard Central') }}</span>
                </x-responsive-nav-link>
                <!-- Mobile Navigation Expansion Point -->
            </div>

            <div class="mt-auto pt-6 border-t border-white/5 relative z-10">
                <div class="flex items-center gap-4 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" class="w-10 h-10 rounded-xl" />
                    <div class="overflow-hidden">
                        <p class="text-xs font-black text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest mt-1">Authorized Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inject Profile Modal Logic -->
    <x-profile-modal />

    <style>
        @keyframes swing {
            0%, 100% { transform: rotate(0); }
            20% { transform: rotate(15deg); }
            40% { transform: rotate(-10deg); }
            60% { transform: rotate(5deg); }
            80% { transform: rotate(-5deg); }
        }
        .group-hover\:animate-swing {
            animation: swing 0.6s ease-in-out;
        }
    </style>
</nav>


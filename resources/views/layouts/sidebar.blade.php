<aside class="flex-shrink-0 w-72 bg-slate-900 min-h-screen hidden lg:flex flex-col border-r border-slate-800">
    <div class="h-24 flex items-center px-8 w-full border-b border-white/5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-900/50">
                <i class="fa-solid fa-bolt-lightning text-lg"></i>
            </div>
            <span class="font-extrabold text-2xl tracking-tight text-white">{{ $uiCompanySetting?->company_name ?? config('app.name', 'MekongCyberUnit') }}</span>
        </div>
    </div>
    
    <div class="flex-1 overflow-y-auto py-8">
        <nav class="space-y-8 px-4">
            <!-- Team Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Operations</p>
                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        <i class="fa-solid fa-grid-2 text-lg {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-blue-400' }}"></i>
                        <span class="font-bold text-sm">Dashboard</span>
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-user-group text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Employees</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-clock text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Attendance</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-calendar-check text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Leaves</span>
                        <span class="ml-auto bg-blue-500/10 text-blue-400 text-[10px] font-black px-2 py-0.5 rounded-lg border border-blue-500/20">04</span>
                    </a>
                </div>
            </div>

            <!-- Finance Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Financials</p>
                <div class="space-y-1">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-credit-card text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Payroll</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-receipt text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Expenses</span>
                    </a>
                </div>
            </div>

            <!-- Organization Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Workspace</p>
                <div class="space-y-1">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-building text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Branches</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-sitemap text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Departments</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group text-slate-400 hover:text-white hover:bg-white/5">
                        <i class="fa-solid fa-gear text-lg text-slate-500 group-hover:text-blue-400"></i>
                        <span class="font-bold text-sm">Settings</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- User Profile Area -->
    <div class="p-6 border-t border-white/5 bg-slate-900/50 backdrop-blur-md">
        <div class="flex items-center gap-3 p-3 rounded-2xl hover:bg-white/5 transition-colors cursor-pointer group">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" class="w-10 h-10 rounded-xl" />
            <div class="overflow-hidden">
                <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] font-bold text-slate-500 uppercase truncate">Super Admin</p>
            </div>
            <i class="fa-solid fa-right-from-bracket ml-auto text-slate-600 group-hover:text-red-400 transition-colors"></i>
        </div>
    </div>
</aside>

<aside class="flex-shrink-0 w-72 bg-slate-900 min-h-screen hidden lg:flex flex-col border-r border-slate-800">
    <div class="h-24 flex items-center px-8 w-full border-b border-white/5">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-900/50">
            </div>
            <span
                class="font-extrabold text-2xl tracking-tight text-white">{{ $uiCompanySetting?->company_name ?? config('app.name', 'MekongCyberUnit') }}</span>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto py-8">
        <nav class="space-y-8 px-4">
            <!-- Team Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Operations</p>
                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400 hover:text-white' }}">
                        <span class="font-bold text-sm">Dashboard</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Employees</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Attendance</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Leaves</span>
                        <span
                            class="ml-auto bg-blue-500/10 text-blue-400 text-[10px] font-black px-2 py-0.5 rounded-lg border border-blue-500/20">04</span>
                    </a>
                </div>
            </div>

            <!-- Finance Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Financials</p>
                <div class="space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Payroll</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Expenses</span>
                    </a>
                </div>
            </div>

            <!-- Organization Section -->
            <div>
                <p class="px-4 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Workspace</p>
                <div class="space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Branches</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Departments</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 transition-all duration-200 text-slate-400 hover:text-white">
                        <span class="font-bold text-sm">Settings</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>


</aside>
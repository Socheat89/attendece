<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-600/10 flex items-center justify-center text-blue-600">
                        <i class="fa-solid fa-house-chimney-window text-sm"></i>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Operational Hub') }}</span>
                </div>
                <h2 class="font-black text-4xl text-slate-900 leading-tight tracking-tighter">
                    {{ __('Command') }} <span class="text-blue-600">Center</span>
                </h2>
                <p class="text-slate-500 text-sm font-medium mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i>
                    Systems are nominal. Welcome back, {{ Auth::user()->name }}.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center bg-white border border-slate-200 rounded-2xl px-4 py-2.5 shadow-sm group hover:border-blue-400 transition-all cursor-pointer">
                    <div class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center mr-3 group-hover:bg-blue-50 transition-colors">
                        <i class="fa-solid fa-calendar-day text-slate-400 group-hover:text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase leading-none mb-1">Active Cycle</p>
                        <p class="text-sm font-bold text-slate-700 leading-none">{{ now()->format('M d, Y') }}</p>
                    </div>
                </div>
                <button class="bg-slate-900 hover:bg-black text-white px-6 py-3.5 rounded-2xl text-xs font-black uppercase tracking-[0.15em] shadow-xl shadow-slate-900/10 hover:shadow-slate-900/25 transition-all active:scale-95 flex items-center gap-3 group">
                    <i class="fa-solid fa-plus-circle text-blue-400 group-hover:rotate-90 transition-transform duration-500"></i>
                    Quick Action
                </button>
            </div>
        </div>
    </x-slot>

    <div class="space-y-10 pb-20">
        <!-- Intelligent Summary Node -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- 01 Node: Workforce -->
            <div class="bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm hover:shadow-xl hover:shadow-blue-900/[0.03] transition-all group relative overflow-hidden">
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-blue-50/30 rounded-full group-hover:scale-110 transition-transform duration-700 blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-[inset_0_2px_4px_rgba(37,99,235,0.05)] border border-blue-100/50">
                            <i class="fa-solid fa-user-astronaut text-xl"></i>
                        </div>
                        <div class="text-right">
                           <span class="text-[10px] font-black text-emerald-500 bg-emerald-50 px-3 py-1 rounded-full ring-1 ring-emerald-500/10">+12.4%</span>
                        </div>
                    </div>
                    <p class="text-slate-400 font-black text-[10px] uppercase tracking-[0.2em] mb-2 font-mono">NODE_WFRC_SUM</p>
                    <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none mb-4">1,284</h3>
                    <div class="flex items-center gap-2 pt-6 border-t border-slate-50">
                        <div class="flex -space-x-2">
                           @foreach(range(1,4) as $i)
                             <img src="https://i.pravatar.cc/100?u={{ $i }}" class="w-6 h-6 rounded-full border-2 border-white shadow-sm" />
                           @endforeach
                        </div>
                        <p class="text-slate-400 text-[11px] font-bold">+84 active</p>
                    </div>
                </div>
            </div>

            <!-- 02 Node: Attendance -->
            <div class="bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm hover:shadow-xl hover:shadow-emerald-900/[0.03] transition-all group relative overflow-hidden">
                 <div class="absolute -right-8 -top-8 w-40 h-40 bg-emerald-50/30 rounded-full group-hover:scale-110 transition-transform duration-700 blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-[inset_0_2px_4px_rgba(16,185,129,0.05)] border border-emerald-100/50">
                            <i class="fa-solid fa-fingerprint text-xl"></i>
                        </div>
                        <span class="text-[10px] font-black text-emerald-600 bg-emerald-100 px-3 py-1 rounded-full">OPTIMAL</span>
                    </div>
                    <p class="text-slate-400 font-black text-[10px] uppercase tracking-[0.2em] mb-2 font-mono">LIVE_ATT_MONITOR</p>
                    <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none mb-4">98.2<span class="text-2xl text-slate-300">%</span></h3>
                    <div class="w-full bg-slate-50 h-1.5 rounded-full overflow-hidden mt-6">
                        <div class="bg-emerald-500 h-full w-[98.2%] shadow-[0_0_8px_rgba(16,185,129,0.4)]"></div>
                    </div>
                </div>
            </div>

            <!-- 03 Node: Leaves -->
            <div class="bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm hover:shadow-xl hover:shadow-orange-900/[0.03] transition-all group relative overflow-hidden">
                 <div class="absolute -right-8 -top-8 w-40 h-40 bg-orange-50/30 rounded-full group-hover:scale-110 transition-transform duration-700 blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center shadow-[inset_0_2px_4px_rgba(249,115,22,0.05)] border border-orange-100/50">
                            <i class="fa-solid fa-calendar-circle-exclamation text-xl"></i>
                        </div>
                        <div class="w-3 h-3 rounded-full bg-orange-500 animate-ping"></div>
                    </div>
                    <p class="text-slate-400 font-black text-[10px] uppercase tracking-[0.2em] mb-2 font-mono">LEAVE_VAULT_STAT</p>
                    <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none mb-4">42</h3>
                    <p class="text-[11px] font-bold text-orange-600/80 pt-6 border-t border-slate-50 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        8 requests pending approval
                    </p>
                </div>
            </div>

            <!-- 04 Node: Payroll -->
            <div class="bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm hover:shadow-xl hover:shadow-violet-900/[0.03] transition-all group relative overflow-hidden">
                 <div class="absolute -right-8 -top-8 w-40 h-40 bg-violet-50/30 rounded-full group-hover:scale-110 transition-transform duration-700 blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="w-14 h-14 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center shadow-[inset_0_2px_4px_rgba(139,92,246,0.05)] border border-violet-100/50">
                            <i class="fa-solid fa-vault text-xl"></i>
                        </div>
                        <span class="text-[10px] font-black text-violet-500 uppercase tracking-widest leading-none">In 5 Days</span>
                    </div>
                    <p class="text-slate-400 font-black text-[10px] uppercase tracking-[0.2em] mb-2 font-mono">FIN_PAYROLL_DIST</p>
                    <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none mb-4">${{ number_format(24800, 0) }}</h3>
                    <div class="flex justify-between items-center pt-6 border-t border-slate-50">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Efficiency</span>
                        <div class="flex items-center gap-2">
                           <i class="fa-solid fa-chart-line text-violet-400"></i>
                           <span class="text-sm font-black text-slate-800">99.8%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytical Center -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- 7-Day Performance Visualization -->
            <div class="bg-white lg:col-span-2 rounded-[3rem] border border-slate-100 p-10 shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-10 opacity-[0.03] pointer-events-none group-hover:rotate-12 transition-transform duration-1000">
                    <i class="fa-solid fa-chart-mixed text-[12rem]"></i>
                </div>
                
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-4 relative z-10">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ __('Neural Performance Metrics') }}</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Cross-analyzing check-in volume vs daily targets</p>
                    </div>
                    <div class="flex p-1 bg-slate-50 rounded-2xl border border-slate-200 w-fit">
                        <button class="px-5 py-2 rounded-xl text-[10px] font-black uppercase text-white bg-slate-900 shadow-lg shadow-black/10 transition-all">Historical</button>
                        <button class="px-5 py-2 rounded-xl text-[10px] font-black uppercase text-slate-400 hover:text-slate-600 transition-all">Real-time</button>
                    </div>
                </div>
                
                <div class="flex items-end justify-between h-64 gap-6 mt-4 px-4 relative z-10">
                    @foreach([['M', 45, 'blue'], ['T', 62, 'indigo'], ['W', 85, 'blue'], ['T', 30, 'slate'], ['F', 95, 'blue'], ['S', 70, 'indigo'], ['S', 88, 'emerald']] as $data)
                        <div class="flex-1 group/bar relative h-full flex flex-col justify-end">
                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-4 bg-slate-900 text-white text-[10px] font-black px-3 py-1.5 rounded-xl opacity-0 scale-95 group-hover/bar:opacity-100 group-hover/bar:scale-100 transition-all shadow-xl z-20">
                                {{ $data[1] }}% Capacity
                            </div>
                            <div class="w-full relative bg-slate-50 rounded-2xl transition-all duration-500 group-hover/bar:bg-slate-100 overflow-hidden" 
                                 style="height: {{ $data[1] }}%">
                                <div class="absolute inset-0 bg-gradient-to-t from-{{ $data[2] ?? 'blue' }}-600 to-{{ $data[2] ?? 'blue' }}-400 opacity-80 rounded-2xl group-hover/bar:opacity-100 transition-opacity"></div>
                                <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.1)_1px,transparent_1px)] bg-[length:100%_4px]"></div>
                            </div>
                            <div class="text-[10px] font-black text-slate-500 text-center mt-4 transition-colors group-hover/bar:text-slate-900 uppercase tracking-widest">{{ $data[0] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- System Node Identity -->
            <div class="bg-slate-900 rounded-[3rem] p-10 text-white relative overflow-hidden shadow-2xl flex flex-col group">
                <!-- Cyberpunk Aesthetics -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[80px] pointer-events-none group-hover:scale-125 transition-transform duration-1000"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/20 rounded-full blur-[80px] pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col h-full">
                    <div class="flex items-center gap-5 mb-12">
                        <div class="w-16 h-16 rounded-[24px] bg-white/5 backdrop-blur-xl border border-white/20 p-1 group-hover:rotate-6 transition-transform">
                            <img class="w-full h-full rounded-[20px] object-cover shadow-2xl" src="https://ui-avatars.com/api/?name=MK&background=1e293b&color=3b82f6" alt="Identity">
                        </div>
                        <div>
                            <p class="text-blue-400 text-[9px] font-black uppercase tracking-[0.25em] mb-1 opacity-70">Main Processor</p>
                            <h4 class="font-black text-xl tracking-tight leading-none italic">MEKONG.OS</h4>
                        </div>
                    </div>

                    <div class="space-y-8 mt-4 flex-1">
                        <div class="bg-white/5 border border-white/10 p-6 rounded-3xl backdrop-blur-sm group-hover:bg-white/10 transition-colors">
                            <div class="flex justify-between items-center mb-4">
                               <span class="text-[10px] font-black text-white/50 uppercase tracking-widest">Node Latency</span>
                               <span class="text-emerald-400 text-xs font-black tracking-widest animate-pulse">0.12ms</span>
                            </div>
                            <div class="flex items-end gap-1.5 h-12">
                                @foreach(range(1,15) as $i)
                                    <div class="flex-1 bg-blue-500/30 rounded-full group-hover:bg-blue-500/60 transition-all duration-300" style="height: {{ rand(30, 100) }}%"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-white/40 font-bold uppercase tracking-widest">Memory Matrix</span>
                                <span class="text-white font-black">4.2 GB <span class="text-white/30 text-[10px]">/ 10 GB</span></span>
                            </div>
                            <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden p-0.5 border border-white/5">
                                <div class="bg-gradient-to-r from-blue-600 to-indigo-500 h-full w-[42%] rounded-full shadow-[0_0_10px_rgba(37,99,235,0.6)] animate-pulse"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-white/5">
                        <button class="w-full py-5 bg-white text-slate-900 rounded-[22px] text-xs font-black uppercase tracking-[0.2em] transition-all hover:scale-[1.02] active:scale-95 shadow-xl shadow-black/20 flex items-center justify-center gap-3 group/btn hover:bg-blue-600 hover:text-white">
                            <span>System Settings</span>
                            <i class="fa-solid fa-arrow-right-long transition-transform group-hover/btn:translate-x-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Global Activity Stream -->
            <div class="bg-white rounded-[3rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col group">
                <div class="p-10 pb-6 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ __('Live Activity Flow') }}</h3>
                        <p class="text-slate-400 text-sm font-medium">Real-time terminal check-ins from authenticated nodes</p>
                    </div>
                    <a href="#" class="w-12 h-12 rounded-2xl bg-slate-50 hover:bg-blue-600 hover:text-white flex items-center justify-center transition-all group-hover:shadow-lg group-hover:shadow-blue-500/20">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                    </a>
                </div>
                
                <div class="overflow-x-auto custom-scrollbar px-6">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] border-b border-slate-50">
                                <th class="px-6 py-8">AUTHORIZED ENTITY</th>
                                <th class="px-6 py-8 text-center">PROTOCOL STATUS</th>
                                <th class="px-6 py-8 text-right">TIMESTAMP</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50/50">
                            @foreach([
                                ['Sarah Johnson', 'On Time', '08:42:12 AM', 'https://i.pravatar.cc/150?u=1'],
                                ['Michael Chen', 'Late', '09:15:45 AM', 'https://i.pravatar.cc/150?u=2'],
                                ['Emily Davis', 'On Time', '08:55:02 AM', 'https://i.pravatar.cc/150?u=3'],
                                ['Alex Taylor', 'On Time', '08:30:15 AM', 'https://i.pravatar.cc/150?u=4'],
                            ] as $row)
                            <tr class="hover:bg-slate-50/80 transition-all duration-300 group/row">
                                <td class="px-6 py-6 flex items-center gap-6">
                                    <div class="relative">
                                       <img src="{{ $row[3] }}" class="w-12 h-12 rounded-2xl shadow-md ring-2 ring-white group-hover/row:scale-105 transition-transform" />
                                       <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full border-2 border-white {{ $row[1] == 'Late' ? 'bg-orange-500' : 'bg-emerald-500' }}"></div>
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-900 group-hover/row:text-blue-600 transition-colors">{{ $row[0] }}</p>
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mt-1">Creative Node B-01</p>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-[0.15em] {{ $row[1] == 'Late' ? 'bg-orange-50 text-orange-600 border border-orange-100' : 'bg-emerald-50 text-emerald-600 border border-emerald-100' }}">
                                        {{ $row[1] }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <p class="text-sm font-black text-slate-900 font-mono">{{ $row[2] }}</p>
                                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.1em] mt-0.5">AUTH_CLOCK_IN</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Approval Queue -->
            <div class="bg-[#f8fafc] rounded-[3rem] border border-slate-200/50 p-10 shadow-inner group">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ __('Pending Logic') }}</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Human intervention required for decisions</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 text-slate-900 text-lg font-black flex items-center justify-center shadow-sm">
                        04
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach([
                        ['Annual Leave Request', 'Alex Ray', 'BLUE'], 
                        ['Work From Home', 'Sarah Connor', 'INDIGO'], 
                        ['Medical Reimbursement', 'John Wick', 'EMERALD']
                    ] as $request)
                    <div class="p-8 bg-white rounded-[2rem] border border-slate-100 hover:border-blue-400 hover:shadow-2xl hover:shadow-blue-900/[0.05] transition-all duration-500 group/req relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-1.5 h-full bg-{{ strtolower($request[2]) }}-500 opacity-30 group-hover/req:opacity-100 transition-opacity"></div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400 group-hover/req:text-blue-600 group-hover/req:bg-blue-50 transition-all duration-500">
                                    <i class="fa-solid fa-wave-square text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-slate-900 text-base tracking-tight">{{ $request[0] }}</h4>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">PROPOSED BY {{ $request[1] }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-black text-slate-300 font-mono italic">2H_AGO</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <button class="flex-1 py-4 bg-slate-900 hover:bg-emerald-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] transition-all active:scale-95 shadow-lg shadow-black/10">Authorize</button>
                            <button class="flex-1 py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-slate-50 transition-all text-slate-600">Inspect</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <button class="mt-8 w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-3xl text-[9px] font-black uppercase tracking-[0.3em] transition-all">
                    View Complete Log
                </button>
            </div>
        </div>
    </div>
</x-app-layout>

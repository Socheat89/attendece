<x-layouts.admin>
    <div class="space-y-8">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">📋 {{ __('Activity Log') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('Track all user actions in your system') }}</p>
            </div>
        </div>

        {{-- Filters --}}
        <form method="GET" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('User') }}</label>
                    <select name="user_id" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('All Users') }}</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('HTTP Method') }}</label>
                    <select name="action" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('All Methods') }}</option>
                        @foreach(['GET','POST','PUT','PATCH','DELETE'] as $m)
                            <option value="{{ $m }}" {{ request('action') == $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Module / Route') }}</label>
                    <input type="text" name="module" value="{{ request('module') }}" placeholder="e.g. admin.employees"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('From Date') }}</label>
                    <input type="date" name="date_from" value="{{ request('date_from') }}"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('To Date') }}</label>
                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
            <div class="mt-4 flex gap-3">
                <button type="submit" class="px-5 py-2 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition">
                    <i class="fa-solid fa-filter mr-2"></i>{{ __('Filter') }}
                </button>
                <a href="{{ route('admin.security.activity-log') }}" class="px-5 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition">
                    {{ __('Reset') }}
                </a>
            </div>
        </form>

        {{-- Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50">
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('User') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Method') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Route / Module') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('IP Address') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Time') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($logs as $log)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                                            {{ substr($log->user?->name ?? '?', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">{{ $log->user?->name ?? 'System' }}</p>
                                            <p class="text-xs text-slate-400">{{ $log->user?->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $colors = ['GET'=>'bg-green-100 text-green-700','POST'=>'bg-blue-100 text-blue-700','PUT'=>'bg-yellow-100 text-yellow-700','PATCH'=>'bg-orange-100 text-orange-700','DELETE'=>'bg-red-100 text-red-700'];
                                        $color = $colors[$log->action] ?? 'bg-slate-100 text-slate-700';
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold {{ $color }}">{{ $log->action }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-slate-700 font-mono text-xs">{{ $log->module }}</p>
                                    @if($log->meta['url'] ?? null)
                                        <p class="text-xs text-slate-400 truncate max-w-xs">{{ $log->meta['url'] }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-mono text-xs text-slate-600 bg-slate-100 px-2 py-1 rounded-lg">{{ $log->ip_address ?? '—' }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-xs">
                                    <p>{{ $log->created_at->format('d M Y') }}</p>
                                    <p class="text-slate-400">{{ $log->created_at->format('H:i:s') }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-slate-400">
                                    <i class="fa-solid fa-list-check text-3xl mb-3 block opacity-30"></i>
                                    {{ __('No activity logs found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-50">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>

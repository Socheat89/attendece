<x-layouts.admin>
    <div>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Scan History: {{ $employee->user->name }}</h2>
                <p class="text-sm text-slate-500 mt-1">View attendance scan history for the selected month.</p>
            </div>
            <div class="flex items-center gap-3">
                <form method="GET" action="{{ route('admin.employees.scan-history', $employee) }}" class="flex items-center gap-2">
                    <input type="month" name="month" value="{{ $month }}" class="border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm py-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition-colors text-sm">
                        Filter
                    </button>
                </form>
                <a href="{{ route('admin.employees.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors flex items-center bg-white border border-slate-200 py-2 px-4 rounded-lg shadow-sm">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Date & Time</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Type</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Method</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($attendanceLogs as $log)
                            <tr class="hover:bg-slate-50/80 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-slate-800">{{ \Carbon\Carbon::parse($log->scanned_at)->format('M d, Y') }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($log->scanned_at)->format('h:i:s A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold
                                        {{ $log->scan_type === 'check_in' || $log->scan_type === 'resume' ? 'bg-emerald-50 text-emerald-700' : 'bg-orange-50 text-orange-700' }}">
                                        {{ ucfirst(str_replace('_', ' ', $log->scan_type)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-700">{{ ucfirst($log->method) ?? 'Unknown' }}</div>
                                    @if($log->location_name)
                                        <div class="text-xs text-slate-500 mt-0.5">
                                            <i class="fa-solid fa-location-dot mr-1"></i> {{ $log->location_name }}
                                        </div>
                                    @endif
                                    @if($log->ip_address)
                                         <div class="text-xs text-slate-400 mt-0.5">
                                            IP: {{ $log->ip_address }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($log->attendanceSession)
                                        @if($log->scan_type === 'check_in' && $log->attendanceSession->late_minutes > 0)
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                                Late: {{ $log->attendanceSession->late_minutes }}m
                                            </span>
                                        @elseif($log->scan_type === 'check_out' && $log->attendanceSession->early_leave_minutes > 0)
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                                                Early: {{ $log->attendanceSession->early_leave_minutes }}m
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-xs font-medium bg-slate-50 text-slate-600 border border-slate-200">
                                                On Time
                                            </span>
                                        @endif
                                    @else
                                        <span class="text-xs text-slate-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-4 ring-8 ring-slate-50/50">
                                        <i class="fa-regular fa-clock text-2xl text-slate-400"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-semibold mb-1">No Scan History</h3>
                                    <p class="text-slate-500 text-sm max-w-sm mx-auto">There are no attendance logs found for this employee in the selected month.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($attendanceLogs->hasPages())
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                    {{ $attendanceLogs->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Reports & Analytics</h2>
            <p class="text-sm text-slate-500 mt-1">Overview of payroll, attendance, and leave statistics</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.reports.excel') }}" class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors border border-emerald-200">
                <i class="fa-solid fa-file-excel"></i>
                Export Excel
            </a>
            <a href="{{ route('admin.reports.pdf') }}" class="inline-flex items-center gap-2 bg-red-50 text-red-700 hover:bg-red-100 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors border border-red-200">
                <i class="fa-solid fa-file-pdf"></i>
                Export PDF
            </a>
        </div>
    </div>

    <!-- Top Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-sack-dollar text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Monthly Payroll Est.</p>
            <h4 class="text-3xl font-extrabold text-slate-800">${{ number_format($monthlyPayroll,2) }}</h4>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Attendance Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h6 class="text-lg font-bold text-slate-800 mb-0">Attendance by Branch</h6>
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fa-solid fa-building"></i>
                </div>
            </div>
            <div class="p-0">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                            <th class="px-6 py-3">Branch Location</th>
                            <th class="px-6 py-3 text-right">Total Scans</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($attendanceByBranch as $row)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-700">{{ $row->branch?->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-indigo-600 text-right">{{ $row->total }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="px-6 py-8 text-center text-slate-500 text-sm">No attendance data available.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Leave Report -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
             <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h6 class="text-lg font-bold text-slate-800 mb-0">Leave by Type</h6>
                <div class="w-8 h-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center">
                    <i class="fa-solid fa-calendar-alt"></i>
                </div>
            </div>
            <div class="p-0">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                            <th class="px-6 py-3">Leave Type</th>
                            <th class="px-6 py-3 text-right">Total Requests</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($leaveByType as $row)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                     <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                                        {{ $row->leaveType?->name ?? 'N/A' }}
                                     </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-orange-600 text-right">{{ $row->total }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="px-6 py-8 text-center text-slate-500 text-sm">No leave data available.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>

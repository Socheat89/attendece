<x-layouts.admin>
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Payroll Detail</h2>
            <p class="text-sm text-slate-500 mt-1">Detailed breakdown of payroll #{{ str_pad($payroll->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.payrolls.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors flex items-center hidden sm:flex mr-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to List
            </a>
            @if($payroll->status !== 'paid')
                <form method="POST" action="{{ route('admin.payrolls.paid', $payroll) }}" class="inline">
                    @csrf 
                    @method('PATCH')
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-1 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Mark Paid
                    </button>
                </form>
            @endif
            <a href="{{ route('admin.payrolls.download', $payroll) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Download PDF
            </a>
        </div>
    </div>

    <!-- Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 pl-6 border-l-4 border-l-blue-500">
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">Employee</p>
            <div class="text-lg font-bold text-slate-800">{{ $payroll->employee->user->name }}</div>
            <p class="text-sm text-slate-500 mt-1">{{ $payroll->employee->employee_id }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 pl-6 border-l-4 border-l-indigo-500">
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">Period</p>
            <div class="text-lg font-bold text-slate-800">{{ $payroll->period_start->format('M d, Y') }}</div>
            <p class="text-sm text-slate-500 mt-1">to {{ $payroll->period_end->format('M d, Y') }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 pl-6 border-l-4 {{ $payroll->status === 'paid' ? 'border-l-emerald-500' : 'border-l-orange-400' }}">
            <p class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">Status</p>
            <div class="mt-1">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $payroll->status === 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-orange-100 text-orange-800' }}">
                    @if($payroll->status === 'paid')
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    @else
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    @endif
                    {{ ucfirst($payroll->status) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Breakdown Table -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Salary Breakdown</h3>
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white border-b border-slate-200">
                        <th class="py-3 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap">Type</th>
                        <th class="py-3 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap">Label / Description</th>
                        <th class="py-3 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach($payroll->items as $item)
                        <tr class="hover:bg-slate-50 transition-colors {{ $item->type === 'deduction' ? 'text-red-700' : 'text-slate-700' }}">
                            <td class="py-4 px-6 text-sm whitespace-nowrap font-medium">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $item->type === 'earning' ? 'bg-indigo-100 text-indigo-800' : ($item->type === 'deduction' ? 'bg-red-100 text-red-800' : 'bg-slate-100 text-slate-800') }}">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm">{{ $item->label }}</td>
                            <td class="py-4 px-6 text-sm text-right font-medium">
                                {{ $item->type === 'deduction' ? '-' : '+' }} ${{ number_format($item->amount, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-blue-50/50 border-t-2 border-slate-200">
                        <th colspan="2" class="py-4 px-6 text-base font-bold text-slate-800 text-right uppercase tracking-wide">Net Salary</th>
                        <th class="py-4 px-6 text-xl font-bold {{ $payroll->net_salary >= 0 ? 'text-emerald-700' : 'text-red-700' }} text-right whitespace-nowrap">
                            ${{ number_format($payroll->net_salary, 2) }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Bank QR Code --}}
    @if($payroll->employee->bank_qr_path)
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                </svg>
                Bank QR Code — {{ $payroll->employee->user->name }}
            </h3>
            <span class="text-xs text-slate-400">Scan to pay salary</span>
        </div>
        <div class="p-6 flex flex-col sm:flex-row items-center gap-6">
            <div class="border border-slate-200 rounded-xl p-3 bg-slate-50 flex-shrink-0">
                <img src="{{ asset('storage/' . $payroll->employee->bank_qr_path) }}"
                     alt="Bank QR Code"
                     class="w-48 h-48 object-contain">
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-semibold text-slate-700">{{ $payroll->employee->user->name }}</p>
                <p class="text-xs text-slate-500">{{ $payroll->employee->employee_id }}</p>
                <p class="text-xs text-slate-400 mt-2">សូម Scan QR Code ខាងឆ្វេងដើម្បីផ្ទេរប្រាក់ខែឱ្យបុគ្គលិក។</p>
                <p class="text-sm font-bold text-emerald-700 mt-1">Net: ${{ number_format($payroll->net_salary, 2) }}</p>
            </div>
        </div>
    </div>
    @endif

</x-layouts.admin>


<x-layouts.admin>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">{{ __('Payroll') }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ __('Manage and generate employee payrolls.') }}</p>
        </div>
        <a href="{{ route('admin.payrolls.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            {{ __('Generate Payroll') }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                        <th class="py-3 px-4">{{ __('Employee') }}</th>
                        <th class="py-3 px-4">{{ __('Basic Salary') }}</th>
                        <th class="py-3 px-4">{{ __('Overtime') }}</th>
                        <th class="py-3 px-4">{{ __('Deductions') }}</th>
                        <th class="py-3 px-4">{{ __('Net Salary') }}</th>
                        <th class="py-3 px-4">{{ __('Status') }}</th>
                        <th class="py-3 px-4 text-right">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse($payrolls as $payroll)
                    @php($deduction = $payroll->late_deduction + $payroll->leave_deduction + $payroll->other_deduction)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4">
                            <div class="font-medium text-slate-800">{{ $payroll->employee->user->name }}</div>
                            <div class="text-xs text-slate-500">{{ $payroll->period_start->format('M Y') }}</div>
                        </td>
                        <td class="py-3 px-4 text-sm text-slate-600">${{ number_format($payroll->base_salary,2) }}</td>
                        <td class="py-3 px-4 text-sm text-teal-600">${{ number_format($payroll->overtime_amount,2) }}</td>
                        <td class="py-3 px-4 text-sm text-red-600">${{ number_format($deduction,2) }}</td>
                        <td class="py-3 px-4 font-semibold text-slate-800">${{ number_format($payroll->net_salary,2) }}</td>
                        <td class="py-3 px-4">
                            @if($payroll->status === 'paid')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">{{ __('Paid') }}</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">{{ __('Pending') }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <a class="inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:text-blue-800 bg-white border border-blue-200 hover:bg-blue-50 px-3 py-1.5 rounded-md transition-colors mr-2" href="{{ route('admin.payrolls.show', $payroll) }}">{{ __('View') }}</a>
                            @if($payroll->status !== 'paid')
                                <form method="POST" action="{{ route('admin.payrolls.paid', $payroll) }}" class="inline-block">
                                    @csrf @method('PATCH')
                                    <button class="inline-flex items-center justify-center text-sm font-medium text-emerald-700 hover:text-emerald-800 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 px-3 py-1.5 rounded-md transition-colors">{{ __('Mark as Paid') }}</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="py-8 text-center text-slate-500">{{ __('No payroll records found.') }}</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($payrolls, 'links'))
        <div class="p-4 border-t border-slate-200">
            {{ $payrolls->links() }}
        </div>
        @endif
    </div>
</x-layouts.admin>

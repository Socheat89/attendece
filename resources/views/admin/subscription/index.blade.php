<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Your Subscription</h2>
            <p class="text-sm text-slate-500 mt-1">Manage your company subscription plans and billing history</p>
        </div>
    </div>

    <!-- Top Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-sack-dollar text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Monthly Spending</p>
            <h4 class="text-3xl font-extrabold text-slate-800">${{ number_format($monthlySpending, 2) }}</h4>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-calendar-check text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Status</p>
            <h4 class="text-3xl font-extrabold text-slate-800">
                @if($isSubscriptionActive)
                    <span class="text-emerald-600">Active</span>
                @elseif($isSubscriptionExpired)
                    <span class="text-rose-600">Expired</span>
                @else
                    <span class="text-slate-500">{{ ucfirst($currentCompany->status) }}</span>
                @endif
            </h4>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-clock-rotate-left text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Expiry Date</p>
            <h4 class="text-2xl font-extrabold text-slate-800">{{ $currentCompany->expiry_date?->format('M d, Y') ?? 'Never' }}</h4>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-receipt text-xl"></i>
                </div>
            </div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Spent</p>
            <h4 class="text-3xl font-extrabold text-slate-800">${{ number_format($totalSpent, 2) }}</h4>
        </div>
    </div>

    <!-- ─── Billing History / Invoices ─── -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8">
        <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
            <div>
                <h6 class="text-lg font-bold text-slate-800 mb-0">Billing History</h6>
                <p class="text-xs text-slate-400 mt-0.5">View and download your subscription invoices</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 border border-blue-200">
                    <i class="fa-solid fa-receipt mr-1.5 opacity-70"></i>
                    {{ $invoices->total() }} Invoices
                </span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                        <th class="px-6 py-4">Invoice #</th>
                        <th class="px-6 py-4">Plan Name</th>
                        <th class="px-6 py-4 text-center">Duration</th>
                        <th class="px-6 py-4 text-center">Amount</th>
                        <th class="px-6 py-4 text-center">Date Paid</th>
                        <th class="px-6 py-4 text-center">Valid Until</th>
                        <th class="px-6 py-4 text-right">Invoice PDF</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($invoices as $invoice)
                        <tr class="hover:bg-slate-50/70 transition-colors group">
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold font-mono text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-md border border-indigo-100">
                                    {{ $invoice->invoice_number }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-700 text-sm">{{ $invoice->plan_name }}</div>
                                <div class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">{{ $invoice->billing_cycle }} plan</div>
                            </td>
                            <td class="px-6 py-4 text-center text-sm font-medium text-slate-600">
                                {{ $invoice->months }} {{ $invoice->months == 1 ? 'month' : 'months' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-sm font-bold text-emerald-700">
                                    ${{ number_format($invoice->amount, 2) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-slate-500">
                                {{ $invoice->paid_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-center text-sm {{ $invoice->valid_until->isPast() ? 'text-rose-600 font-semibold' : 'text-slate-500' }}">
                                {{ $invoice->valid_until->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.invoices.download', $invoice) }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-600 text-white text-xs font-bold shadow-sm hover:bg-blue-700 transition-all duration-200">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    Download
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <p class="text-slate-400 text-sm">No billing history found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($invoices->hasPages())
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
            {{ $invoices->links() }}
        </div>
        @endif
    </div>

    <!-- Available Plans -->
    <div class="mb-6">
        <h3 class="text-lg font-bold text-slate-800 tracking-tight mb-4">Available Subscription Plans</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($plans as $plan)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col h-full hover:shadow-md transition-shadow relative {{ $currentCompany->subscription_plan_id == $plan->id ? 'ring-2 ring-blue-500' : '' }}">
                    @if($currentCompany->subscription_plan_id == $plan->id)
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Current Plan</span>
                    @endif
                    
                    <div class="flex justify-between items-start mb-4 border-b border-slate-100 pb-4">
                        <h6 class="text-lg font-bold text-slate-800">{{ $plan->name }}</h6>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                            ${{ number_format($plan->price,2) }}/mo
                        </span>
                    </div>
                    <div class="text-sm text-slate-500 mb-4 flex gap-4">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-users text-slate-400"></i> {{ $plan->employee_limit }} max</div>
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-building text-slate-400"></i> {{ $plan->branch_limit }} max</div>
                    </div>
                    <ul class="text-sm font-medium text-slate-600 space-y-2 mb-6 flex-1">
                        @foreach(is_array($plan->features) ? $plan->features : json_decode($plan->features ?? '[]', true) ?? [] as $feature)
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-check text-emerald-500 mt-1 flex-shrink-0 text-xs"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                    
                    @if($currentCompany->subscription_plan_id != $plan->id)
                        <a href="https://t.me/SOCHEAT_DOEM" target="_blank" class="w-full py-2.5 bg-slate-50 text-slate-600 font-bold text-xs rounded-xl border border-slate-200 hover:bg-white hover:text-blue-600 hover:border-blue-200 text-center transition-all">
                            Upgrade Plan
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.admin>

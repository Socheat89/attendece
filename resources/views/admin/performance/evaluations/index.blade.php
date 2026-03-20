<x-layouts.admin>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">🏆 {{ __('Employee Evaluations') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('Monthly and yearly performance reviews.') }}</p>
            </div>
            <a href="{{ route('admin.performance.evaluations.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold shadow-md hover:-translate-y-0.5 transition-all">
                <i class="fa-solid fa-plus"></i> {{ __('New Evaluation') }}
            </a>
        </div>

        {{-- Filters --}}
        <form method="GET" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Employee') }}</label>
                    <select name="employee_id" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('All Employees') }}</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ request('employee_id') == $emp->id ? 'selected' : '' }}>{{ $emp->user?->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Period Type') }}</label>
                    <select name="period_type" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('All Periods') }}</option>
                        <option value="monthly" {{ request('period_type')=='monthly' ? 'selected' : '' }}>{{ __('Monthly') }}</option>
                        <option value="quarterly" {{ request('period_type')=='quarterly' ? 'selected' : '' }}>{{ __('Quarterly') }}</option>
                        <option value="yearly" {{ request('period_type')=='yearly' ? 'selected' : '' }}>{{ __('Yearly') }}</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Status') }}</label>
                    <select name="status" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('All Status') }}</option>
                        <option value="draft" {{ request('status')=='draft' ? 'selected' : '' }}>Draft</option>
                        <option value="submitted" {{ request('status')=='submitted' ? 'selected' : '' }}>Submitted</option>
                        <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 flex gap-3">
                <button type="submit" class="px-5 py-2 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition">
                    <i class="fa-solid fa-filter mr-2"></i>{{ __('Filter') }}
                </button>
                <a href="{{ route('admin.performance.evaluations.index') }}" class="px-5 py-2 rounded-xl border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition">{{ __('Reset') }}</a>
            </div>
        </form>

        {{-- Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50">
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Employee') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Period') }}</th>
                            <th class="text-center px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Score') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Status') }}</th>
                            <th class="text-left px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Evaluator') }}</th>
                            <th class="text-right px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($evaluations as $eval)
                            @php
                                $score = $eval->total_score ?? 0;
                                $scoreColor = $score >= 80 ? 'text-green-600 bg-green-100' : ($score >= 60 ? 'text-yellow-600 bg-yellow-100' : 'text-red-600 bg-red-100');
                                $statusColors = ['draft'=>'bg-slate-100 text-slate-600','submitted'=>'bg-blue-100 text-blue-700','approved'=>'bg-green-100 text-green-700'];
                            @endphp
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-800">{{ $eval->employee?->name ?? '—' }}</p>
                                    <p class="text-xs text-slate-400">{{ $eval->employee?->department?->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-700 capitalize">{{ $eval->period_type }}</span>
                                    <p class="text-xs text-slate-400 mt-1">{{ $eval->period_start->format('d M') }} – {{ $eval->period_end->format('d M Y') }}</p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($eval->total_score !== null)
                                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full text-sm font-extrabold {{ $scoreColor }}">
                                            {{ number_format($eval->total_score, 0) }}
                                        </span>
                                    @else
                                        <span class="text-xs text-slate-400">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold capitalize {{ $statusColors[$eval->status] ?? 'bg-slate-100 text-slate-600' }}">
                                        {{ $eval->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-sm">{{ $eval->evaluator?->name ?? '—' }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('admin.performance.evaluations.show', $eval) }}"
                                            class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                                            <i class="fa-solid fa-eye mr-1"></i>{{ __('View') }}
                                        </a>
                                        @if($eval->status === 'draft')
                                            <form method="POST" action="{{ route('admin.performance.evaluations.approve', $eval) }}">
                                                @csrf @method('PATCH')
                                                <button type="submit"
                                                    class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-green-100 text-green-700 hover:bg-green-200 transition">
                                                    <i class="fa-solid fa-check mr-1"></i>{{ __('Approve') }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-slate-400">
                                    <i class="fa-solid fa-clipboard-list text-3xl mb-3 block opacity-30"></i>
                                    {{ __('No evaluations found. Create one to get started.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-50">{{ $evaluations->links() }}</div>
        </div>
    </div>
</x-layouts.admin>

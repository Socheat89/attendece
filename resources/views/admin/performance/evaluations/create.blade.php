<x-layouts.admin>
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.performance.evaluations.index') }}"
                class="text-slate-400 hover:text-slate-700 transition">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">✍️ {{ __('New Evaluation') }}</h1>
                <p class="text-sm text-slate-500 mt-0.5">{{ __('Score an employee across all active KPIs.') }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.performance.evaluations.store') }}" class="space-y-8">
            @csrf

            {{-- Basic Info --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="font-bold text-slate-800 mb-5">{{ __('Evaluation Details') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Employee') }} *</label>
                        <select name="employee_id" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">-- {{ __('Select Employee') }} --</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->user?->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Period Type') }} *</label>
                        <select name="period_type" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="monthly" {{ old('period_type','monthly')=='monthly' ? 'selected' : '' }}>{{ __('Monthly') }}</option>
                            <option value="quarterly" {{ old('period_type')=='quarterly' ? 'selected' : '' }}>{{ __('Quarterly') }}</option>
                            <option value="yearly" {{ old('period_type')=='yearly' ? 'selected' : '' }}>{{ __('Yearly') }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Period Start') }} *</label>
                        <input type="date" name="period_start" value="{{ old('period_start') }}" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Period End') }} *</label>
                        <input type="date" name="period_end" value="{{ old('period_end') }}" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Remarks') }}</label>
                        <textarea name="remarks" rows="2" placeholder="{{ __('Overall remarks...') }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('remarks') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- KPI Scoring --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100">
                    <h3 class="font-bold text-slate-800">{{ __('KPI Scores') }} <span class="text-slate-400 font-normal text-sm">(0–100)</span></h3>
                    <p class="text-xs text-slate-400 mt-1">{{ __('Final score is weighted average of all KPIs.') }}</p>
                </div>

                @if($kpis->isEmpty())
                    <div class="py-12 text-center text-slate-400">
                        <i class="fa-solid fa-chart-bar text-3xl mb-2 block opacity-30"></i>
                        <p class="text-sm">{{ __('No active KPIs found. Please create KPIs first.') }}</p>
                        <a href="{{ route('admin.performance.kpi.index') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">
                            → {{ __('Go to KPI Setup') }}
                        </a>
                    </div>
                @else
                    @foreach($kpis->groupBy('category.name') as $catName => $catKpis)
                        <div class="px-6 py-3 bg-slate-50 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $catName }}</p>
                        </div>
                        @foreach($catKpis as $kpi)
                            <div class="flex items-center gap-6 px-6 py-4 border-b border-slate-50 last:border-0">
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-slate-800">{{ $kpi->name }}</p>
                                    @if($kpi->description)
                                        <p class="text-xs text-slate-400 mt-0.5">{{ $kpi->description }}</p>
                                    @endif
                                    <p class="text-xs text-indigo-600 font-semibold mt-0.5">{{ __('Weight') }}: {{ $kpi->weight }}%</p>
                                </div>
                                <div class="w-32">
                                    <input type="number" name="scores[{{ $kpi->id }}]"
                                        min="0" max="100" step="0.5" required
                                        value="{{ old("scores.{$kpi->id}", 50) }}"
                                        placeholder="0–100"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-center font-bold focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>
                                <div class="w-48">
                                    <input type="text" name="notes[{{ $kpi->id }}]"
                                        value="{{ old("notes.{$kpi->id}") }}"
                                        placeholder="{{ __('Note (optional)') }}"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-400">
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>

            {{-- Submit --}}
            @if($kpis->isNotEmpty())
                <div class="flex gap-4">
                    <button type="submit"
                        class="flex-1 py-3.5 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-md hover:-translate-y-0.5 transition-all">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>{{ __('Save Evaluation') }}
                    </button>
                    <a href="{{ route('admin.performance.evaluations.index') }}"
                        class="px-8 py-3.5 rounded-2xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition text-center">
                        {{ __('Cancel') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-layouts.admin>

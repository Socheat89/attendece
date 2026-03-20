<x-layouts.admin>
    <div class="max-w-4xl mx-auto space-y-8">
        {{-- Header --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.performance.evaluations.index') }}"
                class="w-9 h-9 rounded-xl border border-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-50 transition">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">📋 {{ __('Evaluation Details') }}</h1>
                <p class="text-sm text-slate-500 mt-0.5">{{ $evaluation->employee?->user?->name }} — {{ ucfirst($evaluation->period_type) }}</p>
            </div>
            @php
                $statusColors = ['draft'=>'bg-slate-100 text-slate-600','submitted'=>'bg-blue-100 text-blue-700','approved'=>'bg-green-100 text-green-700'];
            @endphp
            <span class="ml-auto px-3 py-1.5 rounded-full text-xs font-bold capitalize {{ $statusColors[$evaluation->status] ?? 'bg-slate-100 text-slate-600' }}">
                {{ $evaluation->status }}
            </span>
        </div>

        {{-- Info Cards Row --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 text-center">
                @php
                    $score = $evaluation->total_score ?? 0;
                    $scoreColor = $score >= 80 ? 'text-green-600' : ($score >= 60 ? 'text-yellow-600' : 'text-red-500');
                    $bgColor    = $score >= 80 ? 'bg-green-50' : ($score >= 60 ? 'bg-yellow-50' : 'bg-red-50');
                @endphp
                <div class="w-16 h-16 rounded-full {{ $bgColor }} flex items-center justify-center mx-auto mb-2">
                    <span class="text-2xl font-extrabold {{ $scoreColor }}">{{ number_format($score, 0) }}</span>
                </div>
                <p class="text-xs font-bold text-slate-500">{{ __('Total Score') }}</p>
                <p class="text-[10px] text-slate-400">/100</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                <p class="text-xs font-bold text-slate-400 mb-1">{{ __('Period Type') }}</p>
                <p class="text-sm font-bold text-slate-800 capitalize">{{ $evaluation->period_type }}</p>
                <p class="text-xs text-slate-400 mt-1">
                    {{ $evaluation->period_start->format('d M Y') }} – {{ $evaluation->period_end->format('d M Y') }}
                </p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                <p class="text-xs font-bold text-slate-400 mb-1">{{ __('Employee') }}</p>
                <p class="text-sm font-bold text-slate-800">{{ $evaluation->employee?->user?->name ?? '—' }}</p>
                <p class="text-xs text-slate-400 mt-1">{{ $evaluation->employee?->department?->name }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                <p class="text-xs font-bold text-slate-400 mb-1">{{ __('Evaluator') }}</p>
                <p class="text-sm font-bold text-slate-800">{{ $evaluation->evaluator?->name ?? '—' }}</p>
                <p class="text-xs text-slate-400 mt-1">{{ $evaluation->created_at->format('d M Y') }}</p>
            </div>
        </div>

        {{-- Remarks --}}
        @if($evaluation->remarks)
            <div class="bg-amber-50 border border-amber-200 rounded-2xl px-6 py-4 flex items-start gap-3">
                <i class="fa-solid fa-comment-dots text-amber-500 mt-0.5"></i>
                <div>
                    <p class="text-xs font-bold text-amber-700 mb-1">{{ __('Remarks') }}</p>
                    <p class="text-sm text-amber-800">{{ $evaluation->remarks }}</p>
                </div>
            </div>
        @endif

        {{-- KPI Scores Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100">
                <h3 class="font-bold text-slate-800">{{ __('KPI Scores') }}</h3>
            </div>

            @php $groupedScores = $evaluation->scores->groupBy('kpi.category.name'); @endphp

            @foreach($groupedScores as $catName => $scores)
                <div class="px-6 py-2.5 bg-slate-50 border-b border-slate-100">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $catName ?? __('Uncategorized') }}</p>
                </div>
                @foreach($scores as $score)
                    @php
                        $s = $score->score;
                        $barColor = $s >= 80 ? 'bg-green-500' : ($s >= 60 ? 'bg-yellow-500' : 'bg-red-400');
                        $textColor = $s >= 80 ? 'text-green-700 bg-green-100' : ($s >= 60 ? 'text-yellow-700 bg-yellow-100' : 'text-red-700 bg-red-100');
                    @endphp
                    <div class="px-6 py-4 border-b border-slate-50 last:border-0">
                        <div class="flex items-start justify-between gap-4 mb-2">
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-800">{{ $score->kpi?->name }}</p>
                                @if($score->note)
                                    <p class="text-xs text-slate-400 italic mt-0.5">{{ $score->note }}</p>
                                @endif
                            </div>
                            <div class="text-right flex-shrink-0">
                                <span class="inline-flex items-center justify-center w-12 h-8 rounded-lg text-sm font-extrabold {{ $textColor }}">
                                    {{ number_format($s, 0) }}
                                </span>
                                <p class="text-[10px] text-slate-400 mt-0.5">{{ __('Weight') }}: {{ $score->kpi?->weight }}%</p>
                            </div>
                        </div>
                        {{-- Progress bar --}}
                        <div class="w-full bg-slate-100 rounded-full h-1.5">
                            <div class="{{ $barColor }} h-1.5 rounded-full transition-all duration-700"
                                style="width: {{ min($s, 100) }}%"></div>
                        </div>
                    </div>
                @endforeach
            @endforeach

            @if($evaluation->scores->isEmpty())
                <div class="px-6 py-12 text-center text-slate-400 text-sm">{{ __('No scores recorded.') }}</div>
            @endif
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4">
            @if($evaluation->status === 'draft')
                <form method="POST" action="{{ route('admin.performance.evaluations.approve', $evaluation) }}">
                    @csrf @method('PATCH')
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-green-600 text-white text-sm font-bold hover:bg-green-700 transition shadow-md shadow-green-200">
                        <i class="fa-solid fa-circle-check"></i> {{ __('Approve Evaluation') }}
                    </button>
                </form>
            @endif
            <form method="POST" action="{{ route('admin.performance.evaluations.destroy', $evaluation) }}">
                @csrf @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Delete this evaluation?')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-red-200 text-red-500 text-sm font-semibold hover:bg-red-50 transition">
                    <i class="fa-solid fa-trash-can"></i> {{ __('Delete') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.admin>

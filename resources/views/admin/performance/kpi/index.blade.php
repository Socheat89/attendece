<x-layouts.admin>
    <div class="space-y-8">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">📊 {{ __('KPI Management') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('Define Key Performance Indicators for employee evaluation.') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left: Add Category + Add KPI forms --}}
            <div class="space-y-6">
                {{-- Add Category --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-slate-800 mb-4">{{ __('New Category') }}</h3>
                    <form method="POST" action="{{ route('admin.performance.kpi.category.store') }}" class="space-y-3">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Category Name') }}</label>
                            <input type="text" name="name" required placeholder="{{ __('e.g. Productivity') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Color') }}</label>
                            <input type="color" name="color" value="#3B82F6"
                                class="w-full h-10 rounded-xl border border-slate-200 cursor-pointer">
                        </div>
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition">
                            <i class="fa-solid fa-plus mr-1"></i> {{ __('Add Category') }}
                        </button>
                    </form>
                </div>

                {{-- Add KPI --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-slate-800 mb-4">{{ __('New KPI') }}</h3>
                    <form method="POST" action="{{ route('admin.performance.kpi.store') }}" class="space-y-3">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Category') }}</label>
                            <select name="kpi_category_id" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- {{ __('Select Category') }} --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('KPI Name') }}</label>
                            <input type="text" name="name" required placeholder="{{ __('e.g. Attendance Rate') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">{{ __('Description') }}</label>
                            <textarea name="description" rows="2" placeholder="{{ __('Optional...') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1">
                                {{ __('Weight') }} <span class="text-slate-400">({{ __('1-100, used in scoring') }})</span>
                            </label>
                            <input type="number" name="weight" value="10" min="1" max="100" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 transition">
                            <i class="fa-solid fa-plus mr-1"></i> {{ __('Add KPI') }}
                        </button>
                    </form>
                </div>
            </div>

            {{-- Right: KPI list by category --}}
            <div class="lg:col-span-2 space-y-5">
                @forelse($categories as $category)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        {{-- Category Header --}}
                        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100"
                            style="border-left: 4px solid {{ $category->color }}">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 rounded-full" style="background: {{ $category->color }}"></div>
                                <h3 class="font-bold text-slate-800">{{ $category->name }}</h3>
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">{{ $category->kpis->count() }} KPIs</span>
                            </div>
                            <form method="POST" action="{{ route('admin.performance.kpi.category.destroy', $category) }}">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this category and all its KPIs?')"
                                    class="text-slate-400 hover:text-red-500 transition p-1">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>

                        {{-- KPI rows --}}
                        @forelse($category->kpis as $kpi)
                            <div class="flex items-center justify-between px-6 py-3.5 border-b border-slate-50 last:border-0 hover:bg-slate-50 transition">
                                <div>
                                    <p class="text-sm font-semibold text-slate-800 flex items-center gap-2">
                                        {{ $kpi->name }}
                                        @if(!$kpi->is_active)
                                            <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-400 text-[10px] font-bold uppercase">{{ __('Inactive') }}</span>
                                        @endif
                                    </p>
                                    @if($kpi->description)
                                        <p class="text-xs text-slate-400 mt-0.5">{{ $kpi->description }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-700">
                                        {{ __('Weight') }}: {{ $kpi->weight }}%
                                    </span>
                                    <form method="POST" action="{{ route('admin.performance.kpi.toggle', $kpi) }}">
                                        @csrf @method('PATCH')
                                        <button type="submit" title="{{ __('Toggle active') }}"
                                            class="p-1.5 rounded-lg text-slate-400 hover:text-yellow-600 hover:bg-yellow-50 transition">
                                            <i class="fa-solid fa-power-off text-sm"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.performance.kpi.destroy', $kpi) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this KPI?')"
                                            class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition">
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="px-6 py-4 text-sm text-slate-400 italic">{{ __('No KPIs in this category yet.') }}</p>
                        @endforelse
                    </div>
                @empty
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 py-20 text-center">
                        <i class="fa-solid fa-chart-bar text-4xl text-slate-300 mb-4 block"></i>
                        <p class="font-bold text-slate-600">{{ __('No KPI categories yet') }}</p>
                        <p class="text-sm text-slate-400 mt-1">{{ __('Create a category first, then add KPIs inside it.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.admin>

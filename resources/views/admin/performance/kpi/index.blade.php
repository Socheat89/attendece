<x-layouts.admin>
    <div class="space-y-8" x-data="{ showCategoryModal: false }">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">📊 {{ __('KPI Management') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('Define Key Performance Indicators for employee evaluation.') }}</p>
            </div>
            {{-- Create Category Button --}}
            <button @click="showCategoryModal = true"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold shadow-md shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-0.5 transition-all">
                <i class="fa-solid fa-folder-plus"></i> {{ __('New Category') }}
            </button>
        </div>

        {{-- New Category Modal --}}
        <div x-show="showCategoryModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;">

            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"
                @click="showCategoryModal = false"></div>

            {{-- Modal Card --}}
            <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 z-10"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-4">

                {{-- Modal Header --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                            <i class="fa-solid fa-folder-plus text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">{{ __('New Category') }}</h3>
                    </div>
                    <button @click="showCategoryModal = false"
                        class="w-8 h-8 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition flex items-center justify-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                {{-- Category Form --}}
                <form method="POST" action="{{ route('admin.performance.kpi.category.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">
                            {{ __('Category Name') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" required autofocus
                            placeholder="{{ __('e.g. Productivity') }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Color') }}</label>
                        <div class="flex items-center gap-3">
                            <input type="color" name="color" value="#3B82F6" id="categoryColor"
                                class="w-12 h-12 rounded-xl border border-slate-200 cursor-pointer p-1">
                            <p class="text-xs text-slate-400">{{ __('Choose a color to identify this category') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-plus"></i> {{ __('Add Category') }}
                        </button>
                        <button type="button" @click="showCategoryModal = false"
                            class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Layout: Add KPI (left) + KPI list (right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Add KPI form --}}
            <div>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sticky top-6">
                    <h3 class="font-bold text-slate-800 mb-5 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-indigo-100 flex items-center justify-center">
                            <i class="fa-solid fa-chart-column text-indigo-600 text-xs"></i>
                        </span>
                        {{ __('New KPI') }}
                    </h3>
                    <form method="POST" action="{{ route('admin.performance.kpi.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">
                                {{ __('Category') }} <span class="text-red-500">*</span>
                            </label>
                            <select name="kpi_category_id" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- {{ __('Select Category') }} --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">
                                {{ __('KPI Name') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" required placeholder="{{ __('e.g. Attendance Rate') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Description') }}</label>
                            <textarea name="description" rows="2" placeholder="{{ __('Optional...') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">
                                {{ __('Weight') }}
                                <span class="text-slate-400 font-normal">({{ __('1-100, used in scoring') }})</span>
                            </label>
                            <input type="number" name="weight" value="10" min="1" max="100" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <button type="submit"
                            class="w-full py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-plus"></i> {{ __('Add KPI') }}
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
                                <div class="w-4 h-4 rounded-full shadow-sm" style="background: {{ $category->color }}"></div>
                                <h3 class="font-bold text-slate-800">{{ $category->name }}</h3>
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">
                                    {{ $category->kpis->count() }} KPIs
                                </span>
                            </div>
                            <form method="POST" action="{{ route('admin.performance.kpi.category.destroy', $category) }}">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('{{ __('Delete this category and all its KPIs?') }}')"
                                    class="text-slate-300 hover:text-red-500 hover:bg-red-50 transition p-1.5 rounded-lg">
                                    <i class="fa-solid fa-trash-can text-sm"></i>
                                </button>
                            </form>
                        </div>

                        {{-- KPI rows --}}
                        @forelse($category->kpis as $kpi)
                            <div class="flex items-center justify-between px-6 py-3.5 border-b border-slate-50 last:border-0 hover:bg-slate-50/70 transition">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-800 flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background: {{ $category->color }}"></span>
                                        {{ $kpi->name }}
                                        @if(!$kpi->is_active)
                                            <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-400 text-[10px] font-bold uppercase tracking-wide">
                                                {{ __('Inactive') }}
                                            </span>
                                        @endif
                                    </p>
                                    @if($kpi->description)
                                        <p class="text-xs text-slate-400 mt-0.5 ml-3.5">{{ $kpi->description }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0 ml-4">
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $kpi->weight }}%
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
                                        <button type="submit"
                                            onclick="return confirm('{{ __('Delete this KPI?') }}')"
                                            class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-6 text-center">
                                <p class="text-sm text-slate-400 italic">{{ __('No KPIs in this category yet.') }}</p>
                                <p class="text-xs text-slate-300 mt-1">{{ __('Use the form on the left to add KPIs.') }}</p>
                            </div>
                        @endforelse
                    </div>
                @empty
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 py-24 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-chart-bar text-3xl text-slate-300"></i>
                        </div>
                        <p class="font-bold text-slate-600">{{ __('No KPI categories yet') }}</p>
                        <p class="text-sm text-slate-400 mt-1 mb-5">{{ __('Create a category first, then add KPIs inside it.') }}</p>
                        <button @click="showCategoryModal = true"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition">
                            <i class="fa-solid fa-folder-plus"></i> {{ __('New Category') }}
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.admin>

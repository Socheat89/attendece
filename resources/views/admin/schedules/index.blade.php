<x-layouts.admin>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">{{ __('Attendance Time Settings') }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ __('Configure check-in/out time and scan count (2 or 4)') }}</p>
        </div>
        <a href="{{ route('admin.schedules.create', ['branch_id' => $branchId]) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            {{ __('Add Schedule') }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 mb-6">
        <form method="GET" class="flex flex-col md:flex-row items-end gap-4">
            <div class="w-full md:w-1/3">
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Filter by Branch') }}</label>
                <select name="branch_id" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm py-2" onchange="this.form.submit()">
                    <option value="">{{ __('All Branches / Global Schedule') }}</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" @selected($branchId == $branch->id)>{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pb-1 text-sm text-slate-500">
                 @if($branchId)
                    {{ __('Displaying schedules specific to selected branch.') }}
                 @else
                    {{ __('Displaying default global schedules.') }}
                 @endif
            </div>
        </form>
    </div>

    @if(session('status'))
        <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg p-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <p class="text-sm font-medium">{{ session('status') }}</p>
            </div>
            <button @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                        <th class="py-3 px-4">{{ __('Day') }}</th>
                        <th class="py-3 px-4">{{ __('Morning In') }}</th>
                        <th class="py-3 px-4">{{ __('Lunch Out') }}</th>
                        <th class="py-3 px-4">{{ __('Lunch In') }}</th>
                        <th class="py-3 px-4">{{ __('Evening Out') }}</th>
                        <th class="py-3 px-4">{{ __('Scan Count') }}</th>
                        <th class="py-3 px-4 text-right">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($dayNames as $num => $name)
                        @php 
                            $schedule = $schedules->get($num); 
                            $hasSchedule = !is_null($schedule);
                            $scanCount = ($schedule?->lunch_out && $schedule?->lunch_in)
                                ? (app()->getLocale() === 'km' ? '4 ដង' : '4 Scans')
                                : (app()->getLocale() === 'km' ? '2 ដង' : '2 Scans');
                        @endphp
                        <tr class="hover:bg-slate-50 transition-colors {{ !$hasSchedule ? 'bg-slate-50/50' : '' }}">
                            <td class="py-3 px-4 font-medium {{ $hasSchedule ? 'text-slate-800' : 'text-slate-500' }}">{{ $name }}</td>
                            <td class="py-3 px-4 text-sm {{ $hasSchedule ? 'text-slate-900 font-medium' : 'text-slate-400' }}">{{ $schedule?->morning_in ? \Carbon\Carbon::parse($schedule->morning_in)->format('H:i') : '—' }}</td>
                            <td class="py-3 px-4 text-sm {{ $hasSchedule ? 'text-slate-600' : 'text-slate-400' }}">{{ $schedule?->lunch_out  ? \Carbon\Carbon::parse($schedule->lunch_out)->format('H:i')  : '—' }}</td>
                            <td class="py-3 px-4 text-sm {{ $hasSchedule ? 'text-slate-600' : 'text-slate-400' }}">{{ $schedule?->lunch_in   ? \Carbon\Carbon::parse($schedule->lunch_in)->format('H:i')   : '—' }}</td>
                            <td class="py-3 px-4 text-sm {{ $hasSchedule ? 'text-slate-900 font-medium' : 'text-slate-400' }}">{{ $schedule?->evening_out? \Carbon\Carbon::parse($schedule->evening_out)->format('H:i'): '—' }}</td>
                            <td class="py-3 px-4 text-sm {{ $hasSchedule ? 'text-slate-900 font-medium' : 'text-slate-400' }}">{{ $hasSchedule ? $scanCount : '—' }}</td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                @if($schedule)
                                    <a href="{{ route('admin.schedules.edit', $schedule) }}" class="inline-flex items-center justify-center text-sm font-medium text-slate-700 hover:text-blue-600 bg-white border border-slate-300 hover:border-blue-300 hover:bg-blue-50 px-3 py-1.5 rounded-md transition-colors mr-2">{{ __('Edit') }}</a>
                                    <form method="POST" action="{{ route('admin.schedules.destroy', $schedule) }}" class="inline-block" data-confirm="true">
                                        @csrf @method('DELETE')
                                        <button class="inline-flex items-center justify-center text-sm font-medium text-slate-700 hover:text-red-700 bg-white border border-slate-300 hover:border-red-300 hover:bg-red-50 px-3 py-1.5 rounded-md transition-colors">{{ __('Delete') }}</button>
                                    </form>
                                @else
                                    <a href="{{ route('admin.schedules.create', ['branch_id' => $branchId, 'day_of_week' => $num]) }}"
                                       class="inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 border border-blue-200 px-4 py-1.5 rounded-md transition-colors">{{ __('Set') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
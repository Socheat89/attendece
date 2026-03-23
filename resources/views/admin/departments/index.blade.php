<x-layouts.admin>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 leading-tight">{{ __('Departments') }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ __('Manage organization structure and divisions.') }}</p>
        </div>
        <a href="{{ route('admin.departments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            {{ __('Add Department') }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                        <th class="py-3 px-4">{{ __('Name') }}</th>
                        <th class="py-3 px-4">{{ __('Branch') }}</th>
                        <th class="py-3 px-4">{{ __('Status') }}</th>
                        <th class="py-3 px-4 text-right">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse($departments as $department)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4 font-medium text-slate-800">{{ $department->name }}</td>
                        <td class="py-3 px-4 text-sm text-slate-600">
                            @if($department->branch)
                                {{ $department->branch->name }}
                            @else
                                <span class="text-slate-400 italic">{{ __('Global') }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($department->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    {{ __('Active') }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-50 text-slate-600 border border-slate-200">
                                    {{ __('Inactive') }}
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.departments.edit', $department) }}" class="inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:text-blue-800 bg-white border border-blue-200 hover:bg-blue-50 px-3 py-1.5 rounded-md transition-colors">
                                    {{ __('Edit') }}
                                </a>
                                <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" class="inline-block" data-confirm="true">
                                    @csrf @method('DELETE')
                                    <button class="inline-flex items-center justify-center text-sm font-medium text-red-600 hover:text-red-800 bg-white border border-red-200 hover:bg-red-50 px-3 py-1.5 rounded-md transition-colors">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-8 text-center text-slate-500">{{ __('No departments found.') }}</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($departments->hasPages())
            <div class="p-4 border-t border-slate-200">
                {{ $departments->links() }}
            </div>
        @endif
    </div>
</x-layouts.admin>

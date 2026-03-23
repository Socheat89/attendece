<x-layouts.admin>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        <!-- Page Header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">
                    {{ __('Employees') }}
                </h1>
                <p class="text-slate-500 text-sm mt-1">{{ __('Manage and view your team members.') }}</p>
            </div>
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-3">
                <!-- Add Employee Button -->
                <a href="{{ route('admin.employees.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fa-solid fa-plus mr-2"></i>
                    {{ __('Add Employee') }}
                </a>
            </div>
        </div>

        @if(session('status'))
            <div x-data="{ show: true }" x-show="show" class="mb-6 rounded-lg bg-green-50 p-4 text-sm text-green-800 border border-green-200 flex items-center shadow-sm">
                <i class="fa-solid fa-check-circle text-green-500 mr-3 text-lg"></i>
                <div>
                    <span class="font-bold block">{{ __('Success') }}</span>
                    {{ session('status') }}
                </div>
                <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 mb-6 p-5">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                <i class="fa-solid fa-filter"></i>
                {{ __('Filter Options') }}
            </h3>
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5 ml-1">{{ __('Branch') }}</label>
                    <div class="relative group">
                        <select name="branch_id" class="w-full pl-3 pr-10 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 appearance-none transition-all cursor-pointer hover:bg-white hover:border-slate-300">
                            <option value="">{{ __('All Branches') }}</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" @selected(request('branch_id')==$branch->id)>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 group-hover:text-blue-500 transition-colors">
                             <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5 ml-1">{{ __('Department') }}</label>
                    <div class="relative group">
                         <select name="department_id" class="w-full pl-3 pr-10 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 appearance-none transition-all cursor-pointer hover:bg-white hover:border-slate-300">
                            <option value="">{{ __('All Departments') }}</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" @selected(request('department_id')==$department->id)>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 group-hover:text-blue-500 transition-colors">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5 ml-1">{{ __('Status') }}</label>
                    <div class="relative group">
                        <select name="employment_status" class="w-full pl-3 pr-10 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 appearance-none transition-all cursor-pointer hover:bg-white hover:border-slate-300">
                            <option value="">{{ __('All Statuses') }}</option>
                            <option value="active" @selected(request('employment_status')==='active')>{{ __('Active') }}</option>
                            <option value="suspended" @selected(request('employment_status')==='suspended')>{{ __('Suspended') }}</option>
                            <option value="resigned" @selected(request('employment_status')==='resigned')>{{ __('Resigned') }}</option>
                        </select>
                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 group-hover:text-blue-500 transition-colors">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="flex-1 bg-slate-800 hover:bg-slate-900 text-white text-sm font-medium rounded-lg px-4 py-2.5 transition-all shadow-sm focus:ring-2 focus:ring-slate-500 focus:ring-offset-1 flex justify-center items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        {{ __('Search') }}
                    </button>
                    <a href="{{ route('admin.employees.index') }}" class="flex-none bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 hover:text-slate-800 text-sm font-medium rounded-lg px-4 py-2.5 transition-colors shadow-sm text-center flex items-center justify-center tooltip" title="កំណត់ជម្រើសឡើងវិញ (Reset Filters)">
                         <i class="fa-solid fa-rotate-left"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest pl-6">{{ __('Employee') }}</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest hidden sm:table-cell">{{ __('Dept & Branch') }}</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest hidden md:table-cell">{{ __('Status') }}</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-widest pr-6">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($employees as $employee)
                            <tr class="hover:bg-slate-50/80 transition-colors duration-200 group">
                                <!-- Employee Column -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="relative h-10 w-10 shrink-0">
                                            @if($employee->user?->photo_path)
                                                <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white shadow-sm" src="{{ route('users.photo', $employee->user) }}" alt="{{ $employee->user?->name }}" />
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-sm shadow-sm ring-2 ring-white">
                                                    {{ strtoupper(substr($employee->user?->name ?? '?', 0, 1)) }}
                                                </div>
                                            @endif
                                            <!-- Status Dot on Avatar -->
                                            <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white {{ $employee->employment_status === 'active' ? 'bg-green-500' : ($employee->employment_status === 'suspended' ? 'bg-orange-500' : 'bg-slate-400') }}"></span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors">{{ $employee->user?->name ?? 'Unknown User' }}</div>
                                            <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                                <span class="bg-slate-100 text-slate-500 text-[10px] px-1.5 py-0.5 rounded border border-slate-200">ID: {{ $employee->employee_id }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Mobile optimized details visible only on small screens -->
                                    <div class="sm:hidden mt-2 ml-14 space-y-1">
                                        <div class="text-xs text-slate-500">{{ $employee->department?->name ?? 'Unassigned' }} &bull; {{ $employee->branch?->name }}</div>
                                    </div>
                                </td>
                                
                                <!-- Details Column (Dept/Branch) -->
                                <td class="px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-medium text-slate-700">{{ $employee->department?->name ?? '-' }}</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                            <i class="fa-solid fa-building text-[10px] text-slate-400"></i>
                                            {{ $employee->branch?->name }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Status Column -->
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    @php
                                        $statusConfig = match($employee->employment_status) {
                                            'active' => ['bg' => 'bg-green-50', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                                            'suspended' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-700', 'dot' => 'bg-orange-500'],
                                            'resigned' => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'dot' => 'bg-red-500'],
                                            default => ['bg' => 'bg-slate-50', 'text' => 'text-slate-600', 'dot' => 'bg-slate-400'],
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                                        {{ ucfirst($employee->employment_status) }}
                                    </span>
                                </td>

                                <!-- Actions Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Scan History Button -->
                                        <a href="{{ route('admin.employees.scan-history', $employee) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View Scan History">
                                            <i class="fa-solid fa-clock-rotate-left text-lg"></i>
                                        </a>

                                        <!-- Schedule Button -->
                                        <a href="{{ route('admin.employees.schedule.index', $employee) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Manage Schedule">
                                            <i class="fa-regular fa-calendar-days text-lg"></i>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.employees.edit', $employee) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Profile">
                                            <i class="fa-regular fa-pen-to-square text-lg"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('admin.employees.destroy', $employee) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete Employee">
                                                <i class="fa-regular fa-trash-can text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="h-16 w-16 rounded-full bg-slate-50 flex items-center justify-center mb-4 ring-8 ring-slate-50/50">
                                            <i class="fa-solid fa-users-slash text-2xl text-slate-300"></i>
                                        </div>
                                        <p class="text-slate-800 font-semibold text-lg">{{ __('No employees found.') }}</p>
                                        <p class="text-slate-500 text-sm mt-1 max-w-xs mx-auto">{{ __('No team members match the current filters. Try resetting or adding a new employee.') }}</p>
                                        <a href="{{ route('admin.employees.create') }}" class="mt-4 text-blue-600 font-medium hover:text-blue-700 text-sm inline-flex items-center">
                                            <i class="fa-solid fa-plus mr-1"></i> {{ __('Add Employee') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($employees->hasPages())
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">
                    {{ $employees->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

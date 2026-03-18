<x-layouts.admin>
    <!-- Welcome & Date -->
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-800">{{ __('Hello') }} {{ auth()->user()->name }} 👋</h2>
            <p class="mt-1 text-slate-500">{{ __("Here's what's happening today.") }}</p>
        </div>
        <div class="flex items-center gap-2 rounded-xl bg-white p-2 shadow-sm border border-slate-100">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                <i class="fa-regular fa-calendar text-lg"></i>
            </div>
            <div class="px-2">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">{{ __('Today') }}</p>
                <p class="text-sm font-bold text-slate-700">{{ now()->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Start Guide -->
    <div class="mb-8 rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="flex items-center gap-3 mb-6 relative z-10">
            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                <i class="fa-solid fa-rocket"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 tracking-tight">{{ __('Quick Start Guide') }}</h3>
                <p class="text-xs text-slate-500 font-medium">{{ __('Follow these steps to set up') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 relative z-10">
            <!-- Step 1 -->
            <div class="group relative rounded-xl border border-slate-100 bg-slate-50 p-5 hover:bg-white hover:border-blue-100 hover:shadow-lg hover:shadow-blue-500/5 transition-all duration-300 pointer-events-auto">
                <div class="absolute top-4 right-4 text-slate-200 group-hover:text-blue-100 transition-colors font-extrabold text-4xl leading-none font-outfit">1</div>
                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
                    <i class="fa-solid fa-code-branch text-sm"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800 mb-1 line-clamp-1">{{ __('Setup Workspace') }}</h4>
                <p class="text-xs text-slate-500 mb-4 line-clamp-2 min-h-[32px]">{{ __('Create branches, departments and schedules.') }}</p>
                <a href="{{ route('admin.branches.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700 hover:gap-2 transition-all">
                    {{ __('Start') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Step 2 -->
            <div class="group relative rounded-xl border border-slate-100 bg-slate-50 p-5 hover:bg-white hover:border-purple-100 hover:shadow-lg hover:shadow-purple-500/5 transition-all duration-300 pointer-events-auto">
                <div class="absolute top-4 right-4 text-slate-200 group-hover:text-purple-100 transition-colors font-extrabold text-4xl leading-none font-outfit">2</div>
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
                    <i class="fa-solid fa-users text-sm"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800 mb-1 line-clamp-1">{{ __('Add Employees') }}</h4>
                <p class="text-xs text-slate-500 mb-4 line-clamp-2 min-h-[32px]">{{ __('Register your team members.') }}</p>
                <a href="{{ route('admin.employees.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-purple-600 hover:text-purple-700 hover:gap-2 transition-all">
                    {{ __('Add People') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Step 3 -->
            <div class="group relative rounded-xl border border-slate-100 bg-slate-50 p-5 hover:bg-white hover:border-emerald-100 hover:shadow-lg hover:shadow-emerald-500/5 transition-all duration-300 pointer-events-auto">
                <div class="absolute top-4 right-4 text-slate-200 group-hover:text-emerald-100 transition-colors font-extrabold text-4xl leading-none font-outfit">3</div>
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
                    <i class="fa-solid fa-qrcode text-sm"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800 mb-1 line-clamp-1">{{ __('Generate QR Code') }}</h4>
                <p class="text-xs text-slate-500 mb-4 line-clamp-2 min-h-[32px]">{{ __('Generate daily QR code for attendance.') }}</p>
                <a href="{{ route('admin.attendance-qr.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700 hover:gap-2 transition-all">
                    {{ __('Generate') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Step 4 -->
            <div class="group relative rounded-xl border border-slate-100 bg-slate-50 p-5 hover:bg-white hover:border-amber-100 hover:shadow-lg hover:shadow-amber-500/5 transition-all duration-300 pointer-events-auto">
                <div class="absolute top-4 right-4 text-slate-200 group-hover:text-amber-100 transition-colors font-extrabold text-4xl leading-none font-outfit">4</div>
                <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center mb-4 transition-transform group-hover:scale-110">
                    <i class="fa-solid fa-file-invoice-dollar text-sm"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800 mb-1 line-clamp-1">{{ __('Run Payroll') }}</h4>
                <p class="text-xs text-slate-500 mb-4 line-clamp-2 min-h-[32px]">{{ __('Calculate monthly payroll.') }}</p>
                <a href="{{ route('admin.payrolls.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-600 hover:text-amber-700 hover:gap-2 transition-all">
                    {{ __('Process') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-5">
        
        <!-- Total Employees -->
        <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 group hover:border-blue-500/30 transition-all duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ __('Total Employees') }}</p>
                    <h3 class="mt-2 text-3xl font-bold text-slate-800">{{ $totalEmployees }}</h3>
                </div>
                <div class="h-10 w-10 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <!-- Present -->
        <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 group hover:border-green-500/30 transition-all duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ __('Present Today') }}</p>
                    <h3 class="mt-2 text-3xl font-bold text-slate-800">{{ $todayAttendance }}</h3>
                </div>
                <div class="h-10 w-10 bg-green-50 rounded-full flex items-center justify-center text-green-500 group-hover:bg-green-100 transition-colors">
                    <i class="fa-solid fa-user-check"></i>
                </div>
            </div>
        </div>

        <!-- Late -->
        <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 group hover:border-orange-500/30 transition-all duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ __('Late Today') }}</p>
                    <h3 class="mt-2 text-3xl font-bold text-slate-800">{{ $lateEmployeesCount }}</h3>
                </div>
                <div class="h-10 w-10 bg-orange-50 rounded-full flex items-center justify-center text-orange-500 group-hover:bg-orange-100 transition-colors">
                    <i class="fa-solid fa-user-clock"></i>
                </div>
            </div>
        </div>

        <!-- On Leave -->
        <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 group hover:border-pink-500/30 transition-all duration-300">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ __('On Leave') }}</p>
                    <h3 class="mt-2 text-3xl font-bold text-slate-800">{{ $onLeaveToday }}</h3>
                </div>
                <div class="h-10 w-10 bg-pink-50 rounded-full flex items-center justify-center text-pink-500 group-hover:bg-pink-100 transition-colors">
                    <i class="fa-solid fa-plane-departure"></i>
                </div>
            </div>
        </div>

        <!-- Est Payroll -->
        <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 group hover:border-indigo-500/30 transition-all duration-300 sm:col-span-2 xl:col-span-1">
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ __('Est. Payroll') }}</p>
                    <h3 class="mt-2 text-2xl font-bold text-slate-800">${{ number_format($monthlyPayrollCost,0) }}<span class="text-sm font-normal text-slate-400">.00</span></h3>
                </div>
                <div class="h-10 w-10 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-600 group-hover:bg-indigo-100 transition-colors">
                   <i class="fa-solid fa-sack-dollar"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-8">
        <!-- Chart -->
        <div class="lg:col-span-2">
            <div class="h-full rounded-2xl bg-white p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">{{ __('Attendance Overview') }}</h3>
                        <p class="text-sm text-slate-500">{{ __('Monthly trends') }}</p>
                    </div>
                   <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span> {{ __('Present') }}
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span> {{ __('Absent') }}
                        </span>
                   </div>
                </div>
                <div class="relative h-80 w-full" >
                    <canvas id="attendanceChart"></canvas>
                </div>
                 @unless($hasMonthlyAttendanceData)
                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <div class="rounded-full bg-slate-50 p-3 text-slate-400 mb-3">
                            <i class="fa-solid fa-chart-simple text-xl"></i>
                        </div>
                        <p class="text-sm text-slate-500">{{ __('No attendance data available for this month yet.') }}</p>
                    </div>
                @endunless
            </div>
        </div>
        
        <!-- Late Employees -->
        <div class="lg:col-span-1">
            <div class="flex h-full flex-col rounded-2xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100">
                <div class="border-b border-slate-50 p-5 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800">{{ __('Late Today') }}</h3>
                    <span class="px-2.5 py-0.5 rounded-full bg-orange-50 text-orange-600 text-xs font-bold">{{ $lateEmployees->count() }}</span>
                </div>
                <div class="overflow-y-auto flex-1 max-h-[360px] p-2 custom-scrollbar">
                    @forelse($lateEmployees as $row)
                        <div class="flex items-center justify-between p-3 mb-2 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-sm">
                                    {{ substr($row->employee->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">{{ $row->employee->user->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $row->employee->department->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="block text-sm font-bold text-orange-500">{{ $row->late_minutes }}m</span>
                                <span class="text-[10px] uppercase text-slate-400 font-semibold">{{ __('Late') }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-full py-10 text-center">
                             <div class="rounded-full bg-green-50 p-3 text-green-500 mb-3">
                                <i class="fa-regular fa-clock text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-slate-800">{{ __('On Time!') }}</p>
                            <p class="text-xs text-slate-500 mt-1">{{ __('No employees late today.') }}</p>
                        </div>
                    @endforelse
                </div>
                 @if($lateEmployees->count() > 5)
                <div class="p-3 border-t border-slate-50 text-center">
                    <a href="{{ route('admin.attendance.index', ['tab' => 'late']) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">{{ __('View All') }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1">
        <!-- Pending Leaves -->
        <div class="lg:col-span-1">
            <div class="overflow-hidden rounded-2xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100">
                <div class="border-b border-slate-50 p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                         <h3 class="text-lg font-bold text-slate-800">{{ __('Pending Leave Requests') }}</h3>
                         <p class="text-sm text-slate-500">{{ __('Review and approve requests') }}</p>
                    </div>
                    <a href="{{ route('admin.leave-requests.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                        {{ __('View All') }} <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50/50 text-xs uppercase text-slate-500 font-semibold mobile-hidden">
                            <tr>
                                <th class="px-6 py-4">{{ __('Employee') }}</th>
                                <th class="px-6 py-4">{{ __('Leave Type') }}</th>
                                <th class="px-6 py-4">{{ __('Duration') }}</th>
                                <th class="px-6 py-4 text-center">{{ __('Status') }}</th>
                                <th class="px-6 py-4 text-right">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                        @forelse($pendingLeaves as $leave)
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-xs">
                                             {{ substr($leave->employee->user->name, 0, 1) }}
                                        </div>
                                        <span class="font-semibold text-slate-700 group-hover:text-blue-600 transition-colors">{{ $leave->employee->user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                     <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-medium">
                                        {{ $leave->leaveType->name }}
                                     </span>
                                </td>
                                <td class="px-6 py-4 text-slate-600">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-slate-700">{{ $leave->start_date->format('M d, Y') }}</span>
                                        <span class="text-xs text-slate-400">{{ __('to') }} {{ $leave->end_date->format('M d, Y') }} ({{ $leave->days }} {{ __('days') }})</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-semibold text-yellow-600 border border-yellow-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-500 animate-pulse"></span> {{ __('Pending') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                     <a href="{{ route('admin.leave-requests.index') }}" class="text-slate-400 hover:text-blue-600 transition-colors">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="h-12 w-12 rounded-full bg-slate-50 flex items-center justify-center text-slate-300 mb-3">
                                            <i class="fa-regular fa-folder-open text-xl"></i>
                                        </div>
                                        <p class="text-slate-500 font-medium">{{ __('No pending requests') }}</p>
                                        <p class="text-xs text-slate-400">{{ __('All caught up! New requests will appear here.') }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="{{ asset('vendor/chartjs/chart.umd.min.js') }}"></script>
    <script>
    const attendanceChartElement = document.getElementById('attendanceChart');
    if (attendanceChartElement) {
        new Chart(attendanceChartElement, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Attendance',
                data: @json($chartValues),
                backgroundColor: '{{ $uiCompanySetting->primary_color ?? '#1f4f82' }}',
                borderRadius: 6,
                maxBarThickness: 28,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, ticks: { precision: 0 }, grid: { color: '#e2e8f0' } }
            }
        }
    });
    }
    </script>
</x-layouts.admin>

<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Company Settings</h2>
            <p class="text-sm text-slate-500 mt-1">Configure global preferences, localization, and features</p>
        </div>
    </div>

    <!-- Alert / Flash Messages via Alpine -->
    @if(session('success') || session('status'))
        <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 flex items-start justify-between">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-emerald-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <p class="text-sm font-medium">{{ session('success') ?? session('status') }}</p>
            </div>
            <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div x-data="{ show: true }" x-show="show" class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-xl p-4 flex items-start justify-between">
            <div class="flex flex-col">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-sm font-bold">Please correct the errors below:</p>
                </div>
                <ul class="list-disc pl-9 text-xs">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" @click="show = false" class="text-red-500 hover:text-red-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif


    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf 
            @method('PUT')
            
            <div class="p-8">
                <!-- Branding Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-slate-800 border-b border-slate-200 pb-2 mb-4">Branding & Identity</h3>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                        <div class="md:col-span-8">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Company Name</label>
                            <input type="text" name="company_name" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('company_name', $setting->company_name) }}">
                        </div>
                        <div class="md:col-span-4">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Primary Color</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="primary_color" class="h-10 w-16 p-1 border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 cursor-pointer" value="{{ old('primary_color', $setting->primary_color) }}">
                                <span class="text-sm text-slate-500 uppercase">{{ old('primary_color', $setting->primary_color) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Localization Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-slate-800 border-b border-slate-200 pb-2 mb-4">Localization</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Currency</label>
                            <input type="text" name="currency" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('currency', $setting->currency) }}" placeholder="e.g. USD, EUR">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Timezone</label>
                            <input type="text" name="timezone" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('timezone', $setting->timezone) }}" placeholder="e.g. UTC, America/New_York">
                        </div>
                    </div>
                </div>

                <!-- Financial & Payroll Rules Section -->
                <div>
                    <h3 class="text-lg font-bold text-slate-800 border-b border-slate-200 pb-2 mb-4">Financial Rules & Access</h3>
                    <div class="mb-6">
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Overtime Rate Per Hour</label>
                            <div class="relative w-full md:w-1/2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 text-sm">$</span>
                                </div>
                                <input type="number" name="overtime_rate_per_hour" step="0.01" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-7" value="{{ old('overtime_rate_per_hour', $setting->overtime_rate_per_hour) }}">
                            </div>
                        </div>

                        <div class="w-full mb-6 bg-slate-50 rounded-xl border border-slate-200 p-5 mt-2">
                            <div class="flex items-center gap-2 mb-4 pb-3 border-b border-slate-200">
                                <div class="bg-orange-100 p-2 rounded-lg text-orange-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-semibold text-slate-800">Late Policy</h4>
                                    <p class="text-xs text-slate-500">Configure how late arrivals impact employee payroll.</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white p-4 rounded-lg border border-slate-200 shadow-sm relative overflow-hidden">
                                    <div class="absolute right-0 top-0 w-2 h-full bg-blue-500"></div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Free Late Allowance</label>
                                    <div class="flex items-center">
                                        <input type="number" name="allowed_late_count" step="1" class="w-24 text-center border-slate-300 rounded-l-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-lg font-bold text-slate-700" value="{{ old('allowed_late_count', $setting->allowed_late_count) }}">
                                        <div class="bg-slate-100 text-slate-600 px-4 py-[11px] rounded-r-lg border-y border-r border-slate-300 font-medium text-sm">Times / Month</div>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-2">Employees can be late this many times before deductions begin.</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg border border-slate-200 shadow-sm relative overflow-hidden">
                                    <div class="absolute right-0 top-0 w-2 h-full bg-red-500"></div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Penalty per Violation</label>
                                    <div class="flex items-center">
                                        <div class="bg-slate-100 text-slate-600 px-4 py-[11px] rounded-l-lg border-y border-l border-slate-300 font-medium text-sm">$</div>
                                        <input type="number" name="late_deduction_amount" step="0.01" class="w-32 border-slate-300 rounded-r-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-lg font-bold text-red-600" value="{{ old('late_deduction_amount', $setting->late_deduction_amount) }}">
                                    </div>
                                    <p class="text-xs text-slate-500 mt-2">Amount deducted from salary for every late arrival <b>after</b> the free allowance.</p>
                                </div>
                            </div>
                            
                            <!-- Kept for backward compatibility -->
                            <div class="hidden">
                                <input type="number" name="late_deduction_per_minute" step="0.0001" value="{{ old('late_deduction_per_minute', $setting->late_deduction_per_minute ?? 0) }}">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                        <div class="md:col-span-6">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Current Plan Name</label>
                            <input type="text" name="current_plan_name" class="w-full border-slate-300 bg-slate-50 text-slate-500 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('current_plan_name', $setting->current_plan_name) }}" readonly>
                        </div>
                        <div class="md:col-span-6 flex pb-2">
                            <div class="flex items-center space-x-2 bg-slate-50 border border-slate-200 rounded-lg p-3 w-full">
                                <input type="hidden" name="payroll_enabled" value="0">
                                <input type="checkbox" id="payroll_enabled" name="payroll_enabled" value="1" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-5 h-5 transition-colors cursor-pointer" @checked(old('payroll_enabled', $setting->payroll_enabled))>
                                <label for="payroll_enabled" class="text-sm font-medium text-slate-700 mb-0 cursor-pointer select-none">Enable Payroll on Employee Panel</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 border border-slate-200 rounded-xl bg-slate-50 overflow-hidden">
                        <div class="p-4 bg-gradient-to-r from-slate-50 to-white">
                            <input type="hidden" name="telegram_scan_enabled" value="0">
                            <div class="flex items-start gap-3">
                                <input type="checkbox" id="telegram_scan_enabled" name="telegram_scan_enabled" value="1" class="mt-1 rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-5 h-5 transition-colors shrink-0" @checked(old('telegram_scan_enabled', $setting->telegram_scan_enabled))>
                                <div class="min-w-0">
                                    <label for="telegram_scan_enabled" class="block text-sm font-semibold text-slate-700 cursor-pointer">Send attendance scan to Telegram group</label>
                                    <p class="text-xs text-slate-500 mt-1 mb-0">Enable this to notify your Telegram group every time an attendance scan is recorded.</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-slate-200 bg-white p-5">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-sm font-semibold text-slate-700">Telegram Setup (Global Bot)</h5>
                                <span class="text-[11px] font-medium px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 border border-slate-200">Auto Setup</span>
                            </div>

                            <div class="bg-gradient-to-br from-white to-blue-50 border-2 border-blue-100 rounded-2xl p-8 py-10 text-center shadow-sm">
                                @if($setting->telegram_chat_id)
                                    <div class="mb-5 inline-flex items-center justify-center bg-emerald-100 text-emerald-700 px-5 py-2.5 rounded-full shadow-sm border border-emerald-200">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="font-bold text-sm tracking-wide">Connected (Chat ID: {{ $setting->telegram_chat_id }})</span>
                                    </div>
                                    <p class="text-[15px] text-slate-600 mb-6 font-medium">Your Telegram group is connected. Want to change the group?</p>
                                @else
                                    <div class="mb-5 mx-auto inline-flex p-4 rounded-full bg-blue-100 text-blue-500 shadow-inner">
                                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06-.01.13-.02.26z"/></svg>
                                    </div>
                                    <p class="text-base text-slate-700 mb-6 font-medium max-w-sm mx-auto leading-relaxed">Click the button below to add our Bot to your Telegram group and connect automatically.</p>
                                @endif

                                <a href="https://t.me/mekong_cyberunit_bot?startgroup={{ $setting->telegram_connection_token }}" target="_blank" class="inline-flex items-center gap-3 bg-blue-500 hover:bg-blue-600 text-white text-lg font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-blue-500/40 hover:shadow-blue-500/60 hover:scale-[1.02] transition-all transform active:scale-95">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06-.01.13-.02.26z"/></svg>
                                    @if($setting->telegram_chat_id) Reconnect Telegram Group @else Connect Telegram Group @endif
                                </a>
                                
                                <p class="text-xs text-slate-500 mt-6 font-medium flex items-center justify-center gap-1.5">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V9a5 5 0 00-10 0v2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                                    Our system securely synchronizes the Webhook in the background.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->hasRole('Super Admin'))
                <!-- HR Permissions Section -->
                <div class="mb-8 mt-8 border-t border-slate-200 pt-8">
                    <h3 class="text-lg font-bold text-slate-800 pb-2 mb-1">HR & Admin Access Controls</h3>
                    <p class="text-sm text-slate-500 mb-6">Select which modules users with the "Admin / HR" role can access.</p>
                    
                    @php
                        $hrPermissions = old('hr_permissions', $setting->hr_permissions ?? []);
                        $modules = [
                            'employees' => 'Employees & Departments',
                            'attendance' => 'Attendance & QR',
                            'requests' => 'Leave & Overtime Requests',
                            'payrolls' => 'Payroll Management',
                            'performance' => 'Performance & KPIs',
                            'security' => 'Security & Activity Logs',
                            'settings' => 'System Settings & Subscription'
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($modules as $key => $label)
                        <div class="flex items-center space-x-3 bg-white border border-slate-200 p-4 rounded-xl shadow-sm hover:border-blue-300 transition-colors">
                            <input type="checkbox" id="perm_{{ $key }}" name="hr_permissions[]" value="{{ $key }}" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 w-5 h-5 transition-colors cursor-pointer" {{ in_array($key, is_array($hrPermissions) ? $hrPermissions : []) ? 'checked' : '' }}>
                            <label for="perm_{{ $key }}" class="text-sm font-semibold text-slate-700 cursor-pointer select-none">{{ $label }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="bg-slate-50 px-8 py-5 border-t border-slate-200 flex items-center justify-end rounded-b-xl">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2.5 px-6 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>

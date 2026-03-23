<x-layouts.admin>
    @php
        $editing = isset($employee);
        $selectedRole = old('role', ($employee ?? null)?->user?->roles?->first()?->name ?? 'Employee');
    @endphp
    
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">{{ $editing ? 'Edit Employee' : 'Create Employee' }}</h2>
            <p class="text-sm text-slate-500 mt-1">Fill in the information below to {{ $editing ? 'update the' : 'add a new' }} employee.</p>
        </div>
        <a href="{{ route('admin.employees.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors flex items-center">
            <i class="fa-solid fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 flex items-start gap-3">
            <i class="fa-solid fa-triangle-exclamation text-red-500 mt-0.5"></i>
            <div>
                <h3 class="text-sm font-bold mb-1">There were {{ $errors->count() }} errors with your submission</h3>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 overflow-hidden max-w-5xl">
        <form method="POST" enctype="multipart/form-data" action="{{ $editing ? route('admin.employees.update', $employee) : route('admin.employees.store') }}">
            @csrf 
            @if($editing) 
                @method('PUT') 
            @endif
            
            <div class="p-8">
                <!-- User Account Info -->
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-regular fa-user text-slate-400"></i> Account Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="name" value="{{ old('name', ($employee ?? null)?->user?->name ?? '') }}" required placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="email" value="{{ old('email', ($employee ?? null)?->user?->email ?? '') }}" required placeholder="john@company.com">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Phone</label>
                        <input type="text" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="phone" value="{{ old('phone', ($employee ?? null)?->user?->phone ?? '') }}" placeholder="+1234567890">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Password {!! $editing ? '<span class="text-slate-400 font-normal lowercase tracking-normal ml-1">(Optional)</span>' : '<span class="text-red-500">*</span>' !!}</label>
                        <input type="password" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="password" {{ $editing ? '' : 'required' }} placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Role <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 appearance-none" name="role" required>
                                <option value="Admin / HR" @selected($selectedRole === 'Admin / HR')>Admin / HR</option>
                                <option value="Employee" @selected($selectedRole === 'Employee')>Employee</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Profile Photo</label>
                        <input type="file" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100 text-slate-500" name="photo" accept="image/*">
                    </div>
                </div>

                <!-- Employment Details -->
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-regular fa-building text-slate-400"></i> Employment Details
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Branch <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 appearance-none" name="branch_id" required>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" @selected(old('branch_id', ($employee ?? null)?->branch_id ?? '') == $branch->id)>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Department</label>
                        <div class="relative">
                            <select class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 appearance-none" name="department_id">
                                <option value="">N/A</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" @selected(old('department_id', ($employee ?? null)?->department_id ?? '') == $department->id)>{{ $department->name }}</option>
                                @endforeach
                            </select>
                             <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Position <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="position" value="{{ old('position', ($employee ?? null)?->position ?? '') }}" required placeholder="e.g. Sales Manager">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Salary Type <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 appearance-none" name="salary_type" required>
                                <option value="monthly" @selected(old('salary_type', ($employee ?? null)?->salary_type ?? '') === 'monthly')>Monthly</option>
                                <option value="daily" @selected(old('salary_type', ($employee ?? null)?->salary_type ?? '') === 'daily')>Daily</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Base Salary <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 text-sm font-semibold">$</span>
                            </div>
                            <input type="number" step="0.01" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 pl-8" name="base_salary" value="{{ old('base_salary', ($employee ?? null)?->base_salary ?? '') }}" required placeholder="0.00">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Overtime Rate / Hour <span class="text-slate-400 font-normal lowercase tracking-normal">(Optional)</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 text-sm font-semibold">$</span>
                            </div>
                            <input type="number" step="0.01" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 pl-8" name="ot_rate_per_hour" value="{{ old('ot_rate_per_hour', ($employee ?? null)?->ot_rate_per_hour ?? '') }}" placeholder="Default: Company Settings">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Leave Deduction / Day <span class="text-slate-400 font-normal lowercase tracking-normal">(Optional)</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 text-sm font-semibold">$</span>
                            </div>
                            <input type="number" step="0.01" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 pl-8" name="leave_deduction_per_day" value="{{ old('leave_deduction_per_day', ($employee ?? null)?->leave_deduction_per_day ?? '') }}" placeholder="Default: Salary / 30">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Status <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5 appearance-none" name="employment_status" required>
                                <option value="active" @selected(old('employment_status', ($employee ?? null)?->employment_status ?? 'active') === 'active')>Active</option>
                                <option value="suspended" @selected(old('employment_status', ($employee ?? null)?->employment_status ?? '') === 'suspended')>Suspended</option>
                                <option value="resigned" @selected(old('employment_status', ($employee ?? null)?->employment_status ?? '') === 'resigned')>Resigned</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Join Date <span class="text-red-500">*</span></label>
                        <input type="date" class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm py-2.5" name="join_date" value="{{ old('join_date', ($employee ?? null)?->join_date?->toDateString() ?? '') }}" required>
                    </div>
                </div>
            </div>

            {{-- Bank QR Code Section --}}
            <div class="p-8 border-t border-slate-100">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-qrcode text-slate-400"></i> Bank QR Code
                    <span class="text-xs font-normal text-slate-400 tracking-normal lowercase ml-1">(សម្រាប់ទូទាត់ប្រាក់ខែ)</span>
                </h3>

                @if($editing && $employee->bank_qr_path)
                    <div class="flex flex-col sm:flex-row items-start gap-6 mb-6">
                        <div class="border border-slate-200 rounded-xl p-3 bg-slate-50">
                            <img src="{{ asset('storage/' . $employee->bank_qr_path) }}"
                                 alt="Bank QR Code"
                                 class="w-40 h-40 object-contain rounded-lg">
                        </div>
                        <div class="flex flex-col gap-3 justify-center">
                            <p class="text-sm text-emerald-600 font-semibold flex items-center gap-2">
                                <i class="fa-solid fa-circle-check"></i> QR Code uploaded
                            </p>
                            <p class="text-xs text-slate-400">Upload a new image below to replace it, or remove it.</p>
                            <form method="POST" action="{{ route('admin.employees.bank-qr.destroy', $employee) }}"
                                  onsubmit="return confirm('Remove this bank QR code?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-xs font-medium text-red-500 hover:text-red-700 flex items-center gap-1 transition-colors">
                                    <i class="fa-solid fa-trash"></i> Remove QR Code
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        {{ $editing && $employee->bank_qr_path ? 'Replace' : 'Upload' }} Bank QR Image
                        <span class="text-slate-400 font-normal lowercase tracking-normal ml-1">(Optional – PNG/JPG, max 4MB)</span>
                    </label>
                    <input type="file"
                           class="w-full border-slate-200 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500/20 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 text-slate-500"
                           name="bank_qr_image"
                           id="bank_qr_image"
                           accept="image/*">
                    <p class="mt-2 text-xs text-slate-400">Upload a QR code image of the employee's bank account for payroll payment reference.</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-slate-50/50 px-6 py-5 border-t border-slate-100 flex items-center justify-end gap-3 rounded-b-xl">
                <a href="{{ route('admin.employees.index') }}" class="text-slate-600 hover:text-slate-800 text-sm font-medium px-4 py-2.5 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 px-6 rounded-lg shadow-sm hover:shadow transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
                    <i class="fa-solid fa-check"></i>
                    <span>Save Employee</span>
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>


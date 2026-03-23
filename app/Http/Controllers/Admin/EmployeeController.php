<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::query()
            ->with(['user', 'branch', 'department'])
            ->when($request->filled('branch_id'), fn ($q) => $q->where('branch_id', $request->integer('branch_id')))
            ->when($request->filled('department_id'), fn ($q) => $q->where('department_id', $request->integer('department_id')))
            ->when($request->filled('employment_status'), fn ($q) => $q->where('employment_status', $request->string('employment_status')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $branches = Branch::query()->orderBy('name')->get();
        $departments = Department::query()->orderBy('name')->get();

        return view('admin.employees.index', compact('employees', 'branches', 'departments'));
    }

    public function create()
    {
        $branches = Branch::query()->orderBy('name')->get();
        $departments = Department::query()->orderBy('name')->get();

        return view('admin.employees.create', compact('branches', 'departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'branch_id' => $validated['branch_id'],
            'password' => Hash::make($validated['password']),
            'photo_path' => $this->storePhoto($request->file('photo')),
        ]);

        $user->assignRole($validated['role']);

        Employee::query()->create([
            'user_id' => $user->id,
            'employee_id' => $this->generateEmployeeId($validated['branch_id']),
            'branch_id' => $validated['branch_id'],
            'department_id' => $validated['department_id'] ?? null,
            'position' => $validated['position'],
            'salary_type' => $validated['salary_type'],
            'base_salary' => $validated['base_salary'],
            'ot_rate_per_hour' => $validated['ot_rate_per_hour'] ?? null,
            'leave_deduction_per_day' => $validated['leave_deduction_per_day'] ?? null,
            'employment_status' => $validated['employment_status'],
            'join_date' => $validated['join_date'],
            'leave_balance_days' => 0,
        ]);

        return redirect()->route('admin.employees.index')->with('status', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $employee->load('user.roles');
        $branches = Branch::query()->orderBy('name')->get();
        $departments = Department::query()->orderBy('name')->get();

        return view('admin.employees.edit', compact('employee', 'branches', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $user = $employee->user;

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'branch_id' => $validated['branch_id'],
            'password' => ! empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            'photo_path' => $request->hasFile('photo') ? $this->storePhoto($request->file('photo')) : $user->photo_path,
        ]);

        $user->syncRoles([$validated['role']]);

        $employee->update([
            'branch_id' => $validated['branch_id'],
            'department_id' => $validated['department_id'] ?? null,
            'position' => $validated['position'],
            'salary_type' => $validated['salary_type'],
            'base_salary' => $validated['base_salary'],
            'ot_rate_per_hour' => $validated['ot_rate_per_hour'] ?? null,
            'leave_deduction_per_day' => $validated['leave_deduction_per_day'] ?? null,
            'employment_status' => $validated['employment_status'],
            'join_date' => $validated['join_date'],
        ]);

        return redirect()->route('admin.employees.index')->with('status', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->user()->delete();

        return redirect()->route('admin.employees.index')->with('status', 'Employee removed.');
    }

    private function generateEmployeeId(int $branchId): string
    {
        $date = now()->format('ym');
        $sequence = str_pad((string) (Employee::query()->where('branch_id', $branchId)->count() + 1), 4, '0', STR_PAD_LEFT);

        return 'EMP-'.$branchId.'-'.$date.'-'.$sequence;
    }

    private function storePhoto(?UploadedFile $photo): ?string
    {
        return $photo ? $photo->store('profile-photos', 'public') : null;
    }

    public function scanHistory(Request $request, Employee $employee)
    {
        $employee->load(['user', 'branch', 'department']);
        
        $month = $request->input('month', now()->format('Y-m'));

        $attendanceLogs = \App\Models\AttendanceLog::query()
            ->with(['attendanceSession'])
            ->where('employee_id', $employee->id)
            ->whereYear('scanned_at', \Carbon\Carbon::parse($month)->year)
            ->whereMonth('scanned_at', \Carbon\Carbon::parse($month)->month)
            ->latest('scanned_at')
            ->paginate(30)
            ->withQueryString();

        return view('admin.employees.scan-history', compact('employee', 'attendanceLogs', 'month'));
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Super Admin', 'Admin / HR']) ?? false;
    }

    public function rules(): array
    {
        $userId = $this->route('employee')?->user_id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['nullable', 'string', 'min:8'],
            'branch_id' => ['required', 'exists:branches,id'],
            'department_id' => ['nullable', 'exists:departments,id'],
            'position' => ['required', 'string', 'max:255'],
            'salary_type' => ['required', 'in:monthly,daily'],
            'base_salary' => ['required', 'numeric', 'min:0'],
            'ot_rate_per_hour' => ['nullable', 'numeric', 'min:0'],
            'leave_deduction_per_day' => ['nullable', 'numeric', 'min:0'],
            'employment_status' => ['required', 'in:active,suspended,resigned'],
            'join_date' => ['required', 'date'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'bank_qr_image' => ['nullable', 'image', 'max:4096'],
            'remove_bank_qr' => ['nullable', 'boolean'],
            'role' => ['required', 'in:Admin / HR,Employee'],
        ];
    }
}

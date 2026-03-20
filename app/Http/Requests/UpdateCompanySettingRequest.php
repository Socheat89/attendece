<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanySettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Super Admin', 'Admin / HR']) ?? false;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'primary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'timezone' => ['required', 'timezone'],
            'currency' => ['required', 'string', 'max:10'],
            'current_plan_name' => ['required', 'string', 'max:120'],
            'payroll_enabled' => ['nullable', 'boolean'],
            'telegram_scan_enabled' => ['nullable', 'boolean'],
            'overtime_rate_per_hour' => ['required', 'numeric', 'min:0'],
            'late_deduction_per_minute' => ['required', 'numeric', 'min:0'],
            'allowed_late_count' => ['required', 'integer', 'min:0'],
            'late_deduction_amount' => ['required', 'numeric', 'min:0'],
            'hr_permissions' => ['nullable', 'array'],
            'hr_permissions.*' => ['string'],
        ];
    }
}

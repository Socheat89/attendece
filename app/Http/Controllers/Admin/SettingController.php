<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanySettingRequest;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = CompanySetting::query()->firstOrCreate(['company_id' => auth()->user()->company_id ?? 1], [
            'company_name' => 'HRM Company',
            'primary_color' => '#1f4f82',
            'timezone' => 'UTC',
            'currency' => 'USD',
            'current_plan_name' => 'Standard',
            'payroll_enabled' => true,
            'telegram_scan_enabled' => false,
            'telegram_bot_token' => '8544896901:AAFM6SoCr_g5SoIOJIR7l6ukHQsXbTelqA8',
            'telegram_chat_id' => null,
            'overtime_rate_per_hour' => 0,
            'late_deduction_per_minute' => 0,
            'allowed_late_count' => 0,
            'late_deduction_amount' => 0,
            'telegram_connection_token' => \Illuminate\Support\Str::random(12),
        ]);

        if (empty($setting->telegram_connection_token)) {
            $setting->telegram_connection_token = \Illuminate\Support\Str::random(12);
            $setting->save();
        }

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateCompanySettingRequest $request)
    {
        $setting = CompanySetting::query()->firstOrCreate(['company_id' => auth()->user()->company_id ?? 1], [
            'company_name' => 'HRM Company',
            'primary_color' => '#1f4f82',
            'timezone' => 'UTC',
            'currency' => 'USD',
            'current_plan_name' => 'Standard',
            'payroll_enabled' => true,
            'telegram_scan_enabled' => false,
            'telegram_bot_token' => '8544896901:AAFM6SoCr_g5SoIOJIR7l6ukHQsXbTelqA8',
            'telegram_chat_id' => null,
            'overtime_rate_per_hour' => 0,
            'late_deduction_per_minute' => 0,
            'allowed_late_count' => 0,
            'late_deduction_amount' => 0,
            'telegram_connection_token' => \Illuminate\Support\Str::random(12),
        ]);

        $setting->update([
            ...$request->validated(),
            'payroll_enabled' => $request->boolean('payroll_enabled'),
            'telegram_scan_enabled' => $request->boolean('telegram_scan_enabled'),
        ]);

        // Clear the correct cache key (must match AppServiceProvider)
        $companyId = auth()->user()->company_id ?? 1;
        Cache::forget('ui_company_setting_' . $companyId);
        Cache::forget('ui_company_setting_default');

        return back()->with('status', 'Company settings updated.');
    }
}

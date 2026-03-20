<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use \App\Traits\BelongsToCompany;

    use HasFactory;

    protected $fillable = [
        'company_name',
        'primary_color',
        'timezone',
        'currency',
        'current_plan_name',
        'payroll_enabled',
        'telegram_scan_enabled',
        'telegram_bot_token',
        'telegram_chat_id',
        'overtime_rate_per_hour',
        'late_deduction_per_minute',
        'allowed_late_count',
        'late_deduction_amount',
        'telegram_connection_token',
        'hr_permissions',
    ];

    protected function casts(): array
    {
        return [
            'payroll_enabled' => 'boolean',
            'telegram_scan_enabled' => 'boolean',
            'overtime_rate_per_hour' => 'decimal:2',
            'late_deduction_per_minute' => 'decimal:4',
            'allowed_late_count' => 'integer',
            'late_deduction_amount' => 'decimal:2',
            'hr_permissions' => 'array',
        ];
    }
}

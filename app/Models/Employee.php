<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use \App\Traits\BelongsToCompany;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'branch_id',
        'department_id',
        'position',
        'salary_type',
        'base_salary',
        'ot_rate_per_hour',
        'leave_deduction_per_day',
        'employment_status',
        'join_date',
        'leave_balance_days',
        'bank_qr_path',
    ];

    protected function casts(): array
    {
        return [
            'base_salary' => 'decimal:2',
            'ot_rate_per_hour' => 'decimal:2',
            'leave_deduction_per_day' => 'decimal:2',
            'leave_balance_days' => 'decimal:2',
            'join_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function attendanceSessions(): HasMany
    {
        return $this->hasMany(AttendanceSession::class);
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }
}

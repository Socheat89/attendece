<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLocation extends Model
{
    protected $fillable = [
        'employee_id',
        'attendance_session_id',
        'latitude',
        'longitude',
        'accuracy',
        'speed',
        'heading',
        'tracked_at',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'accuracy' => 'float',
        'speed' => 'float',
        'heading' => 'float',
        'tracked_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    public function attendanceSession()
    {
        return $this->belongsTo(\App\Models\AttendanceSession::class);
    }
}

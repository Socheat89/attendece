<?php

namespace App\Services;

use App\Models\AttendanceLog;
use App\Models\CompanySetting;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramAttendanceNotifier
{
    private const CHECK_IN_TYPES = ['morning_in', 'lunch_in'];

    public function sendScan(AttendanceLog $log): void
    {
        try {
            $setting = CompanySetting::query()->find(1)
                ?? CompanySetting::query()->latest('id')->first();

            if (! $setting?->telegram_scan_enabled) {
                return;
            }

            $botToken = trim((string) config('services.telegram.bot_token'));
            $chatId = trim((string) $setting->telegram_chat_id);

            if ($botToken === '' || $chatId === '') {
                return;
            }

            $log->loadMissing(['employee.user', 'employee.department', 'branch', 'attendanceSession']);

            $employeeName = $log->employee?->user?->name ?? ('Employee #' . $log->employee_id);
            $employeeCode = $log->employee?->employee_id ?? ('EMP-' . $log->employee_id);
            $departmentName = $log->employee?->department?->name ?? 'N/A';
            $position = $log->employee?->position ?? 'N/A';
            $branchName = $log->branch?->name ?? ('Branch #' . $log->branch_id);
            $scanLabel = in_array($log->scan_type, self::CHECK_IN_TYPES, true) ? 'Check-In' : 'Check-Out';
            $isLate = $this->isLateForScanType($log);
            $status = $scanLabel . ' ' . ($isLate ? '🔴 Late' : '🔵 Good');

            $distanceText = $log->distance_from_branch !== null
                ? round((float) $log->distance_from_branch) . ' m'
                : 'N/A';

            $locationText = 'N/A';
            if ($log->latitude !== null && $log->longitude !== null) {
                $locationText = sprintf(
                    'https://maps.google.com/?q=%s,%s',
                    number_format((float) $log->latitude, 6, '.', ''),
                    number_format((float) $log->longitude, 6, '.', '')
                );
            }

            $message = implode("\n", [
                'Name : ' . $employeeName,
                'Status : ' . $status,
                '-------------------------------------',
                'ID : ' . $employeeCode,
                'Department : ' . $departmentName,
                'Position : ' . $position,
                'Date/Time : ' . ($log->scanned_at?->format('Y-m-d H:i:s') ?? now()->format('Y-m-d H:i:s')),
                'Area : ' . $branchName,
                'Distance : ' . $distanceText,
                'Location : ' . $locationText,
            ]);

            try {
                Http::asForm()
                    ->timeout(8)
                    ->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                        'chat_id' => $chatId,
                        'text' => $message,
                    ])
                    ->throw();
            } catch (\Throwable) {
                Http::asForm()
                    ->withoutVerifying()
                    ->timeout(8)
                    ->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                        'chat_id' => $chatId,
                        'text' => $message,
                    ])
                    ->throw();
            }
        } catch (\Throwable $exception) {
            Log::warning('Telegram attendance notification failed.', [
                'attendance_log_id' => $log->id,
                'error' => $exception->getMessage(),
            ]);
        }
    }

    private function isLateForScanType(AttendanceLog $log): bool
    {
        if (! $log->scanned_at || ! $log->branch_id) {
            return false;
        }

        $scanDate = Carbon::parse($log->scanned_at);
        $dateOnly = $scanDate->toDateString();

        // Prefer employee-specific schedule, fallback to branch default (same logic as AttendanceService)
        $schedule = Schedule::query()
            ->where('employee_id', $log->employee_id)
            ->where('day_of_week', (int) $scanDate->dayOfWeek)
            ->first()
            ?? Schedule::query()
                ->where('branch_id', $log->branch_id)
                ->whereNull('employee_id')
                ->where('day_of_week', (int) $scanDate->dayOfWeek)
                ->first();

        if (! $schedule || empty($schedule->morning_in)) {
            return false;
        }

        // Only consider check-ins as 'late' (morning_in / lunch_in)
        if (! in_array($log->scan_type, self::CHECK_IN_TYPES, true)) {
            return false;
        }

        $start = Carbon::parse($dateOnly . ' ' . $schedule->morning_in)
            ->addMinutes((int) ($schedule->late_grace_minutes ?? 0));

        return $scanDate->gt($start);
    }
}

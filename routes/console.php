<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Auto backup every day at 2:00 AM
Schedule::command('backup:run --only-db')->daily()->at('02:00');

// Clean old backups every week (keep last 7 days)
Schedule::command('backup:clean')->weekly();

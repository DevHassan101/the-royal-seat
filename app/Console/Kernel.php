<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $hours = config('itc.sync_interval_hours', 6);

        $schedule->command('itc:sync-vehicles')
            ->everySixHours()
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/itc-vehicles.log'));

        $schedule->command('itc:sync-drivers')
            ->everySixHours()
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/itc-drivers.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

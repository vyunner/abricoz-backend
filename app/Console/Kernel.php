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
        $schedule->call(function () {
            \Log::info('Scheduler работает!');
        })->everyMinute();
//        $schedule->call(function () {
//            app(\App\Services\WebKassaService::class)->closeShift();
//        })->dailyAt('23:59'); // Закрываем смену каждый день в 23:59
//        $schedule->command('telescope:prune')->weekly();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

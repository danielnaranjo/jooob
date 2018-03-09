<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //https://stackoverflow.com/a/30704738
        'App\Console\Commands\Actividad',
        'App\Console\Commands\Indeedcom',
        'App\Console\Commands\Semana',
        'App\Console\Commands\Vacantes',
        'App\Console\Commands\Metricas',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tareas:indeedcom')
            ->timezone('America/Argentina/Buenos_Aires')
            ->twiceDaily(6, 12);
            //->everyMinute();
        $schedule->command('tareas:actividad')
            ->timezone('America/Argentina/Buenos_Aires')
            ->dailyAt('23:00');
            //->everyMinute();
        $schedule->command('tareas:metricas')
            ->timezone('America/Argentina/Buenos_Aires')
            ->monthlyOn(1, '11:00');
            //->everyMinute();
        $schedule->command('envios:vacantes')
            ->timezone('America/Argentina/Buenos_Aires')
            ->dailyAt('10:00');
            //->everyMinute();
        $schedule->command('envios:semanal')
            ->timezone('America/Argentina/Buenos_Aires')
            ->weekly();
            //->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}

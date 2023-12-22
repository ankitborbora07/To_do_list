<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Mail; 
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;
// use App\Mail\YourEmailMailable;
// use Session;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands= [
        Commands\SendEmailsCommand::class,
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('emails:send')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

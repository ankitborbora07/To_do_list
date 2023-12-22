<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; 
use App\Models\Task; 
class CheckDateTimeMatches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:datetime-matches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check database for matching dates and times and send emails.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $matches = Task::where('date', Carbon::today()->toDateString())
                          ->where('time', '=', Carbon::now()->tz('Asia/Kolkata')->format('H:i'))
                          ->get();

           if(Session::has('loginId')){
            $id=Session::get('loginId');
              $user=User::find($id);
           } 

        foreach ($matches as $match) {
            Mail::to($user->email)->send(new YourEmailMailable($task->id));
                    if(Mail::failures()){
                        return response()->Fail('error');
        
                    }
                    else {
                        return back()->with('flash',"Email sent sucessfully");
                    }
        }

        $this->info('CheckDateTimeMatches command completed.');

        // return 0;
    }
}

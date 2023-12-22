<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\YourEmailMailable;
use Session;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;



class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Cron started');
        $tasks = Task::whereDate('date', Carbon::today()->toDateString())
                          ->whereTime('time', '=', Carbon::now()->tz('Asia/Kolkata')->format('H:i'))
                          ->get();

         $exptasks = Task::where(function ($query) {
                    $query->where('date', '<', Carbon::today()->toDateString())
                          ->orWhere(function ($query) {
                            $query->whereDate('date', Carbon::today()->toDateString())
                            ->whereTime('time', '<', Carbon::now()->subHours(2)->tz('Asia/Kolkata')->format('H:i'));
                    });
             })->get();
                        

         Log::info('After tasks');
            
        //    if(Session::has('loginId')){
        //     $id=Session::get('loginId');
        //       $user=User::find($id);
        //       Log::info($user);
        //    } 
        foreach ($exptasks as $exp) {
            $task = Task::find($exp->id);
            Log::info("After exp");
            if ($task) {
                if($task->status==='Mail Sent' || $task->status==='Pending'){
                $task->status = 'Expired';
                $task->save();
                }
            }
        }

            foreach ($tasks as $task) {
                // Send email to the user
                Mail::to($task->email)->send(new YourEmailMailable($task));
                $data = Task::find($task->id);
                if ($data) {
                    if($data->status==='Pending'){
                    $data->status = 'Mail Sent';
                    $data->save();
                    }
                }
                Log::info("After mail");
                if (Mail::failures()) {
                    \Log::error('Email sending failed for task ID: ' . $task->id);
                }
               
        }
        Log::info('Cron ended');  
    }
}

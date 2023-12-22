<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function schedule(Request $schedule){
        $schedule->call(function () {
            $tasks = Task::whereDate('date', Carbon::today())
                          ->whereTime('time', '<=', Carbon::now()->tz('Asia/Kolkata')->format('H:i:s'))
                          ->get();
            
           if(Session::has('loginId')){
            $id=Session::get('loginId');
              $user=User::find($id);
           } 

            foreach ($tasks as $task) {
                // Send email to the user
                Mail::to($user->email)->send(new YourEmailMailable($task->id));
                if(Mail::failures()){
                    return response()->Fail('error');
    
                }
                else {
                    return back()->with('flash',"Email sent sucessfully");
                }
        
                // Optionally, update other fields or mark the email as sent
            }
        })->everyMinute();
    }
}

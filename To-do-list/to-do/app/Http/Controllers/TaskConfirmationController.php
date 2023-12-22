<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskConfirmationController extends Controller
{
    public function confirmTask($taskId){

        $task = Task::find($taskId);
        //dd($task);
        if ($task) {
            if($task->status==='Mail Sent'){
            $task->status = 'Completed';
            $task->save();
            }
        }
     return redirect('dashboard');
    
    }
}

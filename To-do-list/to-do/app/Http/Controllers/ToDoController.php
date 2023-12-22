<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Session;
use App\Mail\YourEmailMailable;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 

class ToDoController extends Controller
{
    public function edit($id){
        $data=Task::find($id);
        //dd($data);
        return view("update",['collection'=>$data]);
      
    }
    public function editdata(Request $req){
       
           
            $data=Task::find($req->id);

            if($req->image){
            $img=$req->file('image')->store('images/userimages','public');
            $data->image=$img;
            }

           $data->name=$req->name;
           $data->text=$req->text;
           $data->date=$req->date;
           $data->time=$req->time;
           if($req->date <  Carbon::today()->toDateString()) $data->status="Expired";
           else if($req->date ===  Carbon::today()->toDateString() && $req->time < Carbon::now()->tz('Asia/Kolkata')->format('H:i')) $data->status="Expired";
          
           
           $data->save();
           return redirect("dashboard");
        
    }
    public function store(Request $req){
       
        $req->validate([
            'name'=>'required | unique:tasks',
            'text'=>'required',
            'image'=>'required |mimes:jpeg,png,jpg,gif,jfif,webp',
            'date'=>'required',
            'time'=>'required',
        ]);
        //dd(Carbon::today()->toDateString());
        //dd(Carbon::now()->tz('Asia/Kolkata')->format('H:i'));
        //dd($req->time);
        
        $img=$req->file('image')->store('images','public');
        $task= new Task;
        $task->name=$req->name;
        $task->text=$req->text;
        $task->image=$img;
        $task->date=$req->date;
        $task->time=$req->time;
        if($req->date <  Carbon::today()->toDateString()) $task->status="Expired";
        else if($req->date ===  Carbon::today()->toDateString() && $req->time < Carbon::now()->tz('Asia/Kolkata')->format('H:i')) $task->status="Expired";
        else  $task->status="Pending";
        $id=Session::get('loginId');
        $user=User::find($id);
        $email=$user->email;
        $task->email=$email;
        $res=$task->save();
        //dd($res);
        // if(Session::has('loginId')){
        //     $id=Session::get('loginId');
        //       $user=User::find($id);
        //    } 
        // //    dd(123);
        //    $task=Task::find(1);
        // //    dd($user->email);
        //    Mail::to($user->email)->send(new YourEmailMailable($task->id));

        if($res) return back()->with('success','Task stored successfully'); 
        else return back()->with('fail','Something went wrong'); 

    }
    public function view(){
        $id=Session::get('loginId');
        $user=User::find($id);
       
        //$data=Task::where('email',$user->email)->get();
        $data = Task::where('email', $user->email)->orderBy('id', 'desc')->paginate(3);
  
        if(count($data)!==0){
            //dd(123);
            return view("dashboard",['collection'=>$data,'user'=>$user,'noTasks' => false]);
        }
        else{
            //dd(456);
            //$tasks = Task::where('email', $user->email)->orderBy('id', 'desc')->paginate(3);
            //return redirect('dashboard');
            return view("dashboard",['collection'=>$data,'user'=>$user,'noTasks' => true]);   
        }
   
       

        //return view("dashboard",['collection'=>$data,'user'=>$user]);
    }
    public function view2(){
       
        // $data=Task::all();
        // return view("dashboard",['collection'=>$data]);
        return redirect('dashboard');
    }
    public function delete($id){
        $res=Task::where('id',$id)->delete();
        if ($res=== 1) {
            return response()->json(['status'=>'success','code'=> 200, 'message'=>'Task deleted successfully.']);
        } else {
            return response()->json(['status'=>'error','code'=> 500, 'message'=>'Failed to delete Task']);
        }
    }
    public function today(){
        $id=Session::get('loginId');
        $user=User::find($id);
        //$tasks = Task::whereDate('date', Carbon::today()->toDateString())->get();
        $tasks = Task::where('email', $user->email)->whereDate('date', Carbon::today()->toDateString())->orderBy('id', 'desc') ->paginate(3);
        //dd(count($tasks));
     
         if(count($tasks)!==0){
            //dd(123);
            return view("today",['collection'=>$tasks,'user'=>$user,'noTasksToday' => false]);
        }
        else{
            //dd(456);
            //$tasks = Task::where('email', $user->email)->orderBy('id', 'desc')->paginate(3);
            //return redirect('dashboard');
            return view("today",['collection'=>$tasks,'user'=>$user,'noTasksToday' => true]);   
        }
      
        
    }
    public function pending(){
       
        $id=Session::get('loginId');
        $user=User::find($id);
        //$tasks = Task::whereDate('date', Carbon::today()->toDateString())->get();
        $tasks = Task::where('email', $user->email)->where('status', 'Pending') ->orderBy('id', 'desc')->paginate(3);
        //dd(count($tasks));
     
         if(count($tasks)!==0){
            //dd(123);
            return view("pending",['collection'=>$tasks,'user'=>$user,'pendingTasks' => true]);
        }
        else{
            //dd(456);
            //$tasks = Task::where('email', $user->email)->orderBy('id', 'desc')->paginate(3);
            //return redirect('dashboard');
            return view("pending",['collection'=>$tasks,'user'=>$user,'pendingTasks' => false]);   
        }
        
    }
}

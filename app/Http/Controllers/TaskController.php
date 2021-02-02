<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function create(Request $request){
           $input = $request->all();
           $task = new Task($input);

           if (!$task->save()) {
               //TODO throw exception if not saved
           };
           return response($task);
       }


    public function getTasks(){
        $task = Task::all();
        return $task;

    }
    public function getUsers(){
        $user = User::all();
        return $user;
    }

    public function remove($id){
        $existingTask = Task::find($id);
        if($existingTask){
            $existingTask->delete();
            return "Task successfully deleted";
        }
        return "Task not found";
    }

    public function update(Request $request, $id){

        $existingTask = Task::find($id);
        $existingTask->update($request->all());
        return $existingTask;
    }


    public function getTasksList($id){
        $user = User::find($id); //user-i id-ov role
        $tasks= $user->tasks;
        return $tasks;
    }
}

<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function create(Request $request)
    {

        $input = $request->all();

        $task = new Task($input);


        if (!$task->save()) {
            //TODO throw exception if not saved
        };
        return response($task);
    }

    public function getTasks()
    {
        $task = Task::all();
        return $task;

    }

    public function getUsers()
    {
        $user = User::all();
        return $user;
    }

    public function remove($id)
    {
        $existingTask = Task::find($id);
        if ($existingTask) {
            $existingTask->delete();
            return "Task successfully deleted";
        }
        return "Task not found";
    }

    public function update(Request $request, $id)


    {
        dd($request->all());


//        $this->validate($request, [
//            'title' => 'required',
//            'description' => 'required',
//            'userID' => 'required',
//        ]);

//        $user = Task::find($id);

//        $user->update($request->all());
//
//        $updateTask = DB::table('tasks')->where('id', $id)->update([
//            'title' => $request->title,
//            'description' => $request->description,
//            'userID' => $request->userID
//        ]);
//        if ($updateTask) {
//            $updateTask->save();
//            return 'Task has been updated';
//        }
//        return "The task not found";
    }


    public function getTasksList($id){
        $user = User::find($id); //user-i id-ov role
        $tasks= $user->tasks;
        return $tasks;
    }

}

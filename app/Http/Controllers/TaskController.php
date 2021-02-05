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
        $task = Task::find($id);
        $task = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'userID' => 'required'
        ]);
//        $task->update($request->all());

        $task = DB::table('tasks')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'userID' => $request->userID
        ]);

        return "The task has been updated";
    }

    public function getTasksList()
    {
//        $users = DB::table('users')
//            ->where('active', true)
//        ->get();
//dd($users);
//
        $task = Task::with('users')
            ->select('tasks.title', 'tasks.description', 'tasks.userID')
//            ->where('userID', '=', 'user_id')
            ->get();
        dd( $task);
    }
}

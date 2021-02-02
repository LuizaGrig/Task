<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function index(){
        $users = User::find(2);
        dd($users->tasks);
    }
}


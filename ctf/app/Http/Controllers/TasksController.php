<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TasksController extends Controller
{
    function details($id)
    {
      $task = Task::findOrFail($id);
      $user =  Auth::User();
      return view("task", ['task' =>$task, 'user' =>$user]);
    }
}

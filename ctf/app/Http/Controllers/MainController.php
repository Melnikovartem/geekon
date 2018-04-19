<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function index()
    {
      $tasks = Task::all();
      $user =  Auth::User();
      return view("index", ["tasks" => $tasks, 'user' =>$user ]);
    }
}

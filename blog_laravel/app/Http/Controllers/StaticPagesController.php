<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function showPageOne()
    {
        return view('page1');
    }

    public function showPageTwo()
    {
        return view('page2');
    }
}

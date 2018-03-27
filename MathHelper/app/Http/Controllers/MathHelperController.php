<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathHelperController extends Controller
{
    public function Index(){
      return view('index');
    }
    public function H(Request $request){

      $ans = "";
      if($request->has("a") && $request->has("h")){
        $ans = intval($request->a) * intval($request->h) * 0.5;
      }
      return view('H', ['ans' => $ans]);

    }
    public function P(Request $request){

      $ans = "";
      if($request->has("a") && $request->has("b") && $request->has("c")){
        $p = (intval($request->a) + intval($request->b) + intval($request->c))/2;
        $ans = sqrt($p * ($p-intval($request->a)) * ($p-intval($request->b)) * ($p-intval($request->c)));
      }
      return view('P', ['ans' => $ans]);

    }
    public function R(Request $request){

      $ans = "";
      if($request->has("r") && $request->has("p")){
        $ans = intval($request->r) * intval($request->p);
      }
      return view('R', ['ans' => $ans]);

    }
}

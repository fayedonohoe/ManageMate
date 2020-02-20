<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PageController extends Controller
{
    public function welcome(){
      return view('welcome');
    }

    public function about(){
      return view('about');
    }

    public function roster(){
      return view('roster');
    }

    public function usershifts(){
      return view('usershifts');
    }
}

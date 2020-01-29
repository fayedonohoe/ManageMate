<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RosterController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:manager');
  }

  public function index(){
    return view('manager.roster');
  }
}

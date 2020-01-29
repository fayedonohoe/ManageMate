<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:employee');
  }

  public function index(){

    $user = Auth::user();     //retrieves currently authenticated user
    return view('employee.home');
  }
}

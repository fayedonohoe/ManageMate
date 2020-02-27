<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-27T17:57:07+00:00




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
    return view('employee.today');
  }
}

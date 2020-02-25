<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserShift;
use App\User;
use App\Shift;
use Carbon\Carbon;


class RosterController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:manager');
  }

  // public function index(){
  //   return view('manager.roster');
  // }
  public function index()
  {
      $usershifts = UserShift::all()->sortBy('date');
      $users = User::all();
      //$myshifts = UserShift::all()->where('user_id');

      return view('manager.roster.index')->with([
        'usershifts' => $usershifts,
        'users' => $users
        //'myshifts' => $myshifts
      ]);
  }

  // public function getUsersWeek($id){
  //     $myshifts = UserShift::all()->groupBy($id);
  //
  //     return view('manager.roster.index')>with([
  //       'myshifts' => $myshifts,
  //     ]);
  // }


}

<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-26T16:34:10+00:00




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

  public function index()
  {
      $data = [];

      $usershifts = UserShift::all()->sortBy('date');
      //$usershifts = UserShift::all()->sortBy('user_id');
      $users = User::all();
      //$myshifts = UserShift::all()->where('user_id');


      foreach ($users as $key => $user) {
        $usershifts = UserShift::where('user_id', '=', $user->id)->get();

        $user = [
          "name" => $user->firstName,
          "shifts" => $usershifts
        ];

        array_push($data, $user);
      }

      //dd($data);


      return view('manager.roster.index')->with([
        'usershifts' => $usershifts,
        'users' => $users,
        'moShifts' => $data
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

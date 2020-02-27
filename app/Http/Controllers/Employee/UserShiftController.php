<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-27T16:36:53+00:00




namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Employee;
use App\Shift;
use App\UserShift;
use Carbon\Carbon;

class UserShiftController extends Controller
{
    public function __construct()
    {
      //remove middleware for now
        $this->middleware('auth');
        $this->middleware('role:employee');
    }

    public function indexFull()
    {
        $today = Carbon::now()->format('Y-m-d');
        $usershifts = UserShift::all();
        //dd( $usershifts );
        //$usershifts = UserShift::orderBy( 'user_shifts.date', 'asc')->get();  // WORKS
        //$usershifts = UserShift::orderBy( 'shift.sortOrder', 'asc')->get();

        // collections can be converted to an array
        // $roles = User::find(1)->roles->toArray();


        return view('employee.usershifts.index')->with([
          'usershifts' => $usershifts
        ]);
    }

    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $weekStartDate = Carbon::now()->startOfWeek()->format('d-m-y');
        $id = Auth::user()->id;

        $myday = UserShift::all()->where( 'date', $today)->where('user_id', $id );  //WORKS -
        $myshifts = UserShift::all()->where('user_id', $id );  //WORKS - This users shift today
        $usershifts = UserShift::all()->where( 'date', $today );  // WORKS

        //dd( $id );


        // collections can be converted to an array
        // $roles = User::find(1)->roles->toArray();


        return view('employee.usershifts.index')->with([
          'myday' => $myday,
          'usershifts' => $usershifts,
          'myshifts' => $myshifts
        ]);
    }


    public function show($id)
    {
      $usershift = UserShift::findOrFail($id);

      return view('usershifts.show')->with([
        'usershift' => $usershift
      ]);
    }


}

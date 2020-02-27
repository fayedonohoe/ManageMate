<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-27T13:25:16+00:00

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $this->middleware('auth');
        // $this->middleware('role:manager');
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


        return view('manager.usershifts.index')->with([
          'usershifts' => $usershifts
        ]);
    }

    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $usershifts = UserShift::all()->where( 'date',$today );
        //dd( $usershifts );
        //$usershifts = UserShift::orderBy( 'user_shifts.date', 'asc')->get();  // WORKS
        //$usershifts = UserShift::orderBy( 'shift.sortOrder', 'asc')->get();

        // collections can be converted to an array
        // $roles = User::find(1)->roles->toArray();


        return view('manager.usershifts.index')->with([
          'usershifts' => $usershifts
        ]);
    }

    public function create()
    {
      $users = User::all();
      $shifts = Shift::all();

      return view('manager.usershifts.create')->with([
        'users' => $users,
        'shifts' => $shifts
      ]);
    }

    public function store(Request $request)
    {
      //date, time, duration, cost, user, shift
        // $request->validate([
        //   'fname' => 'required|max:191',
        //   'lname' => 'required|max:191',
        //   'eircode' => 'required|alpha_num|size:7',
        //   'num' => 'required|size:10',
        //   'email' => 'required|max:191',
        //   'password' => 'required|max:191',
        //   //'policyNum' => 'nullable|size:10',
        // ]);

        $usershift = new UserShift();
        $usershift->date = $request->input('date');
        $usershift->user_id = $request->input('user_id');
        $usershift->shift_id = $request->input('shift_id');
        $usershift->unavailable = $request->input('false');
        $usershift->note = $request->input('note');

        $usershift->save();

        return redirect()->route('usershifts.index');
}


    public function show($id)
    {
      $usershift = UserShift::findOrFail($id);

      return view('usershifts.show')->with([
        'usershift' => $usershift
      ]);
    }


    public function edit($id)
    {
        // $shifts = Shift::all();
        // $users = Patient::all();
        // $usershift = UserShift::findOrFail($id);
        //
        // return view('manager.usershifts.edit')->with([
        //   'usershift' => $usershift,
        //   'shifts' => $shifts,
        //   'users' => $users,
        // ]);
    }


    public function update(Request $request, $id)
    {
        // $usershift = UserShift::findOrFail($id);
        //
        // $usershift = new UserShift();
        // $usershift->date = $request->input('date');
        // $usershift->time = $request->input('time');
        // $usershift->duration = $request->input('duration');
        // $usershift->cost = $request->input('cost');
        // $usershift->employee_id = $request->input('employee_id');
        // $usershift->doctor_id = $request->input('doctor_id');
        //
        // $usershift->update();
    }

    public function destroy($id)
    {
      $usershift = UserShift::findOrFail($id);

      $usershift->delete();

      return redirect()->route('usershifts.index');
    }




}

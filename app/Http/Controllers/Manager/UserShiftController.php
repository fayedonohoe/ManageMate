<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function index()
    {
        $usershifts = UserShift::all();
        //$usershifts = UserShift::orderBy( 'user_shifts.date', 'asc')->get();  // WORKS
        //$usershifts = UserShift::orderBy( 'shift.sortOrder', 'asc')->get();

        return view('usershifts.index')->with([
          'usershifts' => $usershifts
        ]);
    }

    public function create()
    {
      $users = User::all();
      $shifts = Shift::all();

      return view('usershifts.create')->with([
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

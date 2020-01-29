<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shift;
use App\User;
use App\Role;
use App\Contract;

class ShiftController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:manager');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();

        return view('manager.shifts.index')->with([
          'shifts' => $shifts
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //   'fname' => 'required|max:191',
        //   'lname' => 'required|max:191',
        //   'eircode' => 'required|alpha_num|size:7',
        //   'num' => 'required|size:10',
        //   'email' => 'required|max:191',
        //   'password' => 'required|max:191',
        //   //'policyNum' => 'nullable|size:10',
        // ]);

        $shift = new User();
        $shift->firstName = $request->input('fname');
        $shift->lastName = $request->input('lname');
        $shift->eircode = $request->input('eircode');
        $shift->phoneNumber = $request->input('num');
        $shift->email = $request->input('email');
        $shift->password = bcrypt($request->input('password') );

        $shift->save();

        return redirect()->route('manager.shifts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shift = Shift::findOrFail($id);

        return view('manager.shifts.show')->with([
          'shift' => $shift
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contracts = Contract::all();
      $shift = Shift::findOrFail($id);

      return view('manager.shifts.edit')->with([
        'shift' => $shift,
        'contracts' => $contracts,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $shift = Shift::findOrFail($id);

      $request->validate([
        'fname' => 'required|max:191',
        'lname' => 'required|max:191',
        'eircode' => 'required|alpha_num|size:7',
        'num' => 'required|size:10',
        'email' => 'required|max:191|unique:users,email,'.$shift->id,
        'password' => 'required|max:191',
      ]);

      $shift = new User();
      $shift->firstName = $request->input('fname');
      $shift->lastName = $request->input('lname');
      $shift->eircode = $request->input('eircode');
      $shift->phoneNumber = $request->input('num');
      $shift->email = $request->input('email');
      $shift->password = $request->input('password');

      $shift->update();

      // CHANGE THE ABOVE TO $USER AND BELOW THE UPDATE, UPDATE PATIENTS TABLE

      return redirect()->route('manager.shifts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $shift = Shift::findOrFail($id);

      $shift->delete();

      return redirect()->route('manager.shifts.index');
    }
}

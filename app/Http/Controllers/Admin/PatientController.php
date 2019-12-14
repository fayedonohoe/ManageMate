<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Role;
use App\Insurer;

class PatientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return view('admin.patients.index')->with([
          'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurers = Insurer::all();

        return view('admin.patients.create')->with([
          'insurers' => $insurers
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
        $request->validate([
          'fname' => 'required|max:191',
          'lname' => 'required|max:191',
          'eircode' => 'required|alpha_num|size:7',
          'num' => 'required|size:10',
          'email' => 'required|max:191',
          'password' => 'required|max:191',
          //'policyNum' => 'nullable|size:10',
        ]);

        $user = new User();
        $user->firstName = $request->input('fname');
        $user->lastName = $request->input('lname');
        $user->eircode = $request->input('eircode');
        $user->phoneNumber = $request->input('num');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password') );

        $user->save();

        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->insurer_id = $request->input('insurer_id');
        $patient->policyNum = $request->input('policyNum');
        $patient->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patients.show')->with([
          'patient' => $patient
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
      $insurers = Insurer::all();
      $patient = Patient::findOrFail($id);

      return view('admin.patients.edit')->with([
        'patient' => $patient,
        'insurers' => $insurers,
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
      $patient = Patient::findOrFail($id);

      $request->validate([
        'fname' => 'required|max:191',
        'lname' => 'required|max:191',
        'eircode' => 'required|alpha_num|size:7',
        'num' => 'required|size:10',
        'email' => 'required|max:191|unique:users,email,'.$patient->id,
        'password' => 'required|max:191',
      ]);

      $patient = new User();
      $patient->firstName = $request->input('fname');
      $patient->lastName = $request->input('lname');
      $patient->eircode = $request->input('eircode');
      $patient->phoneNumber = $request->input('num');
      $patient->email = $request->input('email');
      $patient->password = $request->input('password');

      $patient->update();

      // CHANGE THE ABOVE TO $USER AND BELOW THE UPDATE, UPDATE PATIENTS TABLE

      return redirect()->route('admin.patients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);

      $patient->delete();

      return redirect()->route('admin.patients.index');
    }
}

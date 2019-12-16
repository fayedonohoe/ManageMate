<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\User;
use App\Visit;

class VisitController extends Controller
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
        $visits = Visit::all();

        return view('admin.visits.index')->with([
          'visits' => $visits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $patients = Patient::all();
      $doctors = Doctor::all();

      return view('admin.visits.create')->with([
        'patients' => $patients,
        'doctors' => $doctors
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
      //date, time, duration, cost, patient, doctor
        // $request->validate([
        //   'fname' => 'required|max:191',
        //   'lname' => 'required|max:191',
        //   'eircode' => 'required|alpha_num|size:7',
        //   'num' => 'required|size:10',
        //   'email' => 'required|max:191',
        //   'password' => 'required|max:191',
        //   //'policyNum' => 'nullable|size:10',
        // ]);

        $visit = new Visit();
        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = $request->input('doctor_id');

        $visit->save();

        return redirect()->route('admin.visits.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('admin.visits.show')->with([
        'visit' => $visit
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
        // $doctors = Doctor::all();
        // $patients = Patient::all();
        // $visit = Visit::findOrFail($id);
        //
        // return view('admin.visits.edit')->with([
        //   'visit' => $visit,
        //   'doctors' => $doctors,
        //   'patients' => $patients,
        // ]);
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
        // $visit = Visit::findOrFail($id);
        //
        // $visit = new Visit();
        // $visit->date = $request->input('date');
        // $visit->time = $request->input('time');
        // $visit->duration = $request->input('duration');
        // $visit->cost = $request->input('cost');
        // $visit->patient_id = $request->input('patient_id');
        // $visit->doctor_id = $request->input('doctor_id');
        //
        // $visit->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);

      $visit->delete();

      return redirect()->route('admin.visits.index');
    }
}

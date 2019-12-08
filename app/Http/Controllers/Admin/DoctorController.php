<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor; //may just be use Doctor

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doctor::all();
        // 
        // return view('admin.doctors.index')->with([
        //   'doctors' => $docs
        // ])
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // vid 2, 23:35
        return view('admin.doctors.create');
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
          'eircode' => 'required|alpha_num|size:8',
          'num' => 'required|size:10',
          'email' => 'required|max:191',
          'password' => 'required|max:191',
        ]);

        $doc = new Doctor();
        $doc->firstName = $request->input('fname');
        $doc->lastName = $request->input('lname');
        $doc->eircode = $request->input('eircode');
        $doc->phoneNumber = $request->input('num');
        $doc->email = $request->input('email');
        $doc->password = $request->input('password');

        $doc->save();
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

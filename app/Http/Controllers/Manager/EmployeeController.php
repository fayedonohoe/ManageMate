<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Role;
use App\Contract;
use App\Shift;

class EmployeeController extends Controller
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
        $employees = Employee::all();

        return view('manager.employees.index')->with([
          'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::all();

        return view('manager.employees.create')->with([
          'contracts' => $contracts
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

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->contract_id = $request->input('contract_id');
        $employee->policyNum = $request->input('policyNum');
        $employee->save();

        return redirect()->route('manager.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('manager.employees.show')->with([
          'employee' => $employee
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
      $employee = Employee::findOrFail($id);

      return view('manager.employees.edit')->with([
        'employee' => $employee,
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
      $employee = Employee::findOrFail($id);

      $request->validate([
        'fname' => 'required|max:191',
        'lname' => 'required|max:191',
        'eircode' => 'required|alpha_num|size:7',
        'num' => 'required|size:10',
        'email' => 'required|max:191|unique:users,email,'.$employee->id,
        'password' => 'required|max:191',
      ]);

      $employee = new User();
      $employee->firstName = $request->input('fname');
      $employee->lastName = $request->input('lname');
      $employee->eircode = $request->input('eircode');
      $employee->phoneNumber = $request->input('num');
      $employee->email = $request->input('email');
      $employee->password = $request->input('password');

      $employee->update();

      // CHANGE THE ABOVE TO $USER AND BELOW THE UPDATE, UPDATE PATIENTS TABLE

      return redirect()->route('manager.employees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee = Employee::findOrFail($id);

      $employee->delete();

      return redirect()->route('manager.employees.index');
    }
}

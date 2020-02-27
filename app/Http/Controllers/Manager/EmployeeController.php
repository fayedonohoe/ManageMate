<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-25T19:22:48+00:00




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

    public function index()
    {
        $employees = Employee::all();

        return view('manager.employees.index')->with([
          'employees' => $employees
        ]);
    }


    public function create()
    {
        $contracts = Contract::all();

        return view('manager.employees.create')->with([
          'contracts' => $contracts
        ]);
    }


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
        $user->roles()->attach(Role::where('name', 'employee')->first());

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->contract_id = $request->input('contract_id');
        $employee->policyNum = $request->input('policyNum');
        $employee->save();

        return redirect()->route('manager.employees.index');
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('manager.employees.show')->with([
          'employee' => $employee
        ]);
    }


    public function edit($id)
    {
      $contracts = Contract::all();
      $employee = Employee::findOrFail($id);

      return view('manager.employees.edit')->with([
        'employee' => $employee,
        'contracts' => $contracts,
      ]);
    }


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

      $employee = new Employee();
      $employee->firstName = $request->input('fname');
      $employee->lastName = $request->input('lname');
      $employee->eircode = $request->input('eircode');
      $employee->phoneNumber = $request->input('num');
      $employee->email = $request->input('email');
      $employee->password = $request->input('password');

      $employee->user->update();

      // CHANGE THE ABOVE TO $USER AND BELOW THE UPDATE, UPDATE EMPLOYEES TABLE

      return redirect()->route('manager.employees.index');
    }


    public function destroy($id)
    {
      $employee = Employee::findOrFail($id);
      //$user = User::findOrFail($employee->user_id); // Constraint violation

      $employee->delete();
      //$user->delete();

      return redirect()->route('manager.employees.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manager;
use App\User;
use App\Role;

class ManagerController extends Controller
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
        //$managers = Manager::all()->paginate(10);
        $managers = Manager::all();

        return view('admin.managers.index')->with([
          'managers' => $managers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // vid 2, 23:35
        return view('admin.managers.create');
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
        ]);

        $user = new User();
        $user->firstName = $request->input('fname');
        $user->lastName = $request->input('lname');
        $user->eircode = $request->input('eircode');
        $user->phoneNumber = $request->input('num');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password') );

        $user->save();

        $manager = new Manager();
        $manager->startofEmployment = $request->input('started');
        $manager->user_id = $user->id;
        $manager->save();


        // $newrole = User
        return redirect()->route('admin.managers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = Manager::findOrFail($id);

        return view('admin.managers.show')->with([
          'manager' => $manager
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
      $manager = Manager::findOrFail($id);

      return view('admin.managers.edit')->with([
        'manager' => $manager
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
      $manager = Manager::findOrFail($id);

      $request->validate([
        'fname' => 'required|max:191',
        'lname' => 'required|max:191',
        'eircode' => 'required|alpha_num|size:7',
        'num' => 'required|size:10',
        'email' => 'required|max:191|unique:users,email,'.$manager->id,
        'password' => 'required|max:191',
      ]);

      $manager = new User();
      $manager->firstName = $request->input('fname');
      $manager->lastName = $request->input('lname');
      $manager->eircode = $request->input('eircode');
      $manager->phoneNumber = $request->input('num');
      $manager->email = $request->input('email');
      $manager->password = $request->input('password');

      $manager->update();

      return redirect()->route('admin.managers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $manager = Manager::findOrFail($id);

      $manager->delete();

      return redirect()->route('admin.managers.index');
    }
}

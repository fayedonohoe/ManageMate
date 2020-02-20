<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $home = 'employee.home';

        if ($user->hasRole('admin')) {
          $home = 'admin.home';
        }
        else if ($user->hasRole('manager')) {
          $home = 'manager.home';
        }

        return redirect()->route($home);
    }
}

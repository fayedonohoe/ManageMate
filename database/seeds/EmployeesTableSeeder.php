<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Contract;
use App\Role;
use App\User;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'employee')->first();

      foreach ($role_user->users as $user){
        $employee = new Employee();
        $employee->user_id = 3;
        $employee->contract_id =1;
        $employee->policyNum = "2018102938"; //RANDOMIZE THIS LATER
        $employee->save();
      }
    }
}

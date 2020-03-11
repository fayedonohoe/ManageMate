<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-03-06T10:09:35+00:00




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
        $employee->user_id = $user->id;
        $employee->contract_id =1;
        $employee->policyNum = "2018102938"; //RANDOMIZE THIS LATER
        $employee->save();
      }
    }
}

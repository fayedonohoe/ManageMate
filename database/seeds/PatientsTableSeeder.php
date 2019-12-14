<?php

use Illuminate\Database\Seeder;
use App\Patient;
use App\Insurer;
use App\Role;
use App\User;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'patient')->first();

      foreach ($role_user->users as $user){
        $patient = new Patient();
        $patient->user_id = 3;
        $patient->insurer_id =1;
        $patient->policyNum = "2018102938"; //RANDOMIZE THIS LATER
        $patient->save();
      }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Manager;
use App\User;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'manager')->first();

        foreach ($role_user->users as $user){
          $manager = new Manager();
          $manager->startOfEmployment = "2015-05-20";
          $manager->user_id = $user->id;
          $manager->save();
        }
    }

}

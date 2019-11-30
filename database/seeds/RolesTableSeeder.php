<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      $role_admin = new Role();
      $role_admin->name = 'admin';
      $role_admin->description = 'An adminastrative user, full access to system';
      $role_admin->save();

      $role_doctor = new Role();
      $role_doctor->name = 'doctor';
      $role_doctor->description = 'A doctor on the Medical Centre staff';
      $role_doctor->save();

      $role_user = new Role();
      $role_user->name = 'patient';
      $role_user->description = 'A patient of the Medical Centre';
      $role_user->save();

  }
}

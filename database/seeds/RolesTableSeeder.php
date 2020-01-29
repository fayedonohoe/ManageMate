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

      $role_manager = new Role();
      $role_manager->name = 'manager';
      $role_manager->description = 'A manager with full authorisation';
      $role_manager->save();

      $role_user = new Role();
      $role_user->name = 'employee';
      $role_user->description = 'A employee of the company';
      $role_user->save();

  }
}

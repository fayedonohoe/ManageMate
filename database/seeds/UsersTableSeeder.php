<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();

      $admin = new User();
      $admin->name = 'Faye Donohoe';
      $admin->email = 'admin@medcentral.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->name = 'John Smith';
      $doctor->email = 'johnsmith@medcentral.ie';
      $doctor->password = bcrypt('tardis');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->name = 'Donna Noble';
      $patient->email = 'donnanoble@medcentral.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }
}

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
      $admin->firstName = 'Faye';
      $admin->lastName = 'Donohoe';
      $admin->eircode = 'D16R2F5';
      $admin->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $admin->email = 'admin@medcentral.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->firstName = 'John';
      $doctor->lastName = 'Smith';
      $doctor->eircode = 'D18K9L5';
      $doctor->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $doctor->email = 'johnsmith@medcentral.ie';
      $doctor->password = bcrypt('tardis');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->firstName = 'Donna';
      $patient->lastName = 'Noble';
      $patient->eircode = 'C90K0JL';
      $patient->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $patient->email = 'donnanoble@medcentral.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->firstName = 'Rose';
      $patient->lastName = 'Tyler';
      $patient->eircode = 'D12LK87';
      $patient->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $patient->email = 'rosetyler@medcentral.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }

    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;

      for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
      }
      return implode('', $pieces);
    }


}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Shift;

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
      $role_manager = Role::where('name', 'manager')->first();
      $role_employee = Role::where('name', 'employee')->first();

      $shift_wd_open = Shift::where('name', 'weekday_opening')->first();

      $admin = new User();
      $admin->firstName = 'Faye';
      $admin->lastName = 'Donohoe';
      $admin->eircode = 'D16R2F5';
      $admin->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $admin->email = 'admin@managemate.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $manager = new User();
      $manager->firstName = 'John';
      $manager->lastName = 'Smith';
      $manager->eircode = 'D18K9L5';
      $manager->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $manager->email = $manager->firstName . $manager->lastName .'@managemate.ie';
      $manager->password = bcrypt('tardis');
      $manager->save();
      $manager->roles()->attach($role_manager);
      $manager->shifts()->attach($shift_wd_open);

      $employee = new User();
      $employee->firstName = 'Donna';
      $employee->lastName = 'Noble';
      $employee->eircode = 'C90K0JL';
      $employee->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $employee->email = $employee->firstName . $employee->lastName .'@managemate.ie';
      $employee->password = bcrypt('secret');
      $employee->save();
      $employee->roles()->attach($role_employee);
      $employee->shifts()->attach($shift_wd_open);

      $employee = new User();
      $employee->firstName = 'Rose';
      $employee->lastName = 'Tyler';
      $employee->eircode = 'D12LK87';
      $employee->phoneNumber = '08' . $this->random_str(8, '0123456789');
      $employee->email = $employee->firstName . $employee->lastName .'@managemate.ie';;
      $employee->password = bcrypt('secret');
      $employee->save();
      $employee->roles()->attach($role_employee);
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

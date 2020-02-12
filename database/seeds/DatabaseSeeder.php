<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ManagersTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(UserShiftsTableSeeder::class);
        //$this->call(VisitsTableSeeder::class);
    }
}

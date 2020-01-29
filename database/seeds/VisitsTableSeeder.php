<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Role;
use App\User;
use App\Visit;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visit = new Visit();
        $visit->date = "2019-12-14";
        $visit->time = '0815';
        $visit->duration = '20';
        $visit->cost = '60';
        $visit->employee_id = 1;
        $visit->manager_id =1;
        $visit->save();

      }
    }

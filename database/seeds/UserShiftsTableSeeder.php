<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Shift;
use App\UserShift;

class UserShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usershift = new UserShift();
        $usershift->date = "2019-12-14";
        $usershift->user_id = 2;
        $usershift->shift_id = 1;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2019-12-10";
        $usershift->user_id = 2;
        $usershift->shift_id = 2;
        $usershift->unavailable = false;
        $usershift->note = "Please leave the keys out!";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2019-12-19";
        $usershift->user_id = 3;
        $usershift->shift_id = 3;
        $usershift->unavailable = false;
        $usershift->note = "Overlap lunch with Rose please";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2019-12-06";
        $usershift->user_id = 4;
        $usershift->shift_id = 3;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();
    }
}

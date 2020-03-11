<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-03-06T09:58:48+00:00




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
        $usershift->date = "2020-02-24";
        $usershift->user_id = 1;
        $usershift->shift_id = 1;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-02-25";
        $usershift->user_id = 2;
        $usershift->shift_id = 1;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-02-28";
        $usershift->user_id = 2;
        $usershift->shift_id = 3;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-03-02";
        $usershift->user_id = 2;
        $usershift->shift_id = 2;
        $usershift->unavailable = false;
        $usershift->note = "Please leave the keys out!";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-03-05";
        $usershift->user_id = 3;
        $usershift->shift_id = 3;
        $usershift->unavailable = false;
        $usershift->note = "Overlap lunch with Rose please";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-03-05";
        $usershift->user_id = 4;
        $usershift->shift_id = 2;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();

        $usershift = new UserShift();
        $usershift->date = "2020-03-01";
        $usershift->user_id = 4;
        $usershift->shift_id = 1;
        $usershift->unavailable = false;
        $usershift->note = "";
        $usershift->save();
    }
}

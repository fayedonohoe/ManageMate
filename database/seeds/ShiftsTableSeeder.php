<?php

use Illuminate\Database\Seeder;
use App\Shift;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $wd_open = new Shift();
      $wd_open->name = 'weekday_opening';
      $wd_open->startTime = '083000';
      $wd_open->endTime = '173000';
      $wd_open->paidHours = 8;
      $wd_open->isActive = true;
      $wd_open->save();

      $wd_close = new Shift();
      $wd_close->name = 'weekday_closing';
      $wd_close->startTime = '123000';
      $wd_close->endTime = '213000';
      $wd_close->paidHours = 8;
      $wd_close->isActive = true;
      $wd_close->save();

      $wd_midshift = new Shift();
      $wd_midshift->name = 'weekday_midshift';
      $wd_midshift->startTime = '103000';
      $wd_midshift->endTime = '193000';
      $wd_midshift->paidHours = 8;
      $wd_midshift->isActive = true;
      $wd_midshift->save();

    }
}

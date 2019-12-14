<?php

use Illuminate\Database\Seeder;
use App\Insurer;

class InsurersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurer = new Insurer();
        $insurer->name = 'Irish Life';
        $insurer->companyRegistrationNumber = 'IL19275049';
        $insurer->save();

        $insurer = new Insurer();
        $insurer->name = 'Laya Healthcare';
        $insurer->companyRegistrationNumber = 'LH86630187';
        $insurer->save();

        $insurer = new Insurer();
        $insurer->name = 'Allianz Health';
        $insurer->companyRegistrationNumber = 'AH10038799';
        $insurer->save();

    }
}

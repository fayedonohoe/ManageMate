<?php

use Illuminate\Database\Seeder;
use App\Contract;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contract = new Contract();
        $contract->name = 'Irish Life';
        $contract->companyRegistrationNumber = 'IL19275049';
        $contract->save();

        $contract = new Contract();
        $contract->name = 'Laya Healthcare';
        $contract->companyRegistrationNumber = 'LH86630187';
        $contract->save();

        $contract = new Contract();
        $contract->name = 'Allianz Health';
        $contract->companyRegistrationNumber = 'AH10038799';
        $contract->save();

    }
}

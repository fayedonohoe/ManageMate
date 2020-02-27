<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-25T16:51:19+00:00




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
        $contract->title = 'Sales Assistant - Part Time - 8h';
        $contract->hoursPerWeek = '8';
        $contract->code = 'sa_pt_8';
        $contract->save();

        $contract = new Contract();
        $contract->title = 'Sales Assistant - Full Time - 32h';
        $contract->hoursPerWeek = '32';
        $contract->code = 'sa_ft_32';
        $contract->save();

        $contract = new Contract();
        $contract->title = 'Manager - Full Time - 40h';
        $contract->hoursPerWeek = '40';
        $contract->code = 'ma_ft_40';
        $contract->save();


    }
}

<?php

namespace Database\Seeders;

use App\Imports\CoSoYTeImport;
use App\Imports\HealthFacilityImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;


class HealthFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new HealthFacilityImport, storage_path('app/public/data/CoSoYTe/CoSoYTe.xlsx'));
    }
}

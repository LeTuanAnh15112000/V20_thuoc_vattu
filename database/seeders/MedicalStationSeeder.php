<?php

namespace Database\Seeders;

use App\Imports\MedicalStationImport;
use App\Imports\TramYTeImport;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;
class MedicalStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new MedicalStationImport, storage_path('app/public/data/CoSoYTe/TramYTe.xlsx'));
    }
}

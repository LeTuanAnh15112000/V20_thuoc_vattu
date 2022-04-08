<?php

namespace Database\Seeders;

use App\Imports\PatientImport;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new PatientImport, storage_path('app/public/data/VitaminA/Patients.xlsx'));
    }
}

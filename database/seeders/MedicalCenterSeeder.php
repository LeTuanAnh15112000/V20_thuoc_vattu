<?php

namespace Database\Seeders;

use App\Imports\MedicalCenterImport;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;

class MedicalCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new MedicalCenterImport, storage_path('app/public/data/CoSoYTe/TrungTamYTe.xlsx'));
    }
}

<?php

namespace Database\Seeders;

use App\Imports\ChungChiHanhNgheImport;
use App\Imports\ProfessionalCetificateImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ProfessionalCetificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProfessionalCetificateImport, storage_path('app/public/data/ChungChiHanhNghe.xlsx'));
    }
}

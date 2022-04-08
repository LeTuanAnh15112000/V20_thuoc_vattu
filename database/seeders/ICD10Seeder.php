<?php

namespace Database\Seeders;

use App\Imports\ICD10Import;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ICD10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ICD10Import, storage_path('app/public/data/ICD10.xlsx'));
    }
}

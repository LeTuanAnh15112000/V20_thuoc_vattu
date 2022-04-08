<?php

namespace Database\Seeders;

use App\Imports\DepartmentOfHealthImport;
use Illuminate\Database\Seeder;

use Maatwebsite\Excel\Facades\Excel;

class DepartmentOfHealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DepartmentOfHealthImport, storage_path('app/public/data/CoSoYTe/SoYTe.xlsx'));
    }
}

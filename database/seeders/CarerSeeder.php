<?php

namespace Database\Seeders;

use App\Imports\CarerImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CarerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CarerImport, storage_path('app/public/data/Carer.xlsx'));
    }
}

<?php

namespace Database\Seeders;

use App\Imports\DonViCongTacCanBoImport;
use App\Imports\WorkUnitImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class WorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new WorkUnitImport, storage_path('app/public/data/DonViCongTacCanBo.xlsx'));
    }
}

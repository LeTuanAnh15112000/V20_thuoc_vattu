<?php

namespace Database\Seeders;

use App\Imports\ChucVuImport;
use App\Imports\PositionImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new PositionImport, storage_path('app/public/data/ChucVu.xlsx'));
    }
}

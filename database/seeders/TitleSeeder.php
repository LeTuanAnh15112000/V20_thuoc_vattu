<?php

namespace Database\Seeders;

use App\Imports\ChucDanhImport;
use App\Imports\TitleImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new TitleImport, storage_path('app/public/data/ChucDanh.xlsx'));
    }
}

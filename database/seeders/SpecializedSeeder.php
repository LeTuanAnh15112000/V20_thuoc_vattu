<?php

namespace Database\Seeders;

use App\Imports\ChuyenNganhImport;
use App\Imports\SpecializedImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class SpecializedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SpecializedImport, storage_path('app/public/data/ChuyenNganh.xlsx'));
    }
}

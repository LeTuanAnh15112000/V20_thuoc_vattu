<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NguonnhapImport;
class NguonnhapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new NguonnhapImport, storage_path('app/public/data/nguonnhap.xlsx'));

    }
}

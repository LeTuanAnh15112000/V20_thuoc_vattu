<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Thuoc_vattu\PhanloaithuocImport;
class PhanloaithuocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new PhanloaithuocImport, storage_path('app/public/data/danhsachphanloaithuoc.xlsx'));

    }
}

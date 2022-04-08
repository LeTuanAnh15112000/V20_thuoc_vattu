<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HangSanXuatImport;
class HangsanxuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new HangSanXuatImport, storage_path('app/public/data/danhsachhangsanxuat.xlsx'));

    }
}

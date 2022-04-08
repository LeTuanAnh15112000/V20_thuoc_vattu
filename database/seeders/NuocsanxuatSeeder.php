<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NuocSanXuatImport;
class NuocsanxuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new NuocSanXuatImport, storage_path('app/public/data/nuocsanxuat.xlsx'));

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NhaCungCapImport;
class NhacungcapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new NhaCungCapImport, storage_path('app/public/data/danhsachhangsanxuat.xlsx'));

    }
}

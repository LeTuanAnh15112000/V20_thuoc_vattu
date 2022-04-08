<?php

namespace Database\Seeders;

use App\Imports\VitaminA\VitaminImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class VitaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new VitaminImport, storage_path('app/public/data/VitaminA/Vitamin.xlsx'));
    }
}

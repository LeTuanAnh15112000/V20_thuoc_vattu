<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VitritramyteImport;
class VitritramyteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new VitritramyteImport, storage_path('app/public/data/vitritramyte.xlsx'));

    }
}

<?php

namespace Database\Seeders;

use App\Imports\EthnicImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new EthnicImport, storage_path('app/public/data/DanToc.xlsx'));
    }
}

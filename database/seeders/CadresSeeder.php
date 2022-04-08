<?php

namespace Database\Seeders;

use App\Imports\CadresImport;
use App\Imports\CanBoImport;
use App\Imports\CardresImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CadresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CadresImport, storage_path('app/public/data/CanBo.xlsx'));
    }
}

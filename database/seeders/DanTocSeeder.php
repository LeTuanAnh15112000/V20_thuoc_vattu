<?php

namespace Database\Seeders;

use App\Imports\DanTocImport;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DanTocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DanTocImport, storage_path('app/public/data/DanToc.xlsx'));
    }
}

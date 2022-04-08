<?php

namespace Database\Seeders;

use App\Imports\CountryImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CountryImport, storage_path('app/public/data/QuocTich.xlsx'));
    }
}

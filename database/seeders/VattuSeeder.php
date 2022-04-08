<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VatTuImport;
class VattuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new VatTuImport, storage_path('app/public/data/danhsachvattu.xlsx'));

    }
}

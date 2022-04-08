<?php

namespace Database\Seeders;

use App\Imports\NguoiDungImport;
use App\Imports\UserImport;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new UserImport, storage_path('app/public/data/NguoiDung.xlsx'));
    }
}

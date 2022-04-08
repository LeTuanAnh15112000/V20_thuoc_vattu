<?php

namespace Database\Seeders;

use App\Imports\DeploymentLocationImport;
use App\Models\DeploymentLocation;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DeploymentLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DeploymentLocationImport, storage_path('app/public/data/DeploymentLocations.xlsx'));
    }
}

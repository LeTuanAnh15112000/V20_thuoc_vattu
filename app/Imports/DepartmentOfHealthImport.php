<?php

namespace App\Imports;

use App\Models\DepartmentOfHealth;
use App\Models\SoYTe;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DepartmentOfHealthImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DepartmentOfHealth([
            'ten_so_y_te'=>$row['ten_so_y_te'],
        ]);
    }
}

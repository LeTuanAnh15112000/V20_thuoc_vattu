<?php

namespace App\Imports;

use App\Models\MedicalCenter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicalCenterImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicalCenter([
            'id_department_of_health'=> $row['ma_so_y_te'],
            'ten_trung_tam_y_te'=> $row['ten_trung_tam_y_te']
        ]);
    }
}

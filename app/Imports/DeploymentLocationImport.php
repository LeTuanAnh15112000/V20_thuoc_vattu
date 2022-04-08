<?php

namespace App\Imports;

use App\Models\DeploymentLocation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DeploymentLocationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DeploymentLocation([
            'id_health_facility'=>$row['ma_co_so_y_te'],
            'ten_dia_diem_trien_khai'=>$row['ten_dia_diem_trien_khai'],
            'dia_chi_trien_khai'=>$row['dia_chi'],
            'ma_tinh_trien_khai'=>$row['ma_tinh'],
            'ma_huyen_trien_khai'=>$row['ma_huyen'],
            'ma_xa_trien_khai'=>$row['ma_xa']
        ]);
    }
}

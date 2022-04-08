<?php

namespace App\Imports;

use App\Models\AffiliatedArea;
use App\Models\CoSoYTe;
use App\Models\HealthFacility;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HealthFacilityImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HealthFacility([
            'id_department_of_health'=>$row['ma_so_y_te'],
            'id_medical_center'=>$row['ma_trung_tam_y_te'],
            'id_medical_station'=>$row['ma_tram_y_te'],
            'ten_co_so_y_te'=>$row['ten_co_so_y_te']
        ]);
    }
}

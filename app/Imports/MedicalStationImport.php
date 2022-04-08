<?php

namespace App\Imports;

use App\Models\MedicalStation;
use App\Models\TramYTe;
use Faker\Provider\Medical;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicalStationImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicalStation([
            'id_medical_center'=>$row['ma_trung_tam_y_te'],
            'ten_tram_y_te'=>$row['ten_tram_y_te']
        ]);
    }
}

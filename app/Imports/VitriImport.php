<?php

namespace App\Imports;

use App\Models\Vitri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VitriImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vitri([
            //
            'matyt' => $row['ma_tram_y_te'],
            'tentyt' => $row['ten_tram_y_te'],
            'vido' => $row['vi_do'],
            'kinhdo' => $row['kinh_do'],
            'diachi' => $row['dia_chi'],

        ]);
    }
}

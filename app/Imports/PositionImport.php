<?php

namespace App\Imports;

use App\Models\ChucVu;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PositionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Position([
            'ten_chuc_vu'=>$row['ten_chuc_vu']
        ]);
    }
}

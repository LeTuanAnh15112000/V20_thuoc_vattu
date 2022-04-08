<?php

namespace App\Imports\VitaminA;

use App\Models\VitaminA\Vitamin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VitaminImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vitamin([
            'id_health_facility'=>$row['ma_co_so_y_te'],
            'ten_vitamin'=>$row['ten_vitamin'],
            'so_luong'=>$row['so_luong'],
            'ngay_nhap'=>$row['ngay_nhap']
        ]);
    }
}

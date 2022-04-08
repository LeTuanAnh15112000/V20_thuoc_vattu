<?php

namespace App\Imports;

use App\Models\DuongDung;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DuongDungImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DuongDung([
            //
            'maduongdung'=>$row['duong_dung'],
            'tenduongdung'=>$row['ma_duong_dung'],
            'id_tramyte'=>$row['id'],
        ]);
    }
}

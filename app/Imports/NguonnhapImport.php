<?php

namespace App\Imports;

use App\Models\NguonNhap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NguonnhapImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NguonNhap([
            //
            'tennguon'=>$row['ten'],
            'manguon'=>$row['ma_nguon']
        ]);
    }
}

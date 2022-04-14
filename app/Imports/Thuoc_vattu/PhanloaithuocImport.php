<?php

namespace App\Imports\Thuoc_vattu;

use App\Models\Phanloaithuoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhanloaithuocImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Phanloaithuoc([
            //
            'tenloaithuoc'=>$row['ten_loai_thuoc'],
            'maphanloai'=>$row['ma_loai_thuoc'],
            'ghichu'=>$row['ghi_chu'],
        ]);
    }
}

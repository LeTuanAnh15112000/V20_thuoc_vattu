<?php

namespace App\Imports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HangSanXuatImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HangSanXuat([
            //
            'tenhangsanxuat'=>$row['ten_hang_san_xuat'],
            'tenviettat'=>$row['ten_viet_tat'],
            'diachi'=>$row['dia_chi'],
            'email'=>$row['email'],
            'masothue'=>$row['ma_so_thue'],
            'website'=>$row['website'],
            'id_tramyte'=>$row['id'],
        ]);
    }
}

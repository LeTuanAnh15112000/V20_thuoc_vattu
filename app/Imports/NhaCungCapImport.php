<?php

namespace App\Imports;

use App\Models\NhaCungCap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NhaCungCapImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NhaCungCap([
            //
            'tennhacungcap'=>$row['ten_hang_san_xuat'],
            'tenviettat'=>$row['ten_viet_tat'],
            'diachi'=>$row['dia_chi'],
            'email'=>$row['email'],
            'masothue'=>$row['ma_so_thue'],
            'website'=>$row['website'],
            'id_tramyte'=>$row['id'],
        ]);
    }
}

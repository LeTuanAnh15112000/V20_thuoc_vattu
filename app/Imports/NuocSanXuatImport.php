<?php

namespace App\Imports;

use App\Models\NuocSanXuat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NuocSanXuatImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NuocSanXuat([
            //
            'tennuocsanxuat'=>$row['nuoc_san_xuat'],
            'tenviettat'=>$row['ten_vat_tat'],
            'diachi'=>$row['dia_chi'],
            'email'=>$row['email'],
            'masothue'=>$row['ma_so_thue'],
            'website'=>$row['website'],
            'id_tramyte'=>$row['id'],
        ]);
    }
}

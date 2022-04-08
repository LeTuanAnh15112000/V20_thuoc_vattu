<?php

namespace App\Imports;

use App\Models\Carer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CarerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Carer([
            'id_health_facility'=>$row['ma_co_so_y_te'],
            'id_patient'=>$row['ma_benh_nhan'],
            'ten_ncs'=>$row['ten_nguoi_cham_soc'],
            'nam_sinh_ncs'=>$row['nam_sinh'],
            'sdt_ncs'=>$row['so_dien_thoai'],
            'email_ncs'=>$row['email'],
            'cmnd_ncs'=>$row['cmnd'],
            'quan_he_voi_benh_nhan'=>$row['quan_he_voi_benh_nhan']
        ]);
    }
}

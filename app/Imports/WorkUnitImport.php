<?php

namespace App\Imports;

use App\Models\DonViCongTacCanBo;
use App\Models\WorkUnit;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WorkUnitImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WorkUnit([
            'id_health_facility'=>$row['ma_co_so_y_te'],
            'ma_tinh_dvct'=>$row['ma_tinh'],
            'ma_huyen_dvct'=>$row['ma_huyen'],
            'ma_xa_dvct'=>$row['ma_xa'],
            'dia_chi_dvct'=>$row['dia_chi'],
            'ten_dvct'=>$row['ten_don_vi_cong_tac'],
            'ten_viet_tat'=>$row['ten_viet_tat'],
            'ngay_bat_dau'=>$row['ngay_bat_dau'],
            'ngay_ket_thuc'=>$row['ngay_ket_thuc']
        ]);
    }
}

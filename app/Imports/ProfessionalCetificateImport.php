<?php

namespace App\Imports;

use App\Models\ChungChiHanhNghe;
use App\Models\ProfessionalCetificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProfessionalCetificateImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProfessionalCetificate([
            'id_cadres'=>$row['ma_can_bo'],
            'so_cchn'=>$row['so_chung_chi_hanh_nghe'],
            'ten_cchn'=>$row['ten_chung_chi_hanh_nghe'],
            'ngay_cap_cchn'=>$row['ngay_cap_chung_chi_hanh_nghe'],
            'don_vi_cap_cchn'=>$row['don_vi_cap_chung_chi_hanh_nghe'],
            'thoi_gian'=>$row['thoi_gian'],
            'trang_thai'=>$row['trang_thai'],
        ]);
    }
}

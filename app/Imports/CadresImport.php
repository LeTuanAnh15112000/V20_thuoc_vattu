<?php

namespace App\Imports;

use App\Models\Cadres;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CadresImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cadres([
            'ma_dinh_danh_v20'=>$row['ma_dinh_danh_v20'],
            'ho_ten'=>$row['ho_va_ten'],
            'ngay_sinh'=>$row['ngay_sinh'],
            'gioi_tinh'=>$row['gioi_tinh'],
            'sdt'=>$row['so_dien_thoai'],
            'so_cmnd'=>$row['cmnd_hoac_cccd'],
            'ngay_cap_cmnd'=>$row['ngay_cap_cmnd'],
            'noi_cap_cmnd'=>$row['noi_cap_cmnd'],
            'id_work_unit'=>$row['ma_don_vi_cong_tac'],
            'ma_tinh_tt'=>$row['ma_tinh_thuong_tru'],
            'ma_huyen_tt'=>$row['ma_huyen_thuong_tru'],
            'ma_xa_tt'=>$row['ma_xa_thuong_tru'],
            'dia_chi_tt'=>$row['dia_chi_thuong_tru'],
            'ma_tinh_hk'=>$row['ma_tinh_ho_khau'],
            'ma_huyen_hk'=>$row['ma_huyen_ho_khau'],
            'ma_xa_hk'=>$row['ma_xa_ho_khau'],
            'dia_chi_hk'=>$row['dia_chi_ho_khau'],
            'id_position'=>$row['ma_chuc_vu'],
            'id_title'=>$row['ma_chuc_danh'],
            'id_specialized'=>$row['ma_chuyen_nganh_chinh'],
            'id_sub_specialized'=>$row['ma_chuyen_nganh_phu'],
            'tinh_trang_cong_tac'=>$row['tinh_trang_cong_tac'],
            'loai_nhan_luc'=>$row['loai_nhan_luc']
        ]);
    }
}

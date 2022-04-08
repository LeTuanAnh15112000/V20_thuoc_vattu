<?php

namespace App\Imports;

use App\Models\VitaminA\Patient;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PatientImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $today = Carbon::today('Asia/Ho_Chi_Minh')->toDateString();
        $dateOfBirthPatient = Carbon::parse($row['ngay_sinh_benh_nhan'])->diffInMonths($today);
        $typePatient = null;
        
        if($row['loai_benh_nhan'] != '' && $row['gioi_tinh_benh_nhan']==2){
            $typePatient = 4;
        }elseif($dateOfBirthPatient >= 0 && $dateOfBirthPatient <= 6){
            $typePatient = 1;
        }elseif($dateOfBirthPatient >= 24 && $dateOfBirthPatient <= 60){
            $typePatient = 2;
        }elseif($dateOfBirthPatient >= 6 && $dateOfBirthPatient <= 60){
            $typePatient = 3;
        }elseif($row['gioi_tinh_benh_nhan']==2){
            $typePatient = 4;
        }
        return new Patient([
            'id_health_facility'=>$row['ma_co_so_y_te'],
            'ma_dinh_danh_v20'=>$row['ma_dinh_danh_v20'],
            'loai_benh_nhan'=>$typePatient,
            'ho_va_ten'=>$row['ho_va_ten_benh_nhan'],
            'ngay_sinh'=>$row['ngay_sinh_benh_nhan'],
            'gioi_tinh'=>$row['gioi_tinh_benh_nhan'],
            'id_ethnic'=>$row['ma_dan_toc_benh_nhan'],
            'sdt'=>$row['so_dien_thoai_benh_nhan'],
            'cmnd'=>$row['cmnd_hoac_cccd_benh_nhan'],
            'hk_ma_tinh'=>$row['ho_khau_ma_tinh'],
            'hk_ma_huyen'=>$row['ho_khau_ma_huyen'],
            'hk_ma_xa'=>$row['ho_khau_ma_xa'],
            'hk_dia_chi'=>$row['dia_chi_ho_khau'],
            'tt_ma_tinh'=>$row['thuong_tru_ma_tinh'],
            'tt_ma_huyen'=>$row['thuong_tru_ma_huyen'],
            'tt_ma_xa'=>$row['thuong_tru_ma_xa'],
            'tt_dia_chi'=>$row['dia_chi_thuong_tru'],
            'ma_hgd'=>$row['ma_ho_gia_dinh'],
            'don_vi_cong_tac'=>$row['don_vi_cong_tac'],
            'quoc_tich'=>$row['quoc_tich']
        ]);
    }
}

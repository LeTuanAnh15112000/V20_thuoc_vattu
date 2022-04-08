<?php

namespace App\Imports;

use App\Models\Icd10;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ICD10Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Icd10([
            'stt_chuong'=>$row['stt_chuong'],
            'ma_chuong'=>$row['ma_chuong'],
            'chapter_name'=>$row['chapter_name'],
            'ten_chuong'=>$row['ten_chuong'],
            'ma_nhom_chinh'=>$row['ma_nhom_chinh'],
            'main_group_name_i'=>$row['main_group_name_i'],
            'ten_nhom_chinh'=>$row['ten_nhom_chinh'],
            'ma_nhom_phu_1'=>$row['ma_nhom_phu_1'],
            'sub_group_name_i'=>$row['sub_group_name_i'],
            'ten_nhom_phu_1'=>$row['ten_nhom_phu_1'],
            'ma_nhom_phu_2'=>$row['ma_nhom_phu_2'],
            'sub_group_name_ii'=>$row['sub_group_name_ii'],
            'ten_nhom_phu_2'=>$row['ten_nhom_phu_2'],
            'ma_loai'=>$row['ma_loai'],
            'ten_loai'=>$row['ten_loai'],
            'ma_benh'=>$row['ma_benh'],
            'ma_benh_khong_dau'=>$row['ma_benh_khong_dau'],
            'disease_name'=>$row['disease_name'],
            'ghi_chu'=>$row['ghi_chu']
        ]);
    }
}

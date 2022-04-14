<?php

namespace App\Imports;

use App\Models\thuoc;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ThuocImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new thuoc([
            //been trais laf ten coot trong bang csdl ben phai laf trong excel
            'tenthuoc' => $row['ten_thuoc'],
            'soluong' => $row['so_luong'],
            'hamluong' => $row['ham_luong'],
            'dangtrinhbay' => $row['dang_trinh_bay'],
            'dangtebao' => $row['dang_bao_che'],
            'donvi' => $row['don_vi_tinh'],
            'dongia' => $row['gia_vnd'],
            'hangsanxuat' => $row['hang_san_xuat'],
            'nuocsanxuat' => $row['nuoc_san_xuat'],
            'handung' => $row['han_dung'],
            'tenphanloai' => $row['ten_phan_loai'],
            'id_tramyte' => $row['id'],
        ]);
    }
}

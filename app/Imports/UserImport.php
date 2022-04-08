<?php

namespace App\Imports;

use App\Models\NguoiDung;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $trangThai = 0;
        if($row['trang_thai'] == null){
            $trangThai = 1;
        }
        return new User([
            'id_cadres'=>$row['ma_can_bo'],
            'email'=>$row['email'],
            'anh_dai_dien'=>$row['anh_dai_dien'],
            'trang_thai'=>$trangThai,
            'ten_tai_khoan'=>$row['ten_tai_khoan'],
            'password'=>bcrypt($row['mat_khau']),
        ]);
    }
}

<?php

namespace App\Imports\Thuoc_vattu;

use App\Models\Thuoc_vattu\Phieunhapthuocchitiet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhieunhapthuocchitietImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Phieunhapthuocchitiet([
            //
            'tenthuoc'=>$row[0],
            'soluong'=>$row[1],
            'hamluong'=>$row[2],
            'dangtrinhbay'=>$row[3],
            'dangtebao'=>$row[4],
            'donvi'=>$row[5],
            'dongia'=>$row[6],
            'hangsanxuat'=>$row[7],
            'nuocsanxuat'=>$row[8],
            'handung'=>$row[9],

        ]);
    }
}

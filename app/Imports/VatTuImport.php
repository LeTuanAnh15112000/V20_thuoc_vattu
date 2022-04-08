<?php

namespace App\Imports;

use App\Models\VatTu;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class VatTuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VatTu([
            //
            'tenvattu'=>$row['ten_vat_tu_y_te'],
            'mavattu'=>$row['ma_san_pham'],
            'nhomvattu'=>$row['nhom_vat_tu_y_te'],
            'soluong' => $row['so_luong'],
            'hangsohuu'=>$row['hang_so_huu'],
            'dongia'=>$row['gia_niem_yet_vnd'],
            'id_tramyte'=>$row['id']
        ]);
    }
}

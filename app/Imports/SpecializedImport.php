<?php

namespace App\Imports;

use App\Models\ChuyenNganh;
use App\Models\Specialized;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpecializedImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Specialized([
            'ten_chuyen_nganh'=>$row['ten_chuyen_nganh']
        ]);
    }
}

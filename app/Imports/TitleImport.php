<?php

namespace App\Imports;

use App\Models\ChucDanh;
use App\Models\Title;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TitleImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Title([
            'ten_chuc_danh'=>$row['ten_chuc_danh']
        ]);
    }
}

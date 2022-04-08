<?php

namespace App\Imports;

use App\Models\Ethnic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EthnicImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ethnic([
            'ten_dan_toc'=>$row['ten_dan_toc']
        ]);
    }
}

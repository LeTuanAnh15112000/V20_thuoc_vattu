<?php

namespace App\Imports;

use App\Models\Vitritramyte;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VitritramyteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vitritramyte([
            //
            'matramyte'=> 'ma_tram_y_te',
            'tentramyte'=> 'ten_tram_y_te',
            'vido'=> 'vi_do',
            'kinhdo'=> 'kinh_do',
        ]);
    }
}

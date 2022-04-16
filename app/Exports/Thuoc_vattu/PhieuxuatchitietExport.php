<?php

namespace App\Exports\Thuoc_vattu;

use App\Models\Thuoc_vattu\Phieuxuatchitiet;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhieuxuatchitietExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phieuxuatchitiet::all();
    }
}

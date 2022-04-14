<?php

namespace App\Exports\Thuoc_vattu;

use App\Models\Thuoc_vattu\Phieunhapthuocchitiet;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhieunhapthuocchitietExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phieunhapthuocchitiet::all();
    }
}

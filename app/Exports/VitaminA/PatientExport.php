<?php

namespace App\Exports\VitaminA;

use App\Models\VitaminA\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::all();
    }
}

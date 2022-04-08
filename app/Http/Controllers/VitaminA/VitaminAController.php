<?php

namespace App\Http\Controllers\VitaminA;

use App\Http\Controllers\Controller;
use App\Models\DepartmentOfHealth;
use App\Models\HealthFacility;
use App\Models\MedicalCenter;
use App\Models\MedicalStation;
use Illuminate\Http\Request;

class VitaminAController extends Controller
{
    function detail(){
        return view('vitamin_a.detail.chart');
    }

    function dashboard($idMedicalStation,$idHealthFacility){
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        return view('vitamin_a.home.dashboard', [
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById
        ]);
    }
}

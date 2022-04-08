<?php

namespace App\Http\Controllers\VitaminA;

use App\Http\Controllers\Controller;
use App\Models\HealthFacility;
use App\Models\VitaminA\Vitamin;
use Illuminate\Http\Request;

class VitaminController extends Controller
{
    function index($idMedicalStation, $idHealthFacility){
        $vitaminsByHealthFacility = Vitamin::where('id_health_facility', $idHealthFacility)->get();
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        return view('vitamin_a.home.vitamin.index',[
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById,
            'vitamins'=>$vitaminsByHealthFacility
        ]);
    }
}

<?php

namespace App\Http\Controllers\VitaminA;

use App\Http\Controllers\Controller;
use App\Models\DeploymentLocation;
use App\Models\HealthFacility;
use Illuminate\Http\Request;

class DeploymentLocationController extends Controller
{
    function index($idMedicalStation, $idHealthFacility){
        $deploymentLocationByHealthFacility = DeploymentLocation::where('id_health_facility',$idHealthFacility)->get();
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        return view('vitamin_a.home.deployment_location.list',[
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById,
            'deploymentLocations'=>$deploymentLocationByHealthFacility
        ]);
    }
}

<?php

namespace App\Http\Controllers\VitaminA;

use App\Http\Controllers\Controller;
use App\Models\HealthFacility;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    function index($idMedicalStation, $idHealthFacility){
        $schedulesByHealthFacility = Schedule::where('id_health_facility', $idHealthFacility)->get();
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        return view('vitamin_a.home.schedule.index',[
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById,
            'schedule'=>$schedulesByHealthFacility
        ]);
    }
}

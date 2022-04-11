<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LocationController extends Controller
{
    //
    function location($idHealthFacility, $idMedicalStation){
        $title = "Location";
        // lay tên tram y tế
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // 
        $vitri = DB::table('vitritramyte')->where('id', $idMedicalStation)->get();
        return view('thuoc_vattu.location.tramyte', [
            'title'=>$title,
            'vitri'=>$vitri,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

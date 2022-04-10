<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use App\Models\MedicalStation;
use Illuminate\Support\Facades\DB;
class Thuoc_vattuController extends Controller
{
    // Thống kê sơ lượt thuốc vật tư với quyền trung tâm y tế và sở y tế
    function detail($idHealthFacility, $idMedicalStation){
        $idMedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $idMedicalStation->ten_tram_y_te;
        $title = "V20 - Thuốc vật tư thiết yếu";
        $idMedicalStation = $idMedicalStation->id;
        return view('thuoc_vattu.detail.chart',[ 
            'title'=> $title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
        ]);
    }


    // Hiện thị thống kê vật tư với quyền admin và trạm y tế
    function dashboard($idHealthFacility, $idMedicalStation){
        $idMedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $idMedicalStation->ten_tram_y_te;
        $title = "V20 - Thuốc vật tư thiết yếu";
        $idMedicalStation = $idMedicalStation->id;
        return view('thuoc_vattu.detail.chart',[ 
            'title'=> $title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
        ]);
    }

}

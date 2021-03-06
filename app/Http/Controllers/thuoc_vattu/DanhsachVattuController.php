<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachVattuController extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách vật tư ";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $vattu = DB::table('danhmucvattu')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_vattu', [
            'title'=>$title,
            'vattu'=>$vattu,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

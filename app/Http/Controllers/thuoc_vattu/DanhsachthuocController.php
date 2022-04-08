<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachthuocController extends Controller
{
    //

    function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách thuốc";
        $MedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_tram_y_te;
        $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_thuoc', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }



}

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
        // lay tên tram y tế
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // 
        $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $ngayhientai = date("d/m/y");
        return view('thuoc_vattu.detail.list_thuoc', [
            'title'=>$title,
            'medicine'=>$medicine,
            'ngayhientai'=>$ngayhientai,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }



}

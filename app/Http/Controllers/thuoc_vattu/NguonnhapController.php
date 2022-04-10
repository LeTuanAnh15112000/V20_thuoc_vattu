<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NguonnhapController extends Controller
{
    //
    function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách nguồn nhập";
        // lay tên tram y tế
        $MedicalStation = DB::table('health_facilities')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // 
        $nguonnhap = DB::table('danhmucnguon')->get();
        return view('thuoc_vattu.detail.list_nguonnhap', [
            'title'=>$title,
            'nguonnhap'=>$nguonnhap,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

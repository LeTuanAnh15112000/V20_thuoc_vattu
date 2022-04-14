<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhanloaithuocController extends Controller
{
    //
    function phanloai($idHealthFacility, $idMedicalStation){
        $title = "Danh sách loại thuốc";
        // lay tên tram y tế
        $MedicalStation = DB::table('health_facilities')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // 
        $phanloai = DB::table('phanloaithuoc')->get();
        return view('thuoc_vattu.phanloaithuoc.list', [
            'title'=>$title,
            'phanloai'=>$phanloai,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
    // danh sach thuốc trng loại thuốc j đó
    function loaithuoc($idHealthFacility, $idMedicalStation, $idthuoc){
        $title = "Danh sách loại thuốc";
        // lay tên tram y tế
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // 
        $phanloai = DB::table('phanloaithuoc')->find($idthuoc);
        $tenphanloai =  $phanloai->tenloaithuoc;

        $loaithuoc = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->where('tenphanloai', $idthuoc)->get();
        return view('thuoc_vattu.phanloaithuoc.list_thuoctrongphanloai', [
            'title'=>$title,
            'loaithuoc'=>$loaithuoc,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'tenphanloai'=>$tenphanloai
            ]);
    }
}

<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachnhacungcapController extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách nhà cung cấp";
        $MedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_tram_y_te;
        $nhacungcap = DB::table('danhmucnhacungcap')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_nhacungcap', [
            'title'=>$title,
            'nhacungcap'=>$nhacungcap,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

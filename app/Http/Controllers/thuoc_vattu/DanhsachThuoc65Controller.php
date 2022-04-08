<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachThuoc65Controller extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách thuốc dưới 65 ngày";
        $MedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_tram_y_te;
        $medicine = DB::table('danhmucthuoc')->where('handung', '<', '66')->where('handung', '>', '35')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_thuoc65', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation

            ]);
    }
}

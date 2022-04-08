<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhsachThuoc125Controller extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách thuốc";
        $MedicalStation = DB::table('medical_stations')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_tram_y_te;
        // $tramyte = DB::select('select * from danhmucthuoc where handung = :id', ['id' => $id]);
        $medicine = DB::table('danhmucthuoc')->where('handung', '<', '126')->where('handung', '>', '95')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_thuoc125', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            
            ]);
    }
}

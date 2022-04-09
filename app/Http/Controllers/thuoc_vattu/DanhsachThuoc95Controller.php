<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhsachThuoc95Controller extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách thuốc";
        $MedicalStation = DB::table('health_facilities')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        // $tramyte = DB::select('select * from danhmucthuoc where handung = :id', ['id' => $id]);
        $medicine = DB::table('danhmucthuoc')->where('handung', '<', '96')->where('handung', '>', '65')->where('id_tramyte', $idHealthFacility)->get();
        return view('thuoc_vattu.detail.list_thuoc95', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

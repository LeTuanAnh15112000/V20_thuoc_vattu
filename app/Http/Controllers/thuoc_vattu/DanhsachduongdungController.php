<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachduongdungController extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $MedicalStation = DB::table('health_facilities')->find($idMedicalStation);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $title = "Danh sách đường dùng";
        $duongdung = DB::table('danhmucduongdung')->where('id_tramyte', $idHealthFacility)->get();
        return view('thuoc_vattu.detail.list_duongdung', [
            'title'=>$title,
            'duongdung'=>$duongdung,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

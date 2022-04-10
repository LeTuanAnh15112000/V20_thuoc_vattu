<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachnuocsanxuatController extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách nước sản xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $nuocsanxuat = DB::table('danhmucnuocsanxuat')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_nuocsanxuat', [
            'title'=>$title,
            'nuocsanxuat'=>$nuocsanxuat,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
}

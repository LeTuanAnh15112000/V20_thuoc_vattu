<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachhangsanxuatController extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $title = "Danh sách hãng sản xuất";
        $hangsanxuat = DB::table('danhmuchangsanxuat')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_hangsanxuat', [
            'title'=>$title,
            'hangsanxuat'=>$hangsanxuat,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation

            ]);
    }
}

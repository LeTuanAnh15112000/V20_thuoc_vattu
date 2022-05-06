<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhsachThuoc15Controller extends Controller
{
    //
    public function list($idHealthFacility, $idMedicalStation){
        $title = "Danh sách thuốc có hạn sử dụng dưới 15 ngày";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $medicine = DB::table('danhmucthuoc')->where('handung', '<', 15)->where('handung', '>', 7)->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.detail.list_thuoc15', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation

            ]);
    }
}

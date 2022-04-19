<?php

namespace App\Http\Controllers\Thuoc_vattu\xacnhan_xuatthuoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class XuatthuocController extends Controller
{
    //
    public function xemchitiet($idHealthFacility, $idMedicalStation){
        $title = "Thông tin chi tiết phiếu xuất thuốc";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $phieuxuatchitiet = DB::table('phieuxuatchitiet')->get();

        $phieuxuat = DB::table('phieuxuat')->where('trangthai',0)->get();
        return view('thuoc_vattu.statistical.xacnhan_xuatthuoc.xemchitiet', [
            'title'=>$title,
            'phieuxuatchitiet'=>$phieuxuatchitiet,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'phieuxuat'=>$phieuxuat
            ]);
    }
}

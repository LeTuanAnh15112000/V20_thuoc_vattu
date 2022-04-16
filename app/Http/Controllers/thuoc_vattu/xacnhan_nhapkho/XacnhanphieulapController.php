<?php

namespace App\Http\Controllers\Thuoc_vattu\xacnhan_nhapkho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class XacnhanphieulapController extends Controller
{
    //
    public function xemchitiet($idHealthFacility, $idMedicalStation){
        $title = "Thông tin chi tiết phiếu nhập thuốc";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')->get();

        $phieunhapthuoc = DB::table('phieunhapthuoc')->where('trangthai',0)->get();
        return view('thuoc_vattu.statistical.xacnhan_nhapthuoc.xemchitiet', [
            'title'=>$title,
            'phieunhapthuocchitiet'=>$phieunhapthuocchitiet,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'phieunhapthuoc'=>$phieunhapthuoc
            ]);
    }
    //  Thêm
    public function them($idHealthFacility, $idMedicalStation){
        // $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->where('handung', '<', 4)->delete();
        $thanhlythuoc = DB::table('phieunhapthuoc')->where('trangthai', '=', 0)->update(['trangthai' => 1]);
        return back();
    }
}

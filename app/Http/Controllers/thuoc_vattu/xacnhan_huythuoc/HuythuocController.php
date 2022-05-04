<?php

namespace App\Http\Controllers\thuoc_vattu\xacnhan_huythuoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HuythuocController extends Controller
{
    //đang trong quá trình test ở chức năng lây dữ liệu ra hàm if
    public function xemchitiet($idHealthFacility, $idMedicalStation){
        $title = "Thông tin chi tiết thuốc cần thanh lý";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $thanhlythuoc = DB::table('thanhlythuocthuochethan')->where('trangthai',0)->get();
        if(!isset($thanhlythuoc)){
            $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->where('handung', '<', 4)->get();
        }
        else{
            $medicine = [];
        }
        return view('thuoc_vattu.statistical.thanhly.xemchitiet', [
            'title'=>$title,
            'medicine'=>$medicine,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'thanhlythuoc'=>$thanhlythuoc
            ]);
    }
    
}

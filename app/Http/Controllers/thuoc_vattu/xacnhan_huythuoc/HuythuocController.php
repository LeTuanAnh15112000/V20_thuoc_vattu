<?php

namespace App\Http\Controllers\thuoc_vattu\xacnhan_huythuoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HuythuocController extends Controller
{
    //đang trong quá trình test ở chức năng lây dữ liệu ra hàm if
    public function xemchitiet($idHealthFacility, $idMedicalStation){
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $thanhlythuoc = DB::table('thanhlythuocthuochethan')->where('trangthai',0)->count();
        $laythongtin = DB::table('thanhlythuocthuochethan')->where('trangthai',0)->get();
        if($thanhlythuoc > 0){
        $title = "Thông tin chi tiết thuốc cần thanh lý";
            $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->where('handung', '<', 4)->get();
            return view('thuoc_vattu.statistical.thanhly.xemchitiet', [
                'title'=>$title,
                'medicine'=>$medicine,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'thanhlythuoc'=> $thanhlythuoc,
                'laythongtin'=> $laythongtin
                ]);
        }
        else{
            $medicine = [];
            $alert = 'success';
            $title = "Không có phiếu xác nhận";
            return view('thuoc_vattu.statistical.thanhly.thongbaokhongcophieu', [
                'title'=>$title,
                'medicine'=>$medicine,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'thanhlythuoc'=> $thanhlythuoc,
                'alert'=> $alert,
                'laythongtin'=> $laythongtin

                ]);
        }
        
    }
    
}

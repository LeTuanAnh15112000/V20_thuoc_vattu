<?php

namespace App\Http\Controllers\Thuoc_vattu\xacnhan_xuatthuoc;

use App\Http\Controllers\Controller;
use App\Models\Thuoc;
use App\Models\Thuoc_vattu\Phieuxuatchitiet;
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
        $dieukien = DB::table('phieuxuat')->where('trangthai',0)->count();
        if( $dieukien > 0){
            return view('thuoc_vattu.statistical.xacnhan_xuatthuoc.xemchitiet', [
                'title'=>$title,
                'phieuxuatchitiet'=>$phieuxuatchitiet,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'phieuxuat'=>$phieuxuat
                ]);
        }else{
            $alert = 'Không có phiếu xuất được gửi từ';
            return view('thuoc_vattu.statistical.xacnhan_xuatthuoc.khongcophieuxuat', [
                'title'=>$title,
                'phieuxuatchitiet'=>$phieuxuatchitiet,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'phieuxuat'=>$phieuxuat,
                'alert'=>$alert
                ]);
        }
      
    }
    public function duyetphieuxuat($idHealthFacility, $idMedicalStation){
        $phieuxuatchitiet = DB::table('phieuxuatchitiet')
        ->join('phieuxuat','phieuxuat.id','phieuxuatchitiet.sophieu')
        ->where('phieuxuat.trangthai',0)
        ->get();
        foreach($phieuxuatchitiet as $value)
        {
            $id_thuoc = DB::table('danhmucthuoc')
                        ->where('tenthuoc',$value->tenthuoc)
                        ->where('id_tramyte', 1)
                        ->where('soluong','<=',$value->soluong)
                        ->first()->id;
         
            $thuoc = Thuoc::find($id_thuoc);
            if($thuoc->soluong == $value->soluong)
            {
                $thuoc->delete();
            }
            else{
                $thuoc->soluong = $thuoc->soluong - $value->soluong;
                $thuoc->save();
            }
            
  
        }
        $phieuxuat = DB::table('phieuxuat')->where('trangthai', '=', 0)->update(['trangthai' => 1]);
        return back();
        
    }
}

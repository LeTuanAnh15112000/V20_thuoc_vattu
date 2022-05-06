<?php

namespace App\Http\Controllers\Thuoc_vattu\xacnhan_nhapkho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thuoc;
use Illuminate\Support\Facades\Auth;

class XacnhanphieulapController extends Controller
{
    //
    public function xemchitiet($idHealthFacility, $idMedicalStation){
        $title = "Thông tin chi tiết phiếu nhập thuốc";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
       // $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')->get();
       $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')
       ->join('phieunhapthuoc','phieunhapthuoc.id','phieunhapthuocchitiet.sophieu')
       ->where('phieunhapthuoc.trangthai',0)
       ->get();
       $diemphieu = DB::table('phieunhapthuocchitiet')
       ->join('phieunhapthuoc','phieunhapthuoc.id','phieunhapthuocchitiet.sophieu')
       ->where('phieunhapthuoc.trangthai',0)
       ->count();
       $phieunhapthuoc = DB::table('phieunhapthuoc')->where('trangthai',0)->get();
       if($diemphieu > 0){
        return view('thuoc_vattu.statistical.xacnhan_nhapthuoc.xemchitiet', [
            'title'=>$title,
            'phieunhapthuocchitiet'=>$phieunhapthuocchitiet,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'phieunhapthuoc'=>$phieunhapthuoc
            ]);
       }else{
        $alert = 'Không có phiếu nhập được gửi từ';
        return view('thuoc_vattu.statistical.xacnhan_nhapthuoc.khongcophieunhap', [
            'title'=>$title,
            'phieunhapthuocchitiet'=>$phieunhapthuocchitiet,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'phieunhapthuoc'=>$phieunhapthuoc,
            'nameMedicalStation'=> $nameMedicalStation,
            'alert'=>$alert
            ]);
       }
    }
    //nút duyệt phiếu Thêm
    public function them($idHealthFacility, $idMedicalStation){
        session()->flash('success', 'Xác nhận nhập thuốc thành công');
        $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')
        ->join('phieunhapthuoc','phieunhapthuoc.id','phieunhapthuocchitiet.sophieu')
        ->where('phieunhapthuoc.trangthai',0)
        ->get();
        foreach($phieunhapthuocchitiet as $value){
            $thuoc = new Thuoc();
            $thuoc->tenthuoc = $value->tenthuoc;
            $thuoc->soluong = $value->soluong;
            $thuoc->hamluong = $value->hamluong;
            $thuoc->dangtrinhbay = $value->dangtrinhbay;
            $thuoc->dangtebao = $value->dangtebao;
            $thuoc->donvi = $value->donvi;
            $thuoc->dongia = $value->dongia;
            $thuoc->hangsanxuat = $value->hangsanxuat;
            $thuoc->nuocsanxuat = $value->nuocsanxuat;
            $thuoc->handung = $value->handung;
            $thuoc->id_tramyte = Auth::user()->id;
            $thuoc->tenphanloai = $value->phanloai;
            $thuoc->save();
        }
        $phieunhapthuoc = DB::table('phieunhapthuoc')->where('trangthai', '=', 0)->update(['trangthai' => 1]);
        return redirect()->route('manager.thuoc_vattu.dashboard',
        ['idHealthFacility'=>$idHealthFacility,
         'idMedicalStation'=>$idMedicalStation
    ]);
    }
}

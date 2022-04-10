<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thuoc_vattu\Thanhlythuochethan;
use Illuminate\Support\Facades\Session;
class ThanhlyThuochethanController extends Controller
{
    // danh sách thuốc hết hạn
    public function list($idHealthFacility, $idMedicalStation){
        $title = 'Thanh lý thuốc hết hạn';
        $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte',$idMedicalStation )->where('handung', '<' , 10)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.thanhlythuoc.list_thanhlythuoc', 
        [
            'title'=>$title,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'tenthuoc'=>$tenthuoc
        ]);
    }


    // gui yeu cầu thanh lý đến trung tâm y tế
    public function guiyeucau($idHealthFacility, $idMedicalStation){
        $title = 'Gửi yêu cầu thanh lý thuốc hết hạn';
        $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte',$idMedicalStation )->where('handung', '<' , 10)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;

        return view('thuoc_vattu.thanhlythuoc.guiyeucau', 
        [
            'title'=>$title,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'tenthuoc'=>$tenthuoc
        ]);
    }

// them thông tin cần thanh lý vào co so dữ liệu
    public function themvaodanhsach(Request $request)
    {
       $this->validate($request,[
        'nguoilapphieu' => ['required'],
        'ngaylap' => ['required'],
        'sophieu' => ['required'],
        'ghichu' => ['required'],
       ],
       [
        'nguoilapphieu.required'=> 'Bạn chưa nhập tên người lập phiếu',
        'ngaylap.required'=> 'Bạn chưa chọn ngày nhập',
        'sophieu.required'=>'Bạn chưa nhập số phiếu',
        'ghichu.required'=>'Bạn chưa nhập ghi chú'
       ]
    );
    $thanhly = new Thanhlythuochethan();
    $thanhly->nguoilapphieu = $request->nguoilapphieu;
    $thanhly->sophieu = $request->sophieu;
    $thanhly->ngaylapphieu = $request->ngaylap;
    $thanhly->ghichu = $request->ghichu;
    $thanhly->trangthai = 0;
    $thanhly->save();
    Session::flash('success','Gửi yêu cầu thành công');
    return back();
    }
}

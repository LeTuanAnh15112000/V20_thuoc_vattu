<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thuoc_vattu\phieunhapthuoc;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Thuoc_vattu\PhieunhapthuocchitietExport;
use App\Imports\Thuoc_vattu\PhieunhapthuocchitietImport;
use App\Models\Thuoc_vattu\Phieunhapthuocchitiet;
class PhieulapController extends Controller
{
    //
    public function lapphieu($idHealthFacility, $idMedicalStation){
        $title = 'Lập phiếu nhập kho';
        $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $nguonnhap = DB::table('danhmucnguon')->get();
        return view('thuoc_vattu.quanlynhap.lapphieu', 
        [
            'title'=>$title,
             'nguonnhap'=>$nguonnhap,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'tenthuoc'=>$tenthuoc
        ]);
    }
    public function themlapphieu(Request $request)
    {
       $this->validate($request,[
        'nguonnhap' => ['required'],
        'nguoilapphieu' => ['required'],
        'ngaynhap' => ['required'],
        'sophieu' => ['required'],
        'soluongyeucau' => ['required'],
        'ghichu' => ['required'],
       ],
       [
        'nguonnhap.required'=>'Bạn chưa chọn nguồn nhập',
        'nguoilapphieu.required'=> 'Bạn chưa nhập tên người lập phiếu',
        'ngaynhap.required'=> 'Bạn chưa chọn ngày nhập',
        'sophieu.required'=>'Bạn chưa nhập số phiếu',
        'soluongyeucau.required'=>'Bạn chưa nhập số lượng yêu cầu',
        'ghichu.required'=>'Bạn chưa nhập ghi chú'
       ]
    );

       $phieulap = new phieunhapthuoc();
       $phieulap->sophieu = $request->sophieu;
       $phieulap->nguoilapphieu = $request->nguoilapphieu;
       $phieulap->tenthuoc = $request->tenthuoc;
       $phieulap->handung = $request->handung;
       $phieulap->trangthai = 0;
       $phieulap->tennguon = $request->tennguon;
       $phieulap->soluong = $request->soluong;
       $phieulap->ghichu = $request->ghichu;
       $phieulap->ngaynhap = $request->ngaynhap;
       $phieulap->save();
       Session::flash('success','Lập phiếu thành công');
       return back();

    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new PhieunhapthuocchitietImport, $path);
        return back();

    }

    
    public function export_csv(){
        return Excel::download(new PhieunhapthuocchitietExport , 'danhsachnhapkho.xlsx');
    }

}

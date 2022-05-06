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
        $title = 'Thông tin phiếu lập chi tiết';
        // $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $sophieu = DB::table('Phieunhapthuocchitiet')->get();
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $nguonnhap = DB::table('danhmucnguon')->get();
        return view('thuoc_vattu.quanlynhap.lapphieu', 
        [
            'title'=>$title,
             'nguonnhap'=>$nguonnhap,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'sophieu'=>$sophieu
        ]);
    }
    public function themlapphieu(Request $request,$idHealthFacility, $idMedicalStation)
    {
       $this->validate($request,[
        'ngaynhap' => ['required'],
        'sophieu' => ['required'],
        'nguoilap' => ['required'],
        'nguonnhap' => ['required'],
        'ghichu' => ['required'],
       ],
       [
        'nguonnhap.required'=>'Bạn chưa chọn nguồn nhập',
        'nguoilap.required'=> 'Bạn chưa nhập tên người lập phiếu',
        'ngaynhap.required'=> 'Bạn chưa chọn ngày nhập',
        'sophieu.required'=>'Bạn chưa nhập số phiếu',
        'ghichu.required'=>'Bạn chưa nhập ghi chú'
       ]
      );

       $phieulap = new phieunhapthuoc();
       $phieulap->sophieu = $request->sophieu;
       $phieulap->ngaynhap = $request->ngaynhap;
       $phieulap->nguoilap = $request->nguoilap;
       $phieulap->nguonnhap = $request->nguonnhap;
       $phieulap->trangthai = 0;
       $phieulap->ghichu = $request->ghichu;
       $phieulap->save();
       return  redirect()->route('manager.thuoc_vattu.danhsachthuoccannhap',
       ['idHealthFacility'=>$idHealthFacility,
        'idMedicalStation'=>$idMedicalStation
       ]
        );
    }

    public function danhsachthuoccannhap($idHealthFacility, $idMedicalStation)
    {
        $title = 'Import danh sách thuốc cần nhập';
        // $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $sophieu = DB::table('Phieunhapthuocchitiet')->get();
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $nguonnhap = DB::table('danhmucnguon')->get();
        return view('thuoc_vattu.quanlynhap.listthuocnhap', 
        [
            'title'=>$title,
             'nguonnhap'=>$nguonnhap,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'sophieu'=>$sophieu
        ]);
    }
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new PhieunhapthuocchitietImport, $path);
        session()->flash('success', 'Gửi yêu cầu nhập thuốc thành công');
        return back();
    }

    
    public function export_csv(){
        return Excel::download(new PhieunhapthuocchitietExport , 'danhsachnhapkho.xlsx');
    }

}

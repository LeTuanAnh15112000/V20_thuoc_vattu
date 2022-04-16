<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Thuoc_vattu\PhieuxuatchitietExport;
use App\Imports\Thuoc_vattu\PhieuxuatchitietImport;
use App\Models\Thuoc_vattu\phieuxuatthuoc;

class PhieuxuatController extends Controller
{
    public function lapphieu($idHealthFacility, $idMedicalStation){
        $title = 'Lập phiếu xuất';
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.quanlyxuat.lapphieu', 
        [
            'title'=>$title,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
        ]);
    }
    public function themlapphieu(Request $request)
    {
       $this->validate($request,[
        'nguoilap' => ['required'],
        'ngayxuat' => ['required'],
        'sophieu' => ['required'],
        'ghichu' => ['required'],
       ],
       [
        'nguoilap.required'=> 'Bạn chưa nhập tên người lập phiếu',
        'ngayxuat.required'=> 'Bạn chưa chọn ngày xuất',
        'sophieu.required'=>'Bạn chưa nhập số phiếu',
        'ghichu.required'=>'Bạn chưa nhập ghi chú'
       ]
    );

       $phieulap = new phieuxuatthuoc();
       $phieulap->sophieu = $request->sophieu;
       $phieulap->ngayxuat = $request->ngayxuat;
       $phieulap->nguoilap = $request->nguoilap;
       $phieulap->trangthai = 0;
       $phieulap->ghichu = $request->ghichu;
       $phieulap->save();
       Session::flash('success','Lập phiếu thành công');
       return back();

    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new PhieuxuatchitietImport, $path);
        return back();
    }

    
    public function export_csv(){
        return Excel::download(new PhieuxuatchitietExport , 'danhsachxuat.xlsx');
    }

    
}

<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuxuatController extends Controller
{
    //
    public function lapphieu($idHealthFacility, $idMedicalStation){
        $title = 'Lập phiếu nhập kho';
        $tenthuoc = DB::table('danhmucthuoc')->where('id_tramyte',$idMedicalStation)->get();
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $nguonnhap = DB::table('danhmucnguon')->get();
        return view('thuoc_vattu.quanlyxuat.lapphieu', 
        [
            'title'=>$title,
             'nguonnhap'=>$nguonnhap,
             'idMedicalStation'=> $idMedicalStation,
             'idHealthFacility'=> $idHealthFacility,
             'nameMedicalStation'=> $nameMedicalStation,
             'tenthuoc'=>$tenthuoc
        ]);
    }

    
}

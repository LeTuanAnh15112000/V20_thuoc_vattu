<?php

namespace App\Http\Controllers\thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ThanhlyThuochethanController extends Controller
{
    // danh sách thuốc hết hạn
    public function list($idHealthFacility, $idMedicalStation){
        $title = 'Thanh lý thuốc hết hạn';
        $tenthuoc = DB::table('danhmucthuoc')->where('handung', '<' , 10)->get();
        $MedicalStation = DB::table('health_facilities')->find($idMedicalStation);
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
}

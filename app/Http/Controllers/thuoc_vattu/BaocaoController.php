<?php

namespace App\Http\Controllers\Thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaocaoController extends Controller
{
    // biên bản kiểm nhập
    public function baocaonhap($idHealthFacility, $idMedicalStation){
        $title = "Báo cáo nhập";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;

        $duongdung = DB::table('danhmucduongdung')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.baocaonhap.baocaonhap', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }

    public function inbaocaonhap($idHealthFacility, $idMedicalStation){
        $title = "In báo cáo nhập";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.baocaonhap.inbaocao', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }


    // Biên bản kiểm xuất

    public function baocaoxuat($idHealthFacility, $idMedicalStation){
        $title = "Báo cáo xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;

        $duongdung = DB::table('danhmucduongdung')->where('id_tramyte', $idMedicalStation)->get();
        return view('thuoc_vattu.baocaoxuat.baocaoxuat', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }

    public function inbaocaoxuat($idHealthFacility, $idMedicalStation){
        $title = "In báo cáo xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.baocaoxuat.inbaocaoxuat', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }

    // In báo cáo kiểm kê

    public function baocaokiemke($idHealthFacility, $idMedicalStation){
        $title = "Báo cáo kiểm kê";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;

        $medicial = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $vattu = DB::table('danhmucvattu')->where('id_tramyte', $idMedicalStation)->get();

        $location = DB::table('vitritramyte')->find($idMedicalStation);
        $diachi = $location->diachi;
        return view('thuoc_vattu.baocaokiemke.baocaokiemke', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'medicial'=> $medicial,
            'vattu'=> $vattu,
            'diachi'=> $diachi
            ]);
    }

    public function inbaocaokiemke($idHealthFacility, $idMedicalStation){
        $title = "In báo cáo kiểm kê";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $medicial = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->get();
        $vattu = DB::table('danhmucvattu')->where('id_tramyte', $idMedicalStation)->get();

        $location = DB::table('vitritramyte')->find($idMedicalStation);
        $diachi = $location->diachi;

        return view('thuoc_vattu.baocaokiemke.inbaocaokiemke', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'medicial'=> $medicial,
            'vattu'=> $vattu,
            'diachi'=> $diachi
            ]);
    }
}

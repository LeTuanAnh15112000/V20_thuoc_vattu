<?php

namespace App\Http\Controllers\Thuoc_vattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class BaocaoController extends Controller
{

    // biên bản kiểm nhập
    public function baocaonhap($idHealthFacility, $idMedicalStation){
        $title = "Báo cáo nhập";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.baocaonhap.quanlynhap', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }

    // lấy danh sách thuốc nhập
    public function laybaocaonhap($idHealthFacility, $idMedicalStation, Request $request){
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $ngaybatdau = $request->ngaybatdau;
        $ngayketthuc = $request->ngayketthuc;
        $thongtinnguoinhapthuoc = DB::table('phieunhapthuoc')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();

        $dieukien1 = DB::table('phieunhapthuoc')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->count();
        $dieukien2 = DB::table('phieunhapthuocchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->count();

        if( $dieukien1 > 0 && $dieukien2 >0)
        {
            $title = "Lấy danh sách nhập thuốc";
            return view('thuoc_vattu.baocaonhap.baocaonhap', [
                'title'=>$title,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'ngaybatdau'=> $ngaybatdau,
                'ngayketthuc'=> $ngayketthuc,
                'thongtinnguoinhapthuoc'=> $thongtinnguoinhapthuoc,
                'phieunhapthuocchitiet'=> $phieunhapthuocchitiet,
                ]);
        }else{

            $title = "không có danh sách nhập thuốc";
            session()->flash('success', 'Không có dữ liệu trong khoảng thời gian được chọn vui lòng chọn lại thời gian');
            return view('thuoc_vattu.baocaonhap.khongcobaocaonhap', [
                'title'=>$title,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                ]);
        }
    }


    public function inbaocaonhap($idHealthFacility, $idMedicalStation, $ngaybatdau,  $ngayketthuc){
        $title = "In báo cáo kiểm nhập";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $thongtinnguoinhapthuoc = DB::table('phieunhapthuoc')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        $phieunhapthuocchitiet = DB::table('phieunhapthuocchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        return view('thuoc_vattu.baocaonhap.inbaocaokiemnhap', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'ngaybatdau'=> $ngaybatdau,
            'nameMedicalStation'=> $nameMedicalStation,
            'ngayketthuc'=> $ngayketthuc,
            'thongtinnguoinhapthuoc'=> $thongtinnguoinhapthuoc,
            'phieunhapthuocchitiet'=> $phieunhapthuocchitiet,
            ]);
    }


    // Biên bản kiểm xuất

    public function baocaoxuat($idHealthFacility, $idMedicalStation){
        $title = "Báo cáo xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        return view('thuoc_vattu.baocaoxuat.quanlyxuat', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation
            ]);
    }
    public function laybaocaoxuat($idHealthFacility, $idMedicalStation, Request $request){
        $title = "Lấy danh sách thuốc cần xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $ngaybatdau = $request->ngaybatdau;
        $ngayketthuc = $request->ngayketthuc;
        $thongtinnguoilapphieuxuat = DB::table('phieuxuat')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        $phieuxuatthuocchitiet = DB::table('phieuxuatchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();

        $dieukien1 = DB::table('phieuxuat')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->count();
        $dieukien2 = DB::table('phieuxuatchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->count();
        if( $dieukien1 > 0 && $dieukien2 > 0)
        {
            $title = "Lấy danh sách thuốc cần xuất";
            return view('thuoc_vattu.baocaoxuat.baocaoxuat', [
                'title'=>$title,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                'ngaybatdau'=> $ngaybatdau,
                'ngayketthuc'=> $ngayketthuc,
                'thongtinnguoilapphieuxuat'=> $thongtinnguoilapphieuxuat,
                'phieuxuatthuocchitiet'=> $phieuxuatthuocchitiet,
                ]);
        }else{

            $title = "không có danh sách thuốc cần xuất";
            session()->flash('success', 'Không có dữ liệu trong khoảng thời gian được chọn vui lòng chọn lại thời gian');
            return view('thuoc_vattu.baocaoxuat.khongcobaocaoxuat', [
                'title'=>$title,
                'idMedicalStation'=> $idMedicalStation,
                'idHealthFacility'=> $idHealthFacility,
                'nameMedicalStation'=> $nameMedicalStation,
                ]);
        }
       
    }

    public function inbaocaoxuat($idHealthFacility, $idMedicalStation, $ngaybatdau, $ngayketthuc){
        $title = "In báo cáo xuất";
        $MedicalStation = DB::table('health_facilities')->find($idHealthFacility);
        $nameMedicalStation = $MedicalStation->ten_co_so_y_te;
        $thongtinnguoilapphieuxuat = DB::table('phieuxuat')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        $phieuxuatthuocchitiet = DB::table('phieuxuatchitiet')->where('created_at', '>', $ngaybatdau)->where('created_at', '<', $ngayketthuc)->get();
        return view('thuoc_vattu.baocaoxuat.inbaocaoxuat', [
            'title'=>$title,
            'idMedicalStation'=> $idMedicalStation,
            'idHealthFacility'=> $idHealthFacility,
            'nameMedicalStation'=> $nameMedicalStation,
            'ngaybatdau'=> $ngaybatdau,
            'ngayketthuc'=> $ngayketthuc,
            'thongtinnguoilapphieuxuat'=> $thongtinnguoilapphieuxuat,
            'phieuxuatthuocchitiet'=> $phieuxuatthuocchitiet,
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

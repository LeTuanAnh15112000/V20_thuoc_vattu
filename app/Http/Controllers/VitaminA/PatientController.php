<?php

namespace App\Http\Controllers\VitaminA;

use App\Exports\VitaminA\PatientExport;
use App\Http\Controllers\Controller;
use App\Models\AffiliatedArea;
use App\Models\Carer;
use App\Models\Country;
use App\Models\Ethnic;
use App\Models\HealthFacility;
use App\Models\VitaminA\Patient;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\Json;


class PatientController extends Controller
{
    /* Danh sách bệnh nhân */
    function index($idMedicalStation, $idHealthFacility){
        $patientsByHealthFacility = Patient::where('id_health_facility', $idHealthFacility)->get();
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        $ethnics = Ethnic::all();
        $countries = Country::select('ten_quoc_tich')->get();
        return view('vitamin_a.home.patient.index',[
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById,
            'patients'=>$patientsByHealthFacility,
            'ethnics'=>$ethnics,
            'countries'=>$countries
        ]);
    }


    /* Ajax Phân loại bệnh nhân */
    function typePatient($typePatient){
        switch ($typePatient) {
            case 1:
                return '<p>0-6 tháng không được bú sữa mẹ</p>';
                break;
            case 2:
                return '<p>Trẻ 24-60 tháng</p>';
                break;
            case 3:
                return '<p>Trẻ 6-60 tháng</p>';
                break;
            case 4:
                return '<p>Mẹ bỉm sữa sau sinh <= 1 tháng</p>';
                break;
        }
    }

    /* Ajax Check null mã định danh V20 */
    function checkNullV20($v20Patient){
        if (isset($v20Patient))
            return $v20Patient;
        else
            return 'không có';
    }

    /* Ajax Phân loại giới tính */
    function gioiTinh($gioiTinhBenhNhan){
        switch ($gioiTinhBenhNhan) {
            case 1:
                return 'Nam';
                break;
            case 2:
                return 'Nữ';
                break;
            case 3:
                return 'Khác';
                break;
        }
    }

    /* Ajax Check null đơn vị công tác */
    function checkNullDVCT($dvctPatient){
        if (isset($dvctPatient))
            return $dvctPatient;
        else
            return 'không có';
    }

    /* Ajax danh sach bệnh nhân */
    function getPatients($idHealthFacility){
        $patients = Patient::where('id_health_facility', $idHealthFacility)->get();
        $output = '';
        $i = 1;
        foreach ($patients as $patient) {
            $output .= '
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="check'.$patient->id .'">
                            <label for="check'.$patient->id .'" class="custom-control-label"></label>
                        </div>
                    </td>
                    <td>'. $i++ .'</td>
                    <td>'. $patient->ho_va_ten .'</td>
                    <td>'.$this->typePatient($patient->loai_benh_nhan).'</td>

                    <td>'. $patient->tt_dia_chi . ' ('.$patient->tt_ma_tinh . '-' . $patient->tt_ma_huyen . '-' . $patient->tt_ma_xa . ')' .'</td>
                    <td>
                        <button type="button" class="btn btn-primary text-uppercase"
                            data-toggle="modal" data-target="#detail' . $patient->id .'">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        <div class="modal fade" id="detail' . $patient->id .'">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-uppercase"
                                            id="staticBackdropLabel"><b>thông tin chi tiết</b></h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <p><b>Mã định danh V20: </b>'. $patient->ma_dinh_danh_v20 .'</p>
                                                <p><b>Ngày sinh: </b>'. $patient->ngay_sinh .'</p>
                                                <p><b>Giới tính: </b>'.$this->gioiTinh($patient->gioi_tinh).'</p>
                                                <p><b>Địa chỉ hộ khẩu: </b>'. $patient->hk_dia_chi . ' ('.$patient->hk_ma_tinh . '-' . $patient->hk_ma_huyen . '-' . $patient->hk_ma_xa . ')' .'</p>
                                                <p><b>Dân tộc: </b>'. $patient->getEthnicById($patient->id_ethnic)->ten_dan_toc .'</p>
                                                <p><b>Số điện thoại: </b>'. $patient->sdt .'</p>
                                                <p><b>CMND: </b>'. $patient->cmnd .'</p>
                                                <p><b>Email: </b>'. $patient->email .'</p>
                                                <p><b>Mã hộ gia đình: </b>'. $patient->ma_hgd .'</p>
                                                <p><b>Đơn vị công tác: </b>'. $patient->don_vi_cong_tac .'</p>
                                                <p><b>Quốc tịch: </b>'. $patient->quoc_tich .'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-primary btnFormEdit" id-patient="'. $patient->id .'">Sửa</a>
                        <a class="btn btn-primary btnDelete" id-patient="'. $patient->id .'">Xóa</a>
                    </td>
                </tr> 
            ';
        }
        return response()->json(['status'=>200, 'output'=>$output]);
    }

    /* Phân loại bệnh nhân từ ngày sinh */
    function patientClassification($ngaySinh){
        $today = Carbon::today('Asia/Ho_Chi_Minh')->toDateString();
        $dateOfBirthPatient = Carbon::parse($ngaySinh)->diffInMonths($today);
        
        if($dateOfBirthPatient >= 0 && $dateOfBirthPatient <= 6){
            return 1;
        }elseif($dateOfBirthPatient >= 24 && $dateOfBirthPatient <= 60){
            return 2;
        }elseif($dateOfBirthPatient >= 6 && $dateOfBirthPatient <= 60){
            return 3;
        }
    }

    /* Xử lí thêm bệnh nhân */
    function addPatient(Request $request){
        // cmndMSS: null
        // cmndNCS: null
        // danToc: null
        // dvctMSS: null
        // emailMSS: null
        // emailNCS: null
        // gioiTinh: "0"
        // hoTen: null
        // maDinhDanhV20: null
        // maHGD: null
        // ngaySinh: null
        // ngaySinhNCS: null
        // quanHeNCS: null
        // quocTich: null
        // sdtMSS: null
        // sdtNCS: null
        // soNhaHK: null
        // soNhaTT: null
        // tenNCS: null
        // tinhHK: null
        // tinhTT: null
        
        // $validator = Validator::make($request->all(),[
        //     'hoTen'=>'required',
        //     'ngaySinh'=>'required',
        //     'gioiTinh'=>'required',
        //     'tinhHK'=>'required',
        //     'huyenHK'=>'required',
        //     'xaHK'=>'required',
        //     'soNhaHK'=>'required',
        //     'tinhTT'=>'required',
        //     'huyenTT'=>'required',
        //     'xaTT'=>'required',
        //     'soNhaTT'=>'required',
        //     'danToc'=>'required',
        //     'maHGD'=>'required',
        //     'quocTich'=>'required',
        //     'tenNCS'=>'required',
        //     'ngaySinhNCS'=>'required',
        //     'cmndNCS'=>'required',
        //     'sdtNCS'=>'required',
        //     'emailNCS'=>'required',
        //     'quanHeNCS'=>'required'
        // ],[
        //     'required'=>'Bạn không được bỏ trống trường này!',
        // ]);

        // $validatorMSS = Validator::make($request->all(),[
        //     'hoTen'=>'required',
        //     'ngaySinh'=>'required',
        //     'gioiTinh'=>'required',
        //     'tinhHK'=>'required',
        //     'huyenHK'=>'required',
        //     'xaHK'=>'required',
        //     'soNhaHK'=>'required',
        //     'tinhTT'=>'required',
        //     'huyenTT'=>'required',
        //     'xaTT'=>'required',
        //     'soNhaTT'=>'required',
        //     'danToc'=>'required',
        //     'maHGD'=>'required',
        //     'quocTich'=>'required',
        //     'cmndMSS'=>'required',
        //     'sdtMSS'=>'required',
        //     'emailMSS'=>'required',
        //     'dvctMSS'=>'required',
        // ],[
        //     'required'=>'Bạn không được bỏ trống trường này!',
        // ]);

        
        $hoKhau = Json::decode($request->hoKhau);
        $thuongTru = Json::decode($request->thuongTru);
        $patient = new Patient;
        $patient->id_health_facility = $request->idHealthFacility;
        $patient->ho_va_ten = $request->hoTen;
        $patient->ma_dinh_danh_v20 = $request->maDinhDanhV20;
        $patient->ngay_sinh = $request->ngaySinh;
        $patient->gioi_tinh = $request->gioiTinh;
        $patient->hk_ma_tinh = $hoKhau->provice->code;
        $patient->hk_ma_huyen = $hoKhau->district->code;
        $patient->hk_ma_xa = $hoKhau->ward->code;
        $diaChiHoKhau = $request->soNhaHK . ', ' . $hoKhau->ward->name . ', ' . $hoKhau->district->name . ', ' . $hoKhau->provice->name;
        $patient->hk_dia_chi = $diaChiHoKhau;
        $patient->tt_ma_tinh = $thuongTru->provice->code;
        $patient->tt_ma_huyen = $thuongTru->district->code;
        $patient->tt_ma_xa = $thuongTru->ward->code;
        $diaChiThuongTru = $request->soNhaTT. ', ' . $thuongTru->ward->name . ', ' . $thuongTru->district->name . ', ' . $thuongTru->provice->name;
        $patient->tt_dia_chi = $diaChiThuongTru;
        $patient->id_ethnic = $request->danToc;
        $patient->ma_hgd = $request->maHGD;
        $patient->quoc_tich = $request->quocTich;

        if (isset($request->mSS)) {
            $patient->loai_benh_nhan = 4;
            $patient->cmnd = $request->cmndMSS;
            $patient->sdt = $request->sdtMSS;
            $patient->email = $request->emailMSS;
            $patient->don_vi_cong_tac = $request->dvctMSS;
            $patient->save();
        }else{
            $patient->loai_benh_nhan = $this->patientClassification($request->ngaySinh);
            $patient->save();
            $carer = new Carer;
            $carer->id_health_facility = $request->idHealthFacility;
            $carer->id_patient = $patient->id;
            $carer->ten_ncs = $request->tenNCS;
            $carer->nam_sinh_ncs = $request->ngaySinhNCS;
            $carer->sdt_ncs = $request->sdtNCS;
            $carer->email_ncs = $request->emailNCS;
            $carer->cmnd_ncs = $request->cmndNCS;
            $carer->quan_he_voi_benh_nhan = $request->quanHeNCS;
            $carer->save();
        }
        return response()->json([
            'status'=>200,
            'msgSuccess'=>'Đã thêm thành công bệnh nhân ' . $request->hoTen
        ]);
    }

     /* Hiển thị thông tin theo ID bệnh nhân để cập nhật */
    function showEditPatient($idMedicalStation, $idHealthFacility, $idPatient){
        $patientById = Patient::find($idPatient);
        $carerByIdPatient = Carer::where('id_patient',$idPatient)->first();
        $healthFacilityById = HealthFacility::find($idHealthFacility);
        $ethnics = Ethnic::all();
        $countries = Country::all();
        return view('vitamin_a.home.patient.edit',[
            'idMedicalStation'=>$idMedicalStation,
            'healthFacilityById'=>$healthFacilityById,
            'ethnics'=>$ethnics,
            'countries'=>$countries,
            'patientById'=>$patientById,
            'carerByIdPatient'=>$carerByIdPatient,
        ]);
    }

    /* Update bệnh nhân */
    function editPatient(Request $request){
        // return response()->json($request->all());

        $patientById = Patient::find($request->editIdPatient);
        $patientById->id_health_facility = $request->editIdHealthFacility;
        $patientById->ma_dinh_danh_v20 = $request->editMaDinhDanhV20;
        $patientById->ho_va_ten = $request->editHoTen;
        $patientById->ngay_sinh = $request->editNgaySinh;
        $patientById->gioi_tinh = $request->editGioiTinh;
        $patientById->id_ethnic = $request->editDanToc;
        $patientById->ma_hgd = $request->editMaHGD;
        $patientById->quoc_tich = $request->editQuocTich;
        if(isset($request->editHoKhauMoi)){
            $newHoKhau = Json::decode($request->editHoKhauMoi);
            $patientById->hk_ma_tinh = $newHoKhau->provice->code;
            $patientById->hk_ma_huyen = $newHoKhau->district->code;
            $patientById->hk_ma_xa = $newHoKhau->ward->code;
            $patientById->hk_dia_chi = $request->editSoNhaHK . ',' . $newHoKhau->ward->name . ',' . $newHoKhau->district->name . ',' . $newHoKhau->provice->name;
        }else{
            $maHoKhau = Json::decode($request->editMaHoKhauCu);
            $patientById->hk_ma_tinh = $maHoKhau->tinhHK;
            $patientById->hk_ma_huyen = $maHoKhau->huyenHK;
            $patientById->hk_ma_xa = $maHoKhau->xaHK;
            $patientById->hk_dia_chi = $request->editDiaChiHoKhauCu;
        }

        if(isset($request->editThuongTruMoi)){
            $newThuongTru = Json::decode($request->editThuongTruMoi);
            $patientById->tt_ma_tinh = $newThuongTru->provice->code;
            $patientById->tt_ma_huyen = $newThuongTru->district->code;
            $patientById->tt_ma_xa = $newThuongTru->ward->code;
            $patientById->tt_dia_chi = $request->editSoNhaHK . ',' . $newThuongTru->ward->name . ',' . $newThuongTru->district->name . ',' . $newThuongTru->provice->name;
        }else{
            $maThuongTru = Json::decode($request->editMaThuongTruCu);
            $patientById->tt_ma_tinh = $maThuongTru->tinhTT;
            $patientById->tt_ma_huyen = $maThuongTru->huyenTT;
            $patientById->tt_ma_xa = $maThuongTru->xaTT;
            $patientById->tt_dia_chi = $request->editDiaChiThuongTruCu;
        }

        if(isset($request->cbMSS) && $request->cbMSS == 'on'){
            $patientById->sdt = $request->editSDTMSS;
            $patientById->cmnd = $request->editCMNDMSS;
            $patientById->email = $request->editEmailMSS;
            $patientById->don_vi_cong_tac = $request->editDVCTMSS;
            $patientById->loai_benh_nhan = 4;
        }else{
            $patientById->loai_benh_nhan = $this->patientClassification($request->editNgaySinh);
            $carerByIdPatient = Carer::where('id_patient', $request->editIdPatient)->first();
            $carerByIdPatient->ten_ncs = $request->editTenNCS;
            $carerByIdPatient->nam_sinh_ncs = $request->editNgaySinhNCS;
            $carerByIdPatient->sdt_ncs = $request->editSDTNCS;
            $carerByIdPatient->email_ncs = $request->editEmailNCS;
            $carerByIdPatient->cmnd_ncs = $request->editCMNDNCS;
            $carerByIdPatient->quan_he_voi_benh_nhan = $request->editQuanHeNCS;
            $carerByIdPatient->save();
        }
        $patientById->save();
        return response()->json(['status'=>200, 'msgSuccess'=>'Cập nhật thành công!']);
    }


    /* Search ajax */
    function searchPatient(Request $request){
        $patients = Patient::where('id_health_facility', $request->idHealthFacility)
        ->where('ho_va_ten', 'like','%'.$request->searchKey.'%')
        ->get();

        $output = '';
        $i = 1;
        foreach ($patients as $patient) {
            $output .= '
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="check'.$patient->id .'">
                            <label for="check'.$patient->id .'" class="custom-control-label"></label>
                        </div>
                    </td>
                    <td>'. $i++ .'</td>
                    <td>'. $patient->ho_va_ten .'</td>
                    <td>'.$this->typePatient($patient->loai_benh_nhan).'</td>

                    <td>'. $patient->tt_dia_chi . ' ('.$patient->tt_ma_tinh . '-' . $patient->tt_ma_huyen . '-' . $patient->tt_ma_xa . ')' .'</td>
                    <td>
                        <button type="button" class="btn btn-primary text-uppercase"
                            data-toggle="modal" data-target="#detail' . $patient->id .'">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        <div class="modal fade" id="detail' . $patient->id .'">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-uppercase"
                                            id="staticBackdropLabel"><b>thông tin chi tiết</b></h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <p><b>Mã định danh V20: </b>'. $patient->ma_dinh_danh_v20 .'</p>
                                                <p><b>Ngày sinh: </b>'. $patient->ngay_sinh .'</p>
                                                <p><b>Giới tính: </b>'.$this->gioiTinh($patient->gioi_tinh).'</p>
                                                <p><b>Địa chỉ hộ khẩu: </b>'. $patient->hk_dia_chi . ' ('.$patient->hk_ma_tinh . '-' . $patient->hk_ma_huyen . '-' . $patient->hk_ma_xa . ')' .'</p>
                                                <p><b>Dân tộc: </b>'. $patient->getEthnicById($patient->id_ethnic)->ten_dan_toc .'</p>
                                                <p><b>Số điện thoại: </b>'. $patient->sdt .'</p>
                                                <p><b>CMND: </b>'. $patient->cmnd .'</p>
                                                <p><b>Email: </b>'. $patient->email .'</p>
                                                <p><b>Mã hộ gia đình: </b>'. $patient->ma_hgd .'</p>
                                                <p><b>Đơn vị công tác: </b>'. $patient->don_vi_cong_tac .'</p>
                                                <p><b>Quốc tịch: </b>'. $patient->quoc_tich .'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-primary btnFormEdit" id-patient="'. $patient->id .'">Sửa</a>
                        <a class="btn btn-primary btnDelete" id-patient="'. $patient->id .'">Xóa</a>
                    </td>
                </tr> 
            ';
        }
        return response()->json(['status'=>200, 'output'=>$output]);
    }

    function getPatientById(Request $request){
        $patientById = Patient::find($request->idPatient);
        $carerByIdPatient = Carer::where('id_patient',$request->idPatient)->first();
        
        return response()->json([
            'patientById'=>$patientById,
            'carerByIdPatient'=>$carerByIdPatient
        ]);
    }

    /* Xử lí xóa bệnh nhân và người chăm sóc*/
    function deletePatient($idPatient){
        $carerByIdPatient = Carer::where('id_patient', $idPatient)->first();
        Carer::destroy($carerByIdPatient->id);
        Patient::destroy($idPatient);
        return response()->json(['status'=>200, 'msgSuccess'=>'Xóa thành công!']);
    }

    /* Lấy file excel import */
    function getFileExcelImport(){
        $file = storage_path(). "/app/public/simple/VitaminA/Patients.xlsx";
        return response()->download($file, 'BenhNhan_FileMau.xlsx');
    }

    function getFileExcelExport(){
        return Excel::download(new PatientExport, 'BenhNhan.xlsx');
    }

    // function getFilePDFExport(){
    //     return (new PatientExport)->download('BenhNhan.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    // }

    /* Import excel */
    function importExcelPatient(Request $request){
        return response()->json($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /* Lấy tất cả danh sách */
    function index(){
        $users = User::select('id','id_cadres','email','anh_dai_dien','trang_thai')->get();
        return view('user.index', ['users'=>$users]);
    }


    /* Ajax */
    /* Role */
    public function getRole($user){
        if ($user->hasRole('admin'))
            return '<span class="badge bg-primary text-capitalize">Quản trị viên</span>';
        elseif ($user->hasRole('department_of_health'))
            return '<span class="badge bg-info text-black text-capitalize">sở y tế</span>';
        elseif($user->hasRole('medical_center'))
            return '<span class="badge bg-warning text-capitalize">trung tâm y tế</span>';
        elseif ($user->hasRole('medical_station'))
            return '<span class="badge bg-secondary text-capitalize">trạm y tế</span>';
    }

    /* Ảnh đại diện */
    function getAnhDaiDien($user){
        if (file_exists(public_path() . '/images/user/' . $user->anh_dai_dien)){
            return '<img src="'.asset('images/user/' . $user->anh_dai_dien).'" style="height: 300px; width: 300px" class="rounded mx-auto d-block" alt="'.$user->anh_dai_dien.'">';
        }else
            return '<i class="fas fa-user-tie fa-3x"></i>';
    }

    /* Chức vụ và đơn vị trực thuộc */
    function getPositionAndWorkUnit($user){
        $resultPosition = '';
        $resultWorkUnit = '';

        if ($user->positionByCadres($user->cadresByUser($user->id)->id_position) != null)
            $resultPosition = $user->positionByCadres($user->cadresByUser($user->id)->id_position)->ten_chuc_vu;
        else
            $resultPosition = 'không có';

        if ($user->workUnitByCadres($user->cadresByUser($user->id)->id_work_unit) != null)
            $resultWorkUnit = '('.$user->workUnitByCadres($user->cadresByUser($user->id)->id_work_unit)->ten_dvct .')';

        return ['resultPosition'=>$resultPosition, 'resultWorkUnit'=>$resultWorkUnit];
    }

    /* Chức danh */
    function getTitle($user){
        if ($user->titleByCadres($user->cadresByUser($user->id)->id_title) != null)
            return $user->titleByCadres($user->cadresByUser($user->id)->id_title)->ten_chuc_danh;
        else
            return 'không có';
    }

    /* Chuyên ngành chính */
    function getSpecialized($user){
        if ($user->specializedByCadres($user->cadresByUser($user->id)->id_specialized) != null)
            return $user->specializedByCadres($user->cadresByUser($user->id)->id_specialized)->ten_chuyen_nganh;
        else
            return 'không có';
    }

    /* Chuyên ngành phụ */
    function getSubSpecialized($user){
        if ($user->specializedByCadres($user->cadresByUser($user->id)->id_sub_specialized) != null)
            return $user->specializedByCadres($user->cadresByUser($user->id)->id_sub_specialized)->ten_chuyen_nganh;
        else
            return 'không có';
    }


    /* Giới tính */
    function getGioiTinh($user){
        switch ($user->gioi_tinh) {
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

    /* Tình trạng công tác */
    function getTinhTrangCongTac($user){
        switch($user->cadresByUser($user->id_cadres)->tinh_trang_cong_tac){
            case 0:
                return 'Đã nghĩ hưu';
            case 1:
                return 'Đang công tác';
        }
    }

    /* Trạng thái */
    function getTrangThai($user){
        switch($user->trang_thai){
            case 0:
                return '<span class="badge bg-danger text-capitalize">bị khóa</span>';
            case 1:
                return '<span class="badge bg-primary text-capitalize">đang hoạt động</span>';
        }
    }

    /* Nút cập nhật trạng thái */
    function getButtonTrangThai($user){
        switch($user->trang_thai){
            case 0:
                return '<a class="btn btn-primary btnModalUnlock"
                            data="[' . $user->id . ',' . $user->trang_thai . ']">
                            <i class="fa-solid fa-lock-open"></i>
                        </a>';

            case 1:
                return '<a class="btn btn-danger btnModalLock" data-toggle="modal"
                            data-target="#modalLock' . $user->id .'">
                            <i class="fa-solid fa-lock"></i>
                        </a>';
        }
    }

    /* Ẩn cột nếu quyền Admin */
    function hideColumnAdmin($user){
        if(!$user->hasRole('admin')){
            return '<td>
                        '.$this->getTrangThai($user).'
                    </td>
                    <td>
                        '.$this->getButtonTrangThai($user).'
                    </td>
                    <div class="modal fade" id="modalLock' . $user->id.'"
                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thông
                                        báo</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn thật sự muốn khóa người dùng này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn btn-secondary btnLockDisagree"
                                        data-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary btnLockAgree"
                                        data="[' . $user->id . ',' . $user->trang_thai . ']">Đồng
                                        ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td>
                        <a href="'.route('manager.user.decentralization', ['idUser' => $user->id]).'"
                            class="btn btn-primary"><i class="fa-solid fa-sliders"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btnModalDelete" data-toggle="modal"
                            data-target="#modalDelete' . $user->id.'">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <div class="modal fade" id="modalDelete' . $user->id.'"
                            tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Thông
                                            báo</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn thật sự muốn xóa người dùng này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary btnDisagree"
                                            data-dismiss="modal">Thoát</button>
                                        <button type="button" class="btn btn-primary btnAgree"
                                            data="[' . $user->id . ']">Đồng
                                            ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>';
        }else{
            return null;
        }
    }
    /* End Ajax */

    /* Lấy tất cả danh sách - Ajax */
    function getUsers(){
        try {
            $users = User::select('id','id_cadres','email','anh_dai_dien','trang_thai')->get();
            $output = '';
            
             foreach ($users as $user) {
                $output .= '
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"
                                id="check' . $user->id .'">
                            <label for="check' . $user->id .'"
                                class="custom-control-label"></label>
                        </div>
                    </td>
                    <td>'.$this->getRole($user).'</td>
                    <td>'. $user->email .'</td>
                    <td>
                        <a style="cursor: pointer;" data-toggle="modal"
                            data-target="#detailUser' . $user->id .'">
                            '. $user->cadresByUser($user->id_cadres)->ho_ten .'(Click)
                        </a>
                        <div class="modal fade" id="detailUser' . $user->id .'">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-uppercase"
                                            id="staticBackdropLabel">thông tin chi tiết</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                '.$this->getAnhDaiDien($user).'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p>Chức vụ:
                                                    '.$this->getPositionAndWorkUnit($user)['resultPosition'].$this->getPositionAndWorkUnit($user)['resultWorkUnit'].'
                                                </p>
                                                <p>Chức danh:
                                                    '.$this->getTitle($user).'
                                                </p>
                                                <p>Chuyên ngành chính:
                                                    '.$this->getSpecialized($user).'
                                                </p>
                                                <p>Chuyên ngành phụ:
                                                    '.$this->getSubSpecialized($user).'
                                                </p>
                                                <p>Ngày sinh:
                                                    '.date('d/m/Y', strtotime($user->cadresByUser($user->id)->ngay_sinh)).'
                                                </p>
                                                <p>Giới tính:
                                                    '.$this->getGioiTinh($user).'
                                                </p>
                                                <p>Số điện thoại:
                                                    '. $user->cadresByUser($user->id)->sdt .'
                                                </p>
                                                <p>CMND/CCCD:
                                                    '. $user->cadresByUser($user->id)->so_cmnd .'
                                                </p>
                                                <p>Ngày cấp CMND:
                                                    '. date('d/m/Y', strtotime($user->cadresByUser($user->id)->ngay_cap_cmnd)) .'
                                                </p>
                                                <p>Nơi cấp CMND:
                                                    '. $user->cadresByUser($user->id)->noi_cap_cmnd .'
                                                </p>
                                                <p>Địa chỉ tạm trú:
                                                    '. $user->cadresByUser($user->id)->dia_chi_tt .
                                                        ' (' .
                                                        $user->cadresByUser($user->id)->ma_tinh_tt .
                                                        '-' .
                                                        $user->cadresByUser($user->id)->ma_huyen_tt .
                                                        '-' .
                                                        $user->cadresByUser($user->id)->ma_xa_tt .
                                                        ')' .'
                                                </p>
                                                <p>Địa chỉ hộ khẩu:
                                                    '. $user->cadresByUser($user->id)->dia_chi_hk .
                                                        ' (' .
                                                        $user->cadresByUser($user->id)->ma_tinh_hk .
                                                        '-' .
                                                        $user->cadresByUser($user->id)->ma_huyen_hk .
                                                        '-' .
                                                        $user->cadresByUser($user->id)->ma_xa_hk .
                                                        ')' .'
                                                </p>
                                                <p>Tình trạng công tác:
                                                    '.$this->getTinhTrangCongTac($user).'
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    '.$this->hideColumnAdmin($user).'
                </tr>';
             }
            return response()->json(['status'=>200,'msgSuccess'=>'Lấy dữ liệu thành công!','output'=>$output]);
        } catch (\Exception $e) {
            return response()->json(['status'=>500,'msgError'=>$e]);
        }
    }

    /* Thêm */
    function addUser(Request $request){
        return response()->json($request->all());
    }

    /* Phân quyền */
    function decentralizationUser($idUser){
        return view('user.decentralization', ['idUser'=>$idUser]);
    }

    /* Khóa/Mở khóa tài khoản */
    function updateStatus(Request $request){
        try {
            $userById = User::find($request->idUser);
            $message = '';
            switch ($request->status) {
                case 0:
                    $userById->TRANG_THAI = 1;
                    $userById->save();
                    return response()->json(['status'=>200,'msgSuccess'=>'Tài khoản '.$userById->HO_VA_TEN.' được mở khóa!']);
                    break;
                case 1:
                    $userById->TRANG_THAI = 0;
                    $userById->save();
                    return response()->json(['status'=>200,'msgSuccess'=>'Tài khoản '.$userById->HO_VA_TEN.' đã bị khóa!']);
                    break;
            }
        } catch (\Exception $e) {
            return response()->json(['status'=>500,'msgError'=>$e]);
        }
    }

    /* Xóa người dùng */
    function deleteUser($idUser){
        try {
            User::destroy($idUser);
            return response()->json(['status'=>200,'msgSuccess'=>'Xóa thành công!']);
        } catch (\Exception $e) {
            return response()->json(['status'=>500,'msgError'=>$e]);
        }
    }

    /* Load lại Darkmode */
    function loadDarkMode(){
        return response()->json(['status'=>200,'outputDarkMode'=>Auth::user()->dark_mode]);
    }

    /* Bật chế độ ban đêm */
    function darkMode(Request $request){
        try {
            $userById = User::find(Auth::user()->id);
            if($request->statusCheck == 'true'){
                $userById->DARK_MODE = 1;
                $userById->save();
            }else{
                $userById->DARK_MODE = 0;
                $userById->save();
            }
            return response()->json(['status'=>200]);
        } catch (\Exception $e) {
            return response()->json(['status'=>500,'msgError'=>$e]);
        }
    }

    /* Cập nhật profile người dùng */
    function updateProfileUser(Request $request){
        try {
            $userById = User::find($request->userId);
            // if ($request->hasFile('anhDaiDien')) {
            //     $newImage = time() . '-' . $request->tenNguoiDung . '.' . $request->anhDaiDien->extension();
            //     $request->anhDaiDien->move(public_path('images/users'), $newImage);
            //     $userById->avatar = 'images/users/' . $newImage;
            // }
            // $userById->name = $request->tenNguoiDung;
            // $userById->email = $request->email;
            // $userById->save();
            return response()->json([
                'status'=>200,
                'msgSuccess'=>'Cập nhật thành công!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>500,
                'msgError'=>$e,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    // function updateUser($userId, Request $request){
    //         $userById = User::find($userId);
    //         if (isset($request->anhDaiDien)) {
    //             $newImage = time() . '-' . $request->tenNguoiDung . '.' . $request->anhDaiDien->extension();
    //             $request->anhDaiDien->move(public_path('images/users'), $newImage);
    //             $userById->avatar = 'images/users/' . $newImage;
    //         }
    //         $userById->name = $request->tenNguoiDung;
    //         $userById->email = $request->email;
    //         $userById->save();
    //         return redirect()->back();
    // }

    



    // function updateObject($objectId, Request $rq){
    //     $objectById = ObjectSystem::find($objectId);
    //     $objectById->ho_ten = $rq->hoTen;
    //     $objectById->gioi_tinh = $rq->gioiTinh;
    //     $objectById->ma_dan_toc = $rq->maDanToc;
    //     $objectById->ngay_sinh = $rq->ngaySinh;
    //     $objectById->ma_dinh_danh_v20 = $rq->maDinhDanh;
    //     $objectById->cmnd = $rq->cmnd;
    //     $objectById->so_dien_thoai = $rq->soDienThoai;
    //     $objectById->hk_ma_tinh = $rq->hkMaTinh;
    //     $objectById->hk_ma_huyen = $rq->hkMaHuyen;
    //     $objectById->hk_ma_xa = $rq->hkMaXa;
    //     $objectById->hk_dia_chi = $rq->hkDiaChi;
    //     $objectById->tt_ma_tinh = $rq->ttMaTinh;
    //     $objectById->tt_ma_huyen = $rq->ttMaHuyen;
    //     $objectById->tt_ma_xa = $rq->ttMaXa;
    //     $objectById->tt_dia_chi = $rq->ttDiaChi;
    //     $objectById->ma_hgd = $rq->hoTen;
    //     $objectById->updated_at = Carbon::now('Asia/Ho_Chi_Minh'); 
    // }
}

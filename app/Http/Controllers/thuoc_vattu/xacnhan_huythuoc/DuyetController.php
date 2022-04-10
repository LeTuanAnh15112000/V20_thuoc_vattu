<?php

namespace App\Http\Controllers\thuoc_vattu\xacnhan_huythuoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thuoc_vattu\Thanhlythuoc_thuochethan;
class DuyetController extends Controller
{
    // Xoa thuốc thanh lý khỏi danh sách thuốc
    public function xoa($idHealthFacility, $idMedicalStation){
        $medicine = DB::table('danhmucthuoc')->where('id_tramyte', $idMedicalStation)->where('handung', '<', 4)->delete();
        $thanhlythuoc = DB::table('thanhlythuocthuochethan')->where('trangthai', '=', 0)->update(['trangthai' => 1]);
        return back();
    }
}
 
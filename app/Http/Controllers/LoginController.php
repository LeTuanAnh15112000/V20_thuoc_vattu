<?php

namespace App\Http\Controllers;

use App\Models\Ethnic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /* Xác thực đăng nhập */
    function checkLogin(Request $request)
    {
        if (Auth::attempt(['ten_tai_khoan' => $request->userName, 'password' => $request->password])) {
            return redirect()->route('manager.dashboard.index');
        } else {
            return redirect()->back()->with(['msgError' => 'Tài khoản không tồn tại!']);
        }
    }

    /* Đăng xuất */
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}

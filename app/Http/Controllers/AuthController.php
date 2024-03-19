<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewDangnhap()
    {
        return view('user_login');
    }

    public function viewDangki()
    {
        return view('dangki');
    }

    public function dangKi(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $email = $request->email;

        if ($password != $confirm_password) {
            return view('dangki', [
                'message' => 'Sai xác nhận mật khẩu'
            ]);
        }
        if ($email == '') {
            return view('dangki', [
                'message' => 'Điền thông tin Email'
            ]);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'vai_tro' => 'giang_vien',
            'password' => bcrypt($password)
        ];
        $user = User::create($data);

        return view('dangki', [
            'message' => 'Tạo tài khoản thành công'
        ]);
    }

    public function dangNhap(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) 
        {
            return redirect()->route('dashboard')->with('message', 'Đăng nhập thành công');
        }
        return view('user_login', [
            'message' => 'sai thông tin',
        ]);
    }
}

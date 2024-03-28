<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewDangnhap()
    {
        return view('user.user_login');
    }

    public function viewDangki()
    {
        return view('user.dangki');
    }

    public function dangKi(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $email = $request->email;
        $khoa = $request->khoa;
        $sdt = $request->sdt;
        $phai = $request->phai;

        if ($password != $confirm_password) {
            return view('user.dangki', [
                'message' => 'Sai xác nhận mật khẩu'
            ]);
        }
        if ($name == '') {
            return view('user.dangki', [
                'message' => 'Điền thông tin tên'
            ]);
        }
        if ($email == '') {
            return view('user.dangki', [
                'message' => 'Điền thông tin Email'
            ]);
        }
        if ($khoa == '') {
            return view('user.dangki', [
                'message' => 'Chọn Khoa'
            ]);
        }
        if ($phai == '') {
            return view('user.dangki', [
                'message' => 'Chọn giới tính'
            ]);
        }
        if ($sdt == '') {
            return view('user.dangki', [
                'message' => 'Điền thông tin liên lạc'
            ]);
        }

        $existingUser = User::where('name', $request->name)
        ->orWhere('email', $request->email)
        ->orWhere('sdt', $request->sdt)
        ->first();
        if ($existingUser) {
            // Nếu thông tin đã tồn tại, xuất thông báo lỗi và chuyển hướng lại
            return view('user.dangki', ['message' => 'Thông tin đã tồn tại trong hệ thống.']);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'vai_tro' => 'giang_vien',
            'phai' => $phai,
            'password' => bcrypt($password),
            'khoa' => $khoa,
            'sdt' => $sdt,
        ];
        $user = User::create($data);

        return redirect()->route('user_login');
    }

    public function dangNhap(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->email == '' or $request->password == '')
        {
            
        return view('user.user_login', [
            'message' => 'Vui lòng điền thông tin',
        ]);
        }

        if (Auth::attempt($data)) 
        {
            return redirect()->route('trangchu')->with('success', 'Đăng nhập thành công.');
        }

        return view('user.user_login', [
            'message' => 'sai thông tin',
        ]);
    }
    public function dangXuat(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Hủy bỏ các phiên đăng nhập

        $request->session()->regenerateToken(); // Tạo lại CSRF token

        return redirect()->route('trangchu'); // Chuyển hướng người dùng đến trang chính sau khi đăng xuất
    }
}

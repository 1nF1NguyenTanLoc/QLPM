<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Lấy thông tin của tất cả người dùng
        $users = User::select('id', 'name', 'phai', 'sdt', 'email', 'khoa', 'vai_tro','created_at', 'updated_at', 'password')->get();
        
        // Loại bỏ mã hóa bcrypt từ mật khẩu
        foreach ($users as $user) {
            $user->password;
        }

        // Trả về view dashboard với thông tin người dùng
        return view('admin.dashboard', compact('users'));
    }
    public function createUser()
    {
        return view('admin.taoNguoiDung');
    }
    public function taoNguoidung(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $email = $request->email;
        $khoa = $request->khoa;
        $vai_tro = $request->vai_tro;
        $sdt = $request->sdt;
        $phai = $request->phai;

        if ($password != $confirm_password) {
            return view('admin.taoNguoiDung', [
                'message' => 'Sai xác nhận mật khẩu'
            ]);
        }
        if ($name == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Điền thông tin tên'
            ]);
        }
        if ($email == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Điền thông tin Email'
            ]);
        }
        if ($khoa == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Chọn Khoa'
            ]);
        }
        if ($phai == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Chọn giới tính'
            ]);
        }
        if ($vai_tro == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Chọn quyền'
            ]);
        }
        if ($sdt == '') {
            return view('admin.taoNguoiDung', [
                'message' => 'Điền thông tin liên lạc'
            ]);
        }

        $existingUser = User::where('name', $request->name)
        ->orWhere('email', $request->email)
        ->orWhere('sdt', $request->sdt)
        ->first();
        if ($existingUser) {
            // Nếu thông tin đã tồn tại, xuất thông báo lỗi và chuyển hướng lại
            return view('admin.taoNguoiDung', ['message' => 'Thông tin đã tồn tại trong hệ thống.']);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'vai_tro' => 'giang_vien',
            'phai' => $phai,
            'password' => bcrypt($password),
            'khoa' => $khoa,
            'vai_tro' => $vai_tro,
            'sdt' => $sdt,
        ];

        $user = User::create($data);

        // Redirect to a success page or do something else
        return redirect()->back()->with('message', 'Người dùng đã được tạo thành công!');
    }
}

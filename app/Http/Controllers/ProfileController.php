<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(auth()->id()); // Lấy thông tin profile của người dùng hiện tại
        return view('user.profile', compact('user'));
    }
    

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoi_dung,email,' . auth()->id(),
            'khoa' => 'required|string|max:255', // Thêm validation cho 'khoa'
            'sdt' => 'required|string|max:20', // Thêm validation cho 'sdt'
        ]);

        $user = User::findOrFail(auth()->id());
        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Thông tin đã được cập nhật thành công.');
    }

    public function updateMatKhau(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Lấy thông tin người dùng đã đăng nhập
        $user = User::findOrFail(auth()->id());

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withInput()->with('error', 'Mật khẩu hiện tại không đúng');
        }

        // Cập nhật mật khẩu mới cho người dùng
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Mật khẩu đã được thay đổi thành công');
    }
}

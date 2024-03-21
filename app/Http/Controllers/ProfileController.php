<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show1()
    {
        $user = User::findOrFail(auth()->id()); // Lấy thông tin profile của người dùng hiện tại
        return view('user.profile', compact('user'));
    }

    
    public function show2()
    {
        return view('user.password');
    }
    

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        
        $user->phai = (bool) $request->phai;
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoi_dung,email,' . auth()->id(),
            'khoa' => 'required|string|max:255', // Thêm validation cho 'khoa'
            'sdt' => 'required|string|max:20', // Thêm validation cho 'sdt'
        ]);

        $user->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Thông tin đã được cập nhật thành công.');
    }

    public function updateMatKhau(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);
    
        $user = User::findOrFail(auth()->id());
    
        // Kiểm tra xem mật khẩu hiện tại có đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.password')->with('error', 'Mật khẩu hiện tại không đúng.');
        }
    
        // Cập nhật mật khẩu mới
        $user->password = bcrypt($request->new_password);
        $user->save();
    
        return redirect()->route('profile.password')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}

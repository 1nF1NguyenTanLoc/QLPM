<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use App\Models\SuDung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Lấy thông tin của tất cả người dùng
        $users = User::all();

        $phongs = Phong::with('nguoiSuDung')->get();
         // Lấy lịch sử sử dụng của người dùng hiện tại
        $lichSu = SuDung::all();

        // Trả về view dashboard với thông tin người dùng
        return view('admin.dashboard', compact('users', 'phongs', 'lichSu'));
    }

    public function createUser()
    {
        return view('admin.users.taoNguoiDung');
    }
    // Function để hiển thị giao diện sửa thông tin người dùng
    public function editUser($id)
    {
        // Tìm người dùng cần sửa thông tin theo ID
        $user = User::findOrFail($id);

        // Trả về view để hiển thị giao diện sửa thông tin với dữ liệu của người dùng cần sửa
        return view('admin.users.updateNguoidung', compact('user'));
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
            return view('admin.users.taoNguoiDung', ['message' => 'Thông tin đã tồn tại trong hệ thống.']);
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
        return redirect()->route('dashboard')->with('success', 'Người dùng đã được tạo thành công!');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoi_dung,email,' . $user->id,
            'sdt' => 'required|string|max:20',
            'vai_tro' => 'required|string|max:255',
            'khoa' => 'required|string|max:255',
            'phai' => 'required|string|max:255',
        ]);

        // Kiểm tra nếu mật khẩu được nhập, thì cập nhật mật khẩu
        if ($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        // Cập nhật các trường thông tin khác
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->vai_tro = $request->vai_tro;
        $user->khoa = $request->khoa;
        $user->phai = $request->phai;

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Cập nhật thông tin người dùng thành công.');
    }

    public function destroyUser(Request $request, User $user)
    {
        // Xóa người dùng từ cơ sở dữ liệu
        $user->delete();

        // Tìm giá trị ID cao nhất
        $maxId = User::max('id');
    
        // Cập nhật số đếm tự động của bảng nguoi_dung thành giá trị cao nhất + 1
        DB::statement("ALTER TABLE nguoi_dung AUTO_INCREMENT = " . ($maxId + 1));

        // Chuyển hướng về trang danh sách người dùng hoặc trang khác tùy bạn
        return back()->with('success', 'Người dùng đã được xóa thành công.');
    }

    public function createRoom()
    {
        return view('admin.rooms.taoPhong');
    }
    // Function để hiển thị giao diện sửa thông tin phòng
    public function editRoom($id)
    {
        // Tìm phòng cần sửa thông tin theo ID
        $phong = Phong::findOrFail($id);

        // Trả về view để hiển thị giao diện sửa thông tin với dữ liệu của phòng cần sửa
        return view('admin.rooms.updatePhong', ['phong' => $phong]);
    }

    public function baoTri($id)
    {
        // Tìm phòng cần bảo trì
        $phong = Phong::findOrFail($id);
        // Kiểm tra nếu phòng đang ở trạng thái "dang_su_dung" thì không thể bảo trì
        if ($phong->trang_thai === 'dang_su_dung') {
            return redirect()->back()->with('error', 'Không thể bảo trì phòng đang được sử dụng.');
        }

        // Cập nhật trạng thái của phòng thành 'dang_bao_tri'
        $phong->trang_thai = 'dang_bao_tri';
        $phong->nguoi_dung_id = null;
        $phong->save();

        // Redirect hoặc trả về response JSON tuỳ thuộc vào logic của ứng dụng
        return redirect()->back()->with('success', 'Phòng đã được đưa vào trạng thái bảo trì.');
    }

    public function hoanTat($id)
    {
        // Tìm phòng cần hoàn tất bảo trì
        $phong = Phong::findOrFail($id);

        // Cập nhật trạng thái của phòng thành 'san_sang'
        $phong->trang_thai = 'san_sang';
        $phong->nguoi_dung_id = null;
        $phong->save();

        return redirect()->back()->with('success', 'Phòng đã hoàn tất bảo trì và sẵn sàng sử dụng.');
    }

    public function taoRoom(Request $request)
    {
        // Kiểm tra và xác thực dữ liệu được gửi từ form
        $request->validate([
            'ten_phong' => 'required|string|max:255',
            'suc_chua' => 'required|integer|min:1',
            'vi_tri' => 'required|string|max:255',
        ]);

        // Tạo mới đối tượng PhongMay với các giá trị từ request
        $phong = new Phong();
        $phong->ten_phong = $request->ten_phong;
        $phong->suc_chua = $request->suc_chua;
        $phong->vi_tri = $request->vi_tri;
        $phong->trang_thai = 'san_sang'; // Trạng thái mặc định là 'san_sang'

        // Lưu đối tượng vào cơ sở dữ liệu
        $phong->save();

        // Redirect về trang danh sách phòng hoặc trang khác tuỳ theo logic của ứng dụng
        return redirect()->route('dashboard')->with('success', 'Phòng mới đã được tạo thành công.');
    }

    public function destroyRoom(Request $request, Phong $phong)
    {
        // Xóa người dùng từ cơ sở dữ liệu
        $phong->delete();

        // Tìm giá trị ID cao nhất
        $maxId = Phong::max('id');
    
        // Cập nhật số đếm tự động của bảng nguoi_dung thành giá trị cao nhất + 1
        DB::statement("ALTER TABLE phong_may AUTO_INCREMENT = " . ($maxId + 1));

        // Chuyển hướng về trang danh sách người dùng hoặc trang khác tùy bạn
        return back()->with('success', 'Phòng đã được xóa thành công.');
    }

    public function updateRoom(Request $request, $id)
    {
        $phong = Phong::findOrFail($id);

        $request->validate([
            'ten_phong' => 'required|string|max:255|unique:phong_may,ten_phong,' . $phong ->id,
            'suc_chua' => 'required|string|max:255',
            'vi_tri' => 'required|string|max:255|unique:phong_may,vi_tri,' . $phong ->id
        ]);
        // Cập nhật các trường thông tin khác
        $phong->ten_phong = $request->ten_phong;
        $phong->suc_chua = $request->suc_chua;
        $phong->vi_tri = $request->vi_tri;

        

        $phong->save();

        return redirect()->route('dashboard')->with('success', 'Cập nhật thông tin phòng thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use App\Models\SuDung;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhongConTroller extends Controller
{
    public function index()
    {
        $phongs = Phong::with('nguoiSuDung')->get();
        return view('user.datphong', compact('phongs'));
    }
    public function lichSuSuDungPhongMay()
    {
    
        // Lấy lịch sử sử dụng của người dùng hiện tại
        $lichSu = SuDung::where('id_nguoi_dung', auth()->id())
        ->orderBy('id_phong_may', 'asc')
        ->get();
    
        // Trả về view và truyền biến $lichSu sang view
        return view('user.lichsudungphong', ['lichSu' => $lichSu]);
    }
    public function suDungPhong($id)
    {
        // Xác định phòng cần sử dụng
        $phong = Phong::findOrFail($id);

        // Cập nhật trạng thái phòng thành "Sử dụng"
        $phong->trang_thai = 'dang_su_dung';

        // Cập nhật id người dùng đang sử dụng phòng
        $phong->nguoi_dung_id = auth()->id(); // Giả sử bạn đang sử dụng hệ thống xác thực Laravel

        $phong->save();

        SuDung::create([
            'id_nguoi_dung' => auth()->id(),
            'id_phong_may' => $phong->id,
            'thoi_gian_bat_dau' => Carbon::now(),
        ]);

        // Chuyển hướng trở lại trang danh sách phòng
        return redirect()->route('datphong')->with('success', 'Phòng đã được sử dụng');
    }
    

    public function traPhong($id)
    {
        $phong = Phong::findOrFail($id);

        // Kiểm tra xem người dùng có đang sử dụng phòng không
        if ($phong->nguoi_dung_id == auth()->id()) {
            // Nếu đúng, thực hiện trả phòng
            $phong->nguoi_dung_id = null; // Xóa thông tin người dùng đang sử dụng phòng
            $phong->trang_thai = 'san_sang'; // Cập nhật trạng thái phòng
            $phong->save();
            $lichSu = SuDung::where('id_phong_may', $id)
            ->whereNull('thoi_gian_ket_thuc') // Chỉ lấy những bản ghi chưa kết thúc
            ->first();

        if ($lichSu) {
            // Cập nhật thời gian kết thúc và lưu vào cơ sở dữ liệu
            $lichSu->thoi_gian_ket_thuc = Carbon::now();
            $thoiGianBatDau = Carbon::parse($lichSu->thoi_gian_bat_dau);
            $thoiGianKetThuc = Carbon::parse($lichSu->thoi_gian_ket_thuc);
            $thoiGianSuDung = abs($thoiGianKetThuc->diffInMinutes($thoiGianBatDau));
            $gio = floor($thoiGianSuDung / 60); // Lấy số giờ
            $phut = $thoiGianSuDung % 60; // Lấy số phút
            // Làm tròn giờ và phút
            $gio = round($gio);
            $phut = round($phut);

            $lichSu->mo_ta = "$gio giờ $phut phút.";
            $lichSu->save();

            return redirect()->back()->with('success', 'Trả phòng thành công.');
        }

            return redirect()->back()->with('success', 'Trả phòng thành công');
        }
    }
    
}

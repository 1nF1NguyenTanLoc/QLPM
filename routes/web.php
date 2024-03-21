<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhongConTroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('trangchu');
// })->name('trangchu');;
Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
Route::post('/', [AuthController::class, 'dangXuat'])->name('dangxuat');
Route::get('/profile', [TrangChuController::class, 'viewProfile'])->name('thongtin');
Route::get('/rooms', [PhongConTroller::class, 'index'])->name('datphong');
Route::get('/sudung', [PhongConTroller::class, 'lichSuSuDungPhongMay'])->name('lichsu');
Route::post('/phong/{id}/su-dung', [PhongController::class, 'suDungPhong'])->name('phong.su-dung');
Route::post('/phong/{id}/tra-phong', [PhongController::class, 'traPhong'])->name('phong.tra-phong');
Route::get('/login', [AuthController::class, 'viewDangnhap'])->name('user_login');
Route::post('/login', [AuthController::class, 'dangNhap'])->name('dangnhap_post');
Route::get('/dangki', [AuthController::class, 'viewDangki'])->name('dangki');
Route::post('/dangki', [AuthController::class, 'dangKi'])->name('dangki_post');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'show1'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/password', [ProfileController::class, 'show2'])->name('profile.password')->middleware('auth');
Route::post('/profile/password/update', [ProfileController::class, 'updateMatKhau'])->name('profile.password-update')->middleware('auth');
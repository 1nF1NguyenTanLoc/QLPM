<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('trangchu');
// })->name('trangchu');;
Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
Route::post('/', [AuthController::class, 'dangXuat'])->name('dangxuat');
Route::get('/profile', [TrangChuController::class, 'viewProfile'])->name('thongtin');
Route::get('/rooms', [TrangChuController::class, 'datPhong'])->name('datphong');
Route::get('/login', [AuthController::class, 'viewDangnhap'])->name('user_login');
Route::post('/login', [AuthController::class, 'dangNhap']);
Route::get('/dangki', [AuthController::class, 'viewDangki'])->name('dangki');
Route::post('/dangki', [AuthController::class, 'dangKi']);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/update-password', [ProfileController::class, 'updateMatKhau'])->name('profile.update-password');
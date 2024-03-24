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
// Trang Chủ
Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
Route::get('/profile', [TrangChuController::class, 'viewProfile'])->name('thongtin');
// Auth
Route::post('/', [AuthController::class, 'dangXuat'])->name('dangxuat');
Route::get('/login', [AuthController::class, 'viewDangnhap'])->name('user_login');
Route::post('/login', [AuthController::class, 'dangNhap'])->name('dangnhap_post');
Route::get('/dangki', [AuthController::class, 'viewDangki'])->name('dangki');
Route::post('/dangki', [AuthController::class, 'dangKi'])->name('dangki_post');
// Phòng
Route::get('/rooms', [PhongConTroller::class, 'index'])->name('datphong');
Route::get('/rooms/filter', [PhongConTroller::class, 'filter'])->name('rooms.filter');
Route::get('/sudung', [PhongConTroller::class, 'lichSuSuDungPhongMay'])->name('lichsu');
Route::post('/phong/{id}/su-dung', [PhongController::class, 'suDungPhong'])->name('phong.su-dung');
Route::post('/phong/{id}/tra-phong', [PhongController::class, 'traPhong'])->name('phong.tra-phong');
// Profile
Route::get('/profile', [ProfileController::class, 'show1'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/password', [ProfileController::class, 'show2'])->name('profile.password')->middleware('auth');
Route::post('/profile/password/update', [ProfileController::class, 'updateMatKhau'])->name('profile.password-update')->middleware('auth');
// Admin
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/users/create', [DashboardController::class, 'createUser'])->name('admin.users.create');
Route::post('/admin/users', [DashboardController::class, 'taoNguoidung'])->name('admin.users.store');
Route::delete('/admin/users/{user}', [DashboardController::class, 'destroyUser'])->name('users.destroy');
Route::get('/admin/users/{id}/edit', [DashboardController::class, 'editUser'])->name('admin.users.edit');
Route::post('/admin/users/{id}', [DashboardController::class, 'updateUser'])->name('admin.users.update');
Route::get('/admin/rooms/create', [DashboardController::class, 'createRoom'])->name('admin.rooms.create');
Route::post('/admin/rooms', [DashboardController::class, 'taoRoom'])->name('admin.rooms.store');
Route::put('/admin/rooms/{phong}/bao-tri', [DashboardController::class, 'baoTri'])->name('admin.phong.bao_tri');
Route::put('/admin/rooms/{phong}/hoan-tat', [DashboardController::class, 'hoanTat'])->name('admin.phong.hoan_tat');
Route::delete('/admin/rooms/{phong}', [DashboardController::class, 'destroyRoom'])->name('rooms.destroy');
Route::get('/admin/rooms/{phong}/edit', [DashboardController::class, 'editRoom'])->name('admin.rooms.edit');
Route::post('/admin/rooms/{phong}', [DashboardController::class, 'updateRoom'])->name('admin.rooms.update');

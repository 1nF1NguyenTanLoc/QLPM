<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('trangchu');
// })->name('trangchu');;
Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
Route::get('/login', [AuthController::class, 'viewDangnhap'])->name('user_login');
Route::post('/login', [AuthController::class, 'dangNhap']);
Route::get('/dangki', [AuthController::class, 'viewDangki'])->name('dangki');
Route::post('/dangki', [AuthController::class, 'dangKi']);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
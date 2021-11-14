<?php

use Illuminate\Support\Facades\Route;

/**==============================
 * Danh sách routes cho dashboard
 * ==============================
 */
Route::middleware('guestDashboard:' . config('dashboard.guard'))->group(function () {
	/**
	 * Đăng nhập
	 */
	Route::get('login', [\DNT\Dashboard\Controllers\LoginController::class, 'showLoginForm'])->name('login');
});
/**
 * Yêu cầu đăng nhập
 * và phải là admin
 */
Route::middleware('authDashboard:' . config('dashboard.guard'))->group(function () {
	Route::get('/', function () {
		return view('dashboard::layouts.default');
	})->name('index');
});

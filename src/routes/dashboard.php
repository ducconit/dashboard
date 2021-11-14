<?php

use Illuminate\Support\Facades\Route;

/**==============================
 * Danh sách routes cho dashboard
 * ==============================
 */
Route::get('/', function () {
	return view('welcome');
});

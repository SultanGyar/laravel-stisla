<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost']);
});

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user',  \App\Http\Controllers\UserController::class);
    Route::resource('peralatan',  \App\Http\Controllers\PeralatanController::class);
    Route::resource('kategori_peralatan',  \App\Http\Controllers\KategoriPeralatanController::class);
    Route::resource('point_check',  \App\Http\Controllers\PointCheckController::class);
    Route::resource('penjadwalan',  \App\Http\Controllers\PenjadwalanController::class);
    Route::resource('perbaikan',  \App\Http\Controllers\PerbaikanController::class);
    Route::resource('laporan_penjadwalan',  \App\Http\Controllers\LaporanPenjadwalanController::class);
    Route::resource('laporan_perbaikan',  \App\Http\Controllers\LaporanPerbaikanController::class);

    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});

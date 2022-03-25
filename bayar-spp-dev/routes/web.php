<?php

use App\Http\Controllers\Admin\DasusController;
use App\Http\Controllers\admin\DetyarController;
use App\Http\Controllers\admin\PemsisController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\Tatus\DasisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', function () {
//     return view('home');
// });


Auth::routes();

// Logout auth
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Users
Route::middleware('role:admin')->get('dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
Route::middleware('role:tatus')->get('dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
Route::middleware('role:user')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

// Daftar Siswa Admin
Route::get('admin/daftar-siswa', [DasusController::class, 'index'])->name('admin/daftar-siswa');
Route::post('admin/store-siswa', [DasusController::class, 'store'])->name('admin/store-siswa');
Route::post('admin/edits-siswa', [DasusController::class, 'edits'])->name('admin/edits-siswa');
Route::post('admin/updates-siswa', [DasusController::class, 'updates'])->name('admin/updates-siswa');
Route::post('admin/destroy-siswa', [DasusController::class, 'destroy'])->name('admin/destroy-siswa');

// Daftar Siswa Tatus
Route::get('tatus/daftar-siswa', [DasisController::class, 'index'])->name('tatus/daftar-siswa');
Route::post('tatus/store-siswa', [DasisController::class, 'store'])->name('tatus/store-siswa');
Route::post('tatus/edits-siswa', [DasisController::class, 'edits'])->name('tatus/edits-siswa');
Route::post('tatus/updates-siswa', [DasisController::class, 'updates'])->name('tatus/updates-siswa');
Route::post('tatus/destroy-siswa', [DasisController::class, 'destroy'])->name('tatus/destroy-siswa');

// Pembayaran Siswa
Route::get('admin/pembayaran-search', [PemsisController::class, 'index'])->name('admin/pembayaran-search');
Route::get('admin/detail-pembayaran', [DetyarController::class, 'index'])->name('admin/detail-pembayaran');

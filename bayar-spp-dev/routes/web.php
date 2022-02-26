<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// login
// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'authenticate']);


// Route::get('/register', [RegisController::class, 'index']);
// Route::get('/lupas', [LupasController::class, 'index']);
// // post register
// Route::post('/register', [RegisController::class, 'store']);

// // home admin
// Route::get('/home-admin', [AdminController::class, 'index']);


// // home siswa
// Route::get('/siswa/dashboard', [SiswaController::class, 'index']);


// // home tata usaha
// Route::get('/home-tatus', [TatusController::class, 'index']);

// Route::get('/kesiswaan', function () {
//     return view('kesiswaan', [
//         "tittle" => "Kesiswaan"
//     ]);
// });

// Route::get('/siswa', function () {
//     return view('daftar-siswa', [
//         "tittle" => "Daftar Siswa"
//     ]);
// });

// Route::get('/pembayaran', function () {
//     return view('pembayaran', [
//         "tittle" => "Siswa Bayar"
//     ]);
// });

// Route::get('/data-bayar', function () {
//     return view('data-bayar', [
//         "tittle" => "Data Pembayaran"
//     ]);
// });


// Route::get('/laporan', function () {
//     return view('laporan', [
//         "tittle" => "Laporan"
//     ]);
// });

// Route::get('/lapor-bulanan', function () {
//     return view('lapor-bulanan', [
//         "tittle" => "Lapor Bulanan"
//     ]);
// });

// Route::get('/lapor-tahunan', function () {
//     return view('lapor-tahunan', [
//         "tittle" => "Lapor Tahunan"
//     ]);
// });

// Route::get('/profil', function () {
//     return view('profil', [
//         "tittle" => "Profil"
//     ]);
// });

Auth::routes();

// Route::middleware('auth')->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::get('dashboard', [DashboardController::class, 'index'])->name('admin');

//         /** Action Siswa dengan route resource */
//         Route::resource('master_data', [SiswaController::class, 'index'])->except([
//             'show',
//         ])->names([
//             'index' => 'admin.master_data.index',
//             'create' => 'admin.master_data.create',
//             'store' => 'admin.master_data.store',
//             'update' => 'admin.master_data.update',
//             'destroy' => 'admin.master_data.destroy'

//         ]);
//     });
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

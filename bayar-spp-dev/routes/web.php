<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home"
    ]);
});

Route::get('/kesiswaan', function () {
    return view('kesiswaan', [
        "tittle" => "Kesiswaan"
    ]);
});

Route::get('/siswa', function () {
    return view('daftar-siswa', [
        "tittle" => "Daftar Siswa"
    ]);
});

Route::get('/pembayaran', function () {
    return view('pembayaran', [
        "tittle" => "Siswa Bayar"
    ]);
});

Route::get('/data-bayar', function () {
    return view('data-bayar', [
        "tittle" => "Data Pembayaran"
    ]);
});


Route::get('/laporan', function () {
    return view('laporan', [
        "tittle" => "Laporan"
    ]);
});

Route::get('/lapor-bulanan', function () {
    return view('lapor-bulanan', [
        "tittle" => "Lapor Bulanan"
    ]);
});

Route::get('/lapor-tahunan', function () {
    return view('lapor-tahunan', [
        "tittle" => "Lapor Tahunan"
    ]);
});

Route::get('/profil', function () {
    return view('profil', [
        "tittle" => "Profil"
    ]);
});

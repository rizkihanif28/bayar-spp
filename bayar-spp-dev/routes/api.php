<?php

use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admins/tagihan/{siswa?}', [PembayaranController::class, 'tagihan'])->name('api/gettagihan');
Route::get('admins/load/{siswa?}', [SiswaController::class, 'getLoad'])->name('api/getload');
Route::post('admins/transaksi-spp/{siswa?}', [PembayaranController::class, 'store'])->name('api/bayar-spp');

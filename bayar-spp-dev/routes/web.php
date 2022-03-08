<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard-admin', [LoginController::class, 'index'])->name('dashboard-admin');

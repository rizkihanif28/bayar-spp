<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TatusController;
use App\Models\Siswa;
use App\Models\Tatus;
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

// Logout auth
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('auth/register', [RegisterController::class, 'index'])->name('register');
// Route::middleware('role:user')->post('/register', [RegisterController::class, 'index'])->name('register');

// ** Dashboard User ** //
// Route::get('/dashboard/siswa', [HomeController::class, 'index'])->name('dashboard/siswa');
// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware('role:admin')->get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard/admin');
Route::middleware('role:tatus')->get('/dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
Route::middleware('role:user')->get('/dashboard/siswa', [SiswaController::class, 'index'])->name('dashboard/siswa');

<?php

use App\Http\Controllers\Admin\DataBayarController;
use App\Http\Controllers\Admin\HistoriController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TagihanController;
use App\Http\Controllers\Admin\UserContoller;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\Tatus\ProfilController;
use App\Http\Controllers\Tatus\SiswaController as TatusSiswaController;
use App\Models\User;
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


Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('web.index');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    // Dashboard Users
    Route::middleware('role:admin')->get('dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
    Route::middleware('role:tatus')->get('dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
    Route::middleware('role:user')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

    // {{ Route Admin }}
    // Pengguna / Users
    Route::get('admins/users/index', [UserContoller::class, 'index'])->name('admins/users/index');
    Route::get('admins/users/{users}/edit', [UserContoller::class, 'edit'])->name('admins/users/edit');

    // User List
    Route::get('admins/user-role/index', [UserRoleController::class, 'index'])->name('admins/user-role');
    Route::get('admins/user-role/create/{id}', [UserRoleController::class, 'create'])->name('admins/user-role/create');
    Route::post('admins/user-role/store/{id}', [UserRoleController::class, 'store'])->name('admins/user-role/store');

    // siswa
    Route::get('admins/siswa/index', [SiswaController::class, 'index'])->name('admins/siswa/index');
    Route::get('admins/siswa/create', [SiswaController::class, 'create'])->name('admins/siswa/create');
    Route::post('admins/siswa/store', [SiswaController::class, 'store'])->name('admins/siswa/store');
    Route::get('admins/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('admins/siswa/edit');
    Route::post('admins/siswa/{siswa}/update', [SiswaController::class, 'update'])->name('admins/siswa/update');
    Route::post('admins/siswa/{siswa}/destroy', [SiswaController::class, 'destroy'])->name('admins/siswa/destroy');

    // Tagihan
    Route::get('admins/tagihan/index', [TagihanController::class, 'index'])->name('admins/tagihan/index');
    Route::get('admins/tagihan/create', [TagihanController::class, 'create'])->name('admins/tagihan/create');
    Route::post('admins/tagihan/store', [TagihanController::class, 'store'])->name('admins/tagihan/store');
    Route::get('admins/tagihan/{tagihan}/edit', [TagihanController::class, 'edit'])->name('admins/tagihan/edit');
    Route::post('admins/tagihan/{tagihan}/update', [TagihanController::class, 'update'])->name('admins/tagihan/update');
    Route::post('admins/tagihan/{tagihan}/destroy', [TagihanController::class, 'destroy'])->name('admins/tagihan/destroy');

    // pembayaran
    Route::get('admins/pembayaran/index', [AdminPembayaranController::class, 'index'])->name('admins/pembayaran/index');

    // Data Pembayaran
    Route::get('admins/databayar/index', [DataBayarController::class, 'index'])->name('admins/databayar/index');

    // Hostori
    Route::get('admins/histori/index', [HistoriController::class, 'index'])->name('admins/histori/index');

    // jurusan
    Route::get('admins/jurusan/index', [JurusanController::class, 'index'])->name('admins/jurusan/index');
    Route::get('admins/jurusan/create', [JurusanController::class, 'create'])->name('admins/jurusan/create');
    Route::post('admins/jurusan/store', [JurusanController::class, 'store'])->name('admins/jurusan/store');
    Route::get('admins/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('admins/jurusan/edit');
    Route::post('admins/jurusan/{jurusan}/update', [JurusanController::class, 'update'])->name('admins/jurusan/update');
    Route::post('admins/jurusan/{jurusan}/destroy', [JurusanController::class, 'destroy'])->name('admins/jurusan/destroy');

    // periode
    Route::get('admins/periode/index', [PeriodeController::class, 'index'])->name('admins/periode/index');
    Route::get('admins/periode/create', [PeriodeController::class, 'create'])->name('admins/periode/create');
    Route::post('admins/periode/store', [PeriodeController::class, 'store'])->name('admins/periode/store');
    Route::get('admins/periode/{periode}/edit', [PeriodeController::class, 'edit'])->name('admins/periode/edit');
    Route::post('admins/periode/{periode}/update', [PeriodeController::class, 'update'])->name('admins/periode/update');
    Route::post('admins/periode/{periode}/destroy', [PeriodeController::class, 'destroy'])->name('admins/periode/destroy');

    // kelas
    Route::get('admins/kelas/index', [KelasController::class, 'index'])->name('admins/kelas/index');
    Route::get('admins/kelas/create', [KelasController::class, 'create'])->name('admins/kelas/create');
    Route::post('admins/kelas/store', [KelasController::class, 'store'])->name('admins/kelas/store');
    Route::get('admins/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('admins/kelas/edit');
    Route::post('admins/kelas/{kelas}/update', [KelasController::class, 'update'])->name('admins/kelas/update');
    Route::post('admins/kelas/{kelas}/destroy', [KelasController::class, 'destroy'])->name('admins/kelas/destroy');

    // Laporan


    // Profil 
    Route::get('admins');


    // {{ Route TataUsaha }}
    // siswa
    Route::get('tatus/siswa/index', [TatusSiswaController::class, 'index'])->name('tatus/siswa/index');
    Route::get('tatus/siswa/create', [TatusSiswaController::class, 'create'])->name('tatus/siswa/create');
    Route::post('tatus/siswa/store', [TatusSiswaController::class, 'store'])->name('tatus/siswa/store');
    Route::get('tatus/siswa/{siswa}/edit', [TatusSiswaController::class, 'edit'])->name('tatus/siswa/edit');
    Route::post('tatus/siswa/{siswa}/update', [TatusSiswaController::class, 'update'])->name('tatus/siswa/update');
    Route::post('tatus/siswa/{siswa}/destroy', [TatusSiswaController::class, 'destroy'])->name('tatus/siswa/destroy');


    // Profil 
    Route::get('tatus/profil/{user}/edit', [UserContoller::class, 'edit'])->name('tatus/profil/edit');
    Route::post('tatus/profil/{user}/update', [ProfilController::class, 'update'])->name('tatus/profil/update');
});

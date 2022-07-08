<?php

use App\Http\Controllers\Admin\DataBayarController;
use App\Http\Controllers\Admin\HistoriController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\Laporan;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\StatusPembayaranController;
use App\Http\Controllers\Admin\TagihanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdminController;
use App\Http\Controllers\Dashboard\SiswaController as DashboardSiswaController;
use App\Http\Controllers\Dashboard\TatusController;
use App\Http\Controllers\Siswa\ProfilController as SiswaProfilController;
use App\Http\Controllers\Siswa\StatusBayarSiswaController;
use App\Http\Controllers\Tatus\KelasController as TatusKelasController;
use App\Http\Controllers\Tatus\LaporanController as TatusLaporanController;
use App\Http\Controllers\Tatus\PembayaranController;
use App\Http\Controllers\Tatus\ProfilController;
use App\Http\Controllers\Tatus\SiswaController as TatusSiswaController;
use App\Http\Controllers\Tatus\TagihanController as TatusTagihanController;
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

    Route::get('register/create', [RegisterController::class, 'create']);
    Route::post('register/store', [RegisterController::class, 'store']);

    // Dashboard Users
    Route::middleware('role:admin')->get('dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard/admin');
    Route::middleware('role:tata usaha')->get('dashboard/tatus', [TatusController::class, 'index'])->name('dashboard/tatus');
    Route::middleware('role:siswa')->get('dashboard/siswa', [DashboardSiswaController::class, 'index'])->name('dashboard/siswa');

    // {{ Route Admin }}
    // Pengguna / Users
    Route::get('admins/user/index', [UserController::class, 'index'])->name('admins/user/index');
    Route::get('admins/user/create', [UserController::class, 'create'])->name('admins/user/create');
    Route::post('admins/user/store', [UserController::class, 'store'])->name('admins/user/store');
    Route::get('admins/user/{user}/edit', [UserController::class, 'edit'])->name('admins/user/edit');
    Route::post('admins/user/{user}/update', [UserController::class, 'update'])->name('admins/user/update');
    Route::post('admins/user/{user}/destroy', [UserController::class, 'destroy'])->name('admins/user/destroy');

    // User Role
    Route::get('admins/user-role/index', [UserRoleController::class, 'index'])->name('admins/user-role/index');
    Route::get('admins/user-role/{id}/create', [UserRoleController::class, 'create'])->name('admins/user-role/create');
    Route::post('admins/user-role/{id}/store', [UserRoleController::class, 'store'])->name('admins/user-role/store');

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
    Route::get('admins/pembayaran/{nis}/create', [AdminPembayaranController::class, 'create'])->name('admins/pembayaran/create');
    Route::get('pembayaran/spp/{periode}', [AdminPembayaranController::class, 'spp'])->name('pembayaran.spp');
    Route::post('admins/pembayaran/store/{nis}', [AdminPembayaranController::class, 'store'])->name('admins/pembayaran/store');
    Route::get('admins/histori', [AdminPembayaranController::class, 'historiPembayaran'])->name('histori/pembayaran');

    // Status Pembayaran
    Route::get('admins/status/show/{siswa:nis}', [AdminPembayaranController::class, 'statusPembayaranShow'])->name('status/show');
    Route::get('admins/status/show/{nis}/{periode}', [AdminPembayaranController::class, 'statusPembayaranShowStatus'])->name('status-pembayaran/siswa');
    // kelas
    Route::get('admins/kelas/index', [KelasController::class, 'index'])->name('admins/kelas/index');
    Route::get('admins/kelas/create', [KelasController::class, 'create'])->name('admins/kelas/create');
    Route::post('admins/kelas/store', [KelasController::class, 'store'])->name('admins/kelas/store');
    Route::get('admins/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('admins/kelas/edit');
    Route::post('admins/kelas/{kelas}/update', [KelasController::class, 'update'])->name('admins/kelas/update');
    Route::post('admins/kelas/{kelas}/destroy', [KelasController::class, 'destroy'])->name('admins/kelas/destroy');

    // Laporan
    Route::get('admins/laporan/index', [LaporanController::class, 'index'])->name('admins/laporan/index');
    Route::get('admins/laporan', [LaporanController::class, 'create'])->name('admins/laporan');
    Route::post('admins/laporan/print', [LaporanController::class, 'printPDF'])->name('laporan/print');


    // Profil 
    Route::middleware(['role:admin'])->get('profil', [AdminProfilController::class, 'index'])->name('profil');
    Route::middleware(['role:admin'])->patch('pass/update', [AdminProfilController::class, 'update'])->name('pass/update');


    // {{ Route TataUsaha }}
    // Siswa
    Route::get('tatus/siswa/index', [TatusSiswaController::class, 'index'])->name('tatus/siswa/index');
    Route::get('tatus/siswa/create', [TatusSiswaController::class, 'create'])->name('tatus/siswa/create');
    Route::post('tatus/siswa/store', [TatusSiswaController::class, 'store'])->name('tatus/siswa/store');
    Route::get('tatus/siswa/{siswa}/edit', [TatusSiswaController::class, 'edit'])->name('tatus/siswa/edit');
    Route::post('tatus/siswa/{siswa}/update', [TatusSiswaController::class, 'update'])->name('tatus/siswa/update');
    Route::post('tatus/siswa/{siswa}/destroy', [TatusSiswaController::class, 'destroy'])->name('tatus/siswa/destroy');

    // Tagihan
    Route::get('tatus/tagihan/index', [TatusTagihanController::class, 'index'])->name('tatus/tagihan/index');
    Route::get('tatus/tagihan/create', [TatusTagihanController::class, 'create'])->name('tatus/tagihan/create');
    Route::post('tatus/tagihan/store', [TatusTagihanController::class, 'store'])->name('tatus/tagihan/store');
    Route::get('tatus/tagihan/{tagihan}/edit', [TatusTagihanController::class, 'edit'])->name('tatus/tagihan/edit');
    Route::post('tatus/tagihan/{tagihan}/update', [TatusTagihanController::class, 'update'])->name('tatus/tagihan/update');
    Route::post('tatus/tagihan/{tagihan}/destroy', [TatusTagihanController::class, 'destroy'])->name('tatus/tagihan/destroy');

    // Kelas
    Route::get('tatus/kelas/index', [TatusKelasController::class, 'index'])->name('tatus/kelas/index');
    Route::get('tatus/kelas/create', [TatusKelasController::class, 'create'])->name('tatus/kelas/create');
    Route::post('tatus/kelas/store', [TatusKelasController::class, 'store'])->name('tatus/kelas/store');
    Route::get('tatus/kelas/{kelas}/edit', [TatusKelasController::class, 'edit'])->name('tatus/kelas/edit');
    Route::post('tatus/kelas/{kelas}/update', [TatusKelasController::class, 'update'])->name('tatus/kelas/update');
    Route::post('tatus/kelas/{kelas}/destroy', [TatusKelasController::class, 'destroy'])->name('tatus/kelas/destroy');

    // Pembayaran
    Route::get('tatus/pembayaran/index', [PembayaranController::class, 'index'])->name('tatus/pembayaran/index');
    Route::get('tatus/pembayaran/{nis}/create', [PembayaranController::class, 'create'])->name('tatus/pembayaran/create');
    Route::get('tatus/pembayaran/spp/{periode}', [PembayaranController::class, 'spp'])->name('tatus.pembayaran.spp');
    Route::post('tatus/pembayaran/store/{nis}', [PembayaranController::class, 'store'])->name('tatus/pembayaran/store');
    Route::get('tatus/histori/pembayaran', [PembayaranController::class, 'historiPembayaran'])->name('tatus/histori');

    // Status Pembayaran
    Route::get('status/show/{siswa:nis}', [PembayaranController::class, 'tatusShowStatus'])->name('status/show/tahun');
    Route::get('status/show/pembayaran/{nis}/{periode}', [PembayaranController::class, 'tatusShowPembayaran'])->name('statusBayar/siswa');

    // Laporan
    Route::get('tatus/laporan/index', [TatusLaporanController::class, 'index'])->name('tatus/laporan/index');
    Route::get('tatus/laporan/create', [TatusLaporanController::class, 'create'])->name('tatus/laporan');
    Route::post('tatus/laporan/print', [TatusLaporanController::class, 'printPDF'])->name('tatus/laporan/print');

    // Profil 
    Route::middleware(['role:tata usaha'])->get('profil/tatus', [ProfilController::class, 'index'])->name('profil/tatus');
    Route::middleware(['role:tata usaha'])->patch('pasw/update', [ProfilController::class, 'update'])->name('pasw/update');

    // {{ Route Siswa }}
    // Siswa 
    Route::get('siswa/status/pembayaran', [StatusBayarSiswaController::class, 'statusBayarSiswa'])->name('siswa/status');
    Route::get('siswa/status/show/{periode:tahun}', [StatusBayarSiswaController::class, 'statusBayarShow'])->name('siswa/status/show');
    Route::get('siswa/histori', [StatusBayarSiswaController::class, 'historiSiswa'])->name('siswa/historiPembayaran');

    Route::middleware(['role:siswa'])->get('profil/siswa', [SiswaProfilController::class, 'index'])->name('profil/siswa');
    Route::middleware(['role:siswa'])->patch('passw/update', [SiswaProfilController::class, 'update'])->name('passw/update');
});

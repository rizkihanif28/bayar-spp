<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas', 'jurusan'])
            ->first();
        $histori = Histori::latest()->get();

        return view('admins/histori/index', [
            'title' => 'Histori Pembayaran',
            'histori' => $histori,
            'siswa' => $siswa
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $tagihan = Tagihan::all();
        $histori = Histori::all();
        $transaksi = Transaksi::all();
        return view('admins/histori/index', [
            'transaksi_id' => $transaksi,
            'siswa_id' => $siswa,
            'tagihan_id' => $tagihan,
            'histori' => $histori,
            'title' => 'Histori Pembayaran'

        ]);
    }
}

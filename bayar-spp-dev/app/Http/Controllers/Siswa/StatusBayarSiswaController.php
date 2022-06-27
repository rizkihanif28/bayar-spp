<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusBayarSiswaController extends Controller
{
    public function statusBayarSiswa()
    {
        $tagihan = Tagihan::all();
        return view('siswa/statusBayar', [
            'title' => 'Status Pembayaran',
            'tagihan' => $tagihan
        ]);
    }
    public function statusBayarShow(Tagihan $tagihan)
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)
            ->first();

        $transaksi = Transaksi::with(['siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $tagihan->periode)
            ->oldest()
            ->get();

        return view('siswa/statusBayarShow', [
            'title' => 'Status Pembayaran Siswa',
            'siswa' => $siswa,
            'tagihan' => $tagihan,
            'transaksi' => $transaksi
        ]);
    }
}

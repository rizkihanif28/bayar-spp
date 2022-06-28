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
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();
        return view('siswa/statusBayar', [
            'title' => 'Status Pembayaran',
            'tagihan' => $tagihan,
            'siswa' => $siswa
        ]);
    }
    public function statusBayarShow($periode)
    {
        $tagihan = Tagihan::where('periode', $periode)
            ->first();
        $siswa = Siswa::where('user_id', Auth::user()->id)
            ->first();

        $transaksi = Transaksi::with(['siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $tagihan->periode)
            ->oldest()
            ->get();

        return view('siswa/statusBayarShow', [
            'title' => 'Status Pembayaran Show',
            'transaksi' => $transaksi,
            'siswa' => $siswa,
            'tagihan' => $tagihan
        ]);
    }

    public function historiSiswa()
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();

        $transaksi = Transaksi::with(['petugas', 'siswa' => function ($query) {
            $query->with('kelas');
        }])
            ->where('siswa_id', $siswa->id)
            ->latest()->get();

        return view('siswa/historiSiswa', [
            'title' => 'Histori Pembayaran',
            'transaksi' => $transaksi,
            'siswa' => $siswa
        ]);
    }
}

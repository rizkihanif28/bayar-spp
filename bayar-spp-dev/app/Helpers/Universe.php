<?php

namespace App\Helpers;

use App\Models\Siswa;
use App\Models\Tatus;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

// if (!function_exists('format_idr')) {
// 	function format_idr($val)
// 	{
// 		return number_format($val, 0, ',', '.');
// 	}
// }

class Universe
{
    public function Tatus()
    {
        return Tatus::where('user_id', Auth::user()->id)->first();
    }

    public function siswa()
    {
        return Siswa::where('user_id', Auth::user()->id)->first();
    }

    public static function bulanAll()
    {
        return collect([
            [
                'nama_bulan' => 'Januari',
                'kode_bulan' => '01',
            ],
            [
                'nama_bulan' => 'Februari',
                'kode_bulan' => '02',
            ],
            [
                'nama_bulan' => 'Maret',
                'kode_bulan' => '03',
            ],
            [
                'nama_bulan' => 'April',
                'kode_bulan' => '04',
            ],
            [
                'nama_bulan' => 'Mei',
                'kode_bulan' => '05',
            ],
            [
                'nama_bulan' => 'Juni',
                'kode_bulan' => '06',
            ],
            [
                'nama_bulan' => 'Juli',
                'kode_bulan' => '07',
            ],
            [
                'nama_bulan' => 'Agustus',
                'kode_bulan' => '08',
            ],
            [
                'nama_bulan' => 'September',
                'kode_bulan' => '09',
            ],
            [
                'nama_bulan' => 'Oktober',
                'kode_bulan' => '10',
            ],
            [
                'nama_bulan' => 'November',
                'kode_bulan' => '11',
            ],
            [
                'nama_bulan' => 'Desember',
                'kode_bulan' => '12',
            ],
        ]);
    }

    // cek status pembayaran (di akses oleh siswa)
    public function statusPembayaranBulan($bulan, $tagihan_periode)
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)
            ->first();

        $transaksi = Transaksi::where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $tagihan_periode)
            ->oldest()
            ->pluck('bulan_bayar')
            ->toArray();

        foreach ($transaksi as $key => $bayar) {
            if ($bayar == $bulan) {
                return "LUNAS";
            }
        }
        return "BELUM LUNAS";
    }

    // cek status pembayaran (di akses oleh petugas)
    public function petugasStatusPembayaran($siswa_id, $periode, $bulan)
    {
        $transaksi = Transaksi::where('siswa_id', $siswa_id)
            ->where('tahun_bayar', $periode)
            ->oldest()
            ->pluck('bulan_bayar')
            ->toArray();

        foreach ($transaksi as $key => $bayar) {
            if ($bayar == $bulan) {
                return "LUNAS";
            }
        }
        return "BELUM LUNAS";
    }
}

<?php

namespace App\Helpers;

use App\Models\Tatus;
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
}

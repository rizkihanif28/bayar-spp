<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBayar;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DataBayarController extends Controller
{
    public function index()
    {
        $pembayaran = Transaksi::all();
        $siswa = Siswa::all();
        $databayar = DataBayar::all();
        return view('admins/databayar/index', [
            'pembayaran' => $pembayaran,
            'siswa' => $siswa,
            'data_bayar' => $databayar,
            'title' => 'Data Pembayaran'
        ]);
    }
}

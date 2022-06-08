<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function index()
    {
        $histori = Histori::latest()->get();

        return view('admins/histori/index', [
            'title' => 'Histori Pembayaran',
            'histori' => $histori
        ]);
    }
}

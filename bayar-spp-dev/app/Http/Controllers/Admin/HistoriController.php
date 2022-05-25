<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;

class HistoriController extends Controller
{
    public function index()
    {
        $histori = Histori::orderBy('created_at', 'desc');
        return view('admins/histori/index', [
            'histori' => $histori,
            'title' => 'Histori Pembayaran'
        ]);
    }
}

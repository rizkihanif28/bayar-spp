<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DetyarController extends Controller
{
    public function index()
    {
        $bayar = Pembayaran::latest();

        if (request('search')) {
            $bayar->where('nis', 'like', '%', request('search') . '%');
        }
        return view('admin/detail-pembayaran', [
            "title" => "Detail Pembayaran",
            'bayar' => $bayar->get()
        ]);
    }
}

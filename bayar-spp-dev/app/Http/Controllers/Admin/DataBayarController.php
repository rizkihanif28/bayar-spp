<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataBayar;
use Illuminate\Http\Request;

class DataBayarController extends Controller
{
    public function index()
    {
        $data_bayar = DataBayar::all();
        return view('admins/data-bayar/index', [
            'data-bayar' => $data_bayar,
            'title' => 'Data Pembayaran'
        ]);
    }
}

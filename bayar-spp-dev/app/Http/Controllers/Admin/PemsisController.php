<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PemsisController extends Controller
{
    public function index()
    {


        return view('admin/pembayaran-search', [
            'title' => 'Pembayaran'
        ]);
    }

    // public function show(Request $request, $nis)
    // {
    //     $siswa = Siswa::find($nis);

    //     if ($siswa) {
    //         return redirect('admin/detail-pembayaran', [
    //             'title' => 'Detail Pembayaran'
    //         ]);
    //     }
    //     return view('admin/pembayaran-siswa', [
    //         'title' => 'Pembayaran Siswa'
    //     ]);
    // }
}

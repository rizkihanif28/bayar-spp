<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas', 'jurusan'])
            ->first();
        $histori = Histori::latest()->get();

        return view('admins/laporan/index', [
            'title' => 'Laporan',
            'histori' => $histori,
            'siswa' => $siswa
        ]);
    }

    public function create()
    {
        return view('admins/laporan/form', [
            'title' => 'Print Laporan',
        ]);
    }

    public function print()
    {
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LaporanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas'])
            ->first();
        $transaksi = Transaksi::latest()->get();

        return view('admins/laporan/index', [
            'title' => 'Laporan',
            'transaksi' => $transaksi,
            'siswa' => $siswa
        ]);
    }

    public function create()
    {
        return view('admins/laporan/form', [
            'title' => 'Print Laporan',
        ]);
    }

    public function printPDF(Request $request)
    {
        $tanggal = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $data['transaksi'] = Transaksi::with(['petugas', 'siswa'])
            ->whereBetween('tanggal_bayar', $tanggal)->get();

        if ($data['transaksi']->count() > 0) {
            $pdf = PDF::loadView('admins/laporan/hasil-pdf', $data);
            return $pdf->download(
                'pembayaran-spp- ' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') . '-' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') .
                    Str::random(9) . '.pdf'
            );
        } else {
            return back(
                'error',
                'Data Pembayaran SPP Tanggal ' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') . 'Sampai dengan' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') . 'Tidak tersedia'
            );
        }
    }
}

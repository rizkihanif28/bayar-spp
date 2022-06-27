<?php

namespace App\Http\Controllers\Tatus;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas'])
            ->first();
        $transaksi = Transaksi::latest()->get();

        return view('tatus/laporan/index', [
            'title' => 'Laporan',
            'transaksi' => $transaksi,
            'siswa' => $siswa
        ]);
    }

    public function create()
    {
        return view('tatus/laporan/form', [
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
            $pdf = FacadePdf::loadView('tatus/laporan/printpdf', $data);
            return $pdf->download(
                'SPP-WJ ' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') . '-' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') .
                    '.pdf'
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

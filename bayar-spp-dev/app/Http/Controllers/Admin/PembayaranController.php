<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa', 'asc')->get();
        return view('admins/pembayaran/index', [
            'title' => 'Pembayaran',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nis)
    {
        $siswa = Siswa::with(['kelas'])
            ->where('nis', $nis)
            ->first();

        $tagihan = Tagihan::all();

        return view('admins/pembayaran/form', [
            'title' => 'Create Pembayaran',
            'siswa' => $siswa,
            'tagihan' => $tagihan
        ]);
    }

    public function spp($periode)
    {
        $tagihan = Tagihan::where('periode', $periode)
            ->first();

        return response()->json([
            'data' => $tagihan,
            'nominal_rupiah' => 'Rp ' . number_format($tagihan->nominal, 0, 2, '.')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_bayar' => 'required',
        ], [
            'jumlah_bayar.required' => 'jumlah tidak boleh kosong!'
        ]);

        $petugas = Petugas::where('user_id', Auth::user()->id)->first();

        $transaksi = Transaksi::whereIn('bulan_bayar', $request->bulan_bayar)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->where('siswa_id', $request->siswa_id)
            ->pluck('bulan_bayar')
            ->toArray();

        if (!$transaksi) {
            DB::transaction(function () use ($request, $petugas) {
                foreach ($request->bulan_bayar as $bulan) {
                    Transaksi::create([
                        'kode_pembayaran' => 'SPPWJ-' . Str::upper(Str::random(4)),
                        'petugas_id' => $petugas->id,
                        'siswa_id' => $request->siswa_id,
                        'nis' => $request->nis,
                        'tanggal_bayar' => Carbon::now('Asia/Jakarta'),
                        'tahun_bayar' => $request->tahun_bayar,
                        'bulan_bayar' => $bulan,
                        'jumlah_bayar' => $request->jumlah_bayar
                    ]);
                }
            });

            return redirect()->route('histori/pembayaran')
                ->with('success', 'Pembayaran berhasil!');
        } else {
            return back()
                ->with('error', 'Siswa dengan Nama : ' . $request->nama_siswa . ', NIS : ' .
                    $request->nis . ' Sudah membayar spp di bulan yang di input (' . implode($transaksi,) . ")" .
                    ' Pembayaran dibatalkan!');
        }
    }

    public function statusPembayaranShow(Siswa $siswa)
    {
        $tagihan = Tagihan::all();
        return view('admins/status-pembayaran/tahun', [
            'title' => 'Status Pembayaran Tahun',
            'tagihan' => $tagihan,
            'siswa' => $siswa
        ]);
    }

    public function statusPembayaranShowStatus($nis, $periode)
    {
        $siswa = Siswa::where('nis', $nis)
            ->first();
        $tagihan = Tagihan::where('periode', $periode)
            ->first();

        $transaksi = Transaksi::with(['siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $tagihan->periode)
            ->get();

        return view('admins/status-pembayaran/show', [
            'title' => 'Status Pembayaran Siswa',
            'siswa' => $siswa,
            'tagihan' => $tagihan,
            'transaksi' => $transaksi
        ]);
    }

    public function historiPembayaran()
    {
        $siswa = Siswa::all()->first();
        $transaksi = Transaksi::with(['petugas', 'siswa' => function ($query) {
            $query->with('kelas');
        }])
            ->latest()->get();

        return view('admins/histori/index', [
            'title' => 'Histori Pembayaran',
            'transaksi' => $transaksi,
            'siswa' => $siswa
        ]);
    }
}

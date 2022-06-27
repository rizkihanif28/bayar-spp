<?php

namespace App\Http\Controllers\Tatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use App\Models\Petugas;
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
        return view('tatus/pembayaran/index', [
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

        return view('tatus/pembayaran/form', [
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

            return redirect()->route('tatus/histori')
                ->with('success', 'Pembayaran berhasil!');
        } else {
            return back()
                ->with('error', 'Siswa dengan Nama : ' . $request->nama_siswa . ', NIS : ' .
                    $request->nis . ' Sudah membayar spp di bulan yang di input (' . implode($transaksi,) . ")" .
                    ' Pembayaran dibatalkan!');
        }
    }
    public function tatusShowStatus(Siswa $siswa)
    {
        $tagihan = Tagihan::all();
        return view('tatus/status-pembayaran/tahun', [
            'title' => 'Status Pembayaran Tahun',
            'tagihan' => $tagihan,
            'siswa' => $siswa
        ]);
    }

    public function tatusShowPembayaran($nis, $periode)
    {
        $siswa = Siswa::where('nis', $nis)
            ->first();
        $tagihan = Tagihan::where('periode', $periode)
            ->first();

        $transaksi = Transaksi::with(['siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $tagihan->periode)
            ->get();

        return view('tatus/status-pembayaran/show', [
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

        return view('tatus/histori/index', [
            'title' => 'Histori Pembayaran',
            'transaksi' => $transaksi,
            'siswa' => $siswa
        ]);
    }
}

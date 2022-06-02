<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tatus;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\Universe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Trait_;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admins/pembayaran/index', [
            'siswa' => $siswa,
            'title' => 'Pembayaran'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tatus = Tatus::all()->first();
        $siswa = Siswa::all()->first();
        $tagihan = Tagihan::all();
        $jurusan = Jurusan::all()->first();

        return view('admins/pembayaran/form', [
            'title' => 'Create Pembayaran',
            'tatus' => $tatus,
            'siswa' => $siswa,
            'tagihan' => $tagihan,
            'jurusan' => $jurusan
        ]);
    }

    public function spp($periode)
    {
        $tagihan = Tagihan::where('periode', $periode)
            ->first();

        return response()->json([
            'data' => $tagihan,
            'jumlah_rupiah' => 'Rp' . number_format($tagihan->jumlah, 0, 2, '.'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Siswa $siswa)
    {
        DB::beginTransaction();

        // buat transaksi
        $transaksi = Transaksi::make([
            'siswa_id' => $siswa->id,
            'tagihan_id' => $request->tagihan_id,
            'periode_id' => $request->periode_id,
            'tanggal_bayar' => Carbon::now('Asia/Jakarta')
        ]);

        if ($transaksi->save()) {
            $histori = Histori::orderBy('created_at', 'desc')->first();

            $histori = Histori::create([
                'transaksi_id' => $transaksi->id,
                'siswa_id' => $siswa->id,
                'tagihan_id' => $request->tagihan_id,
                'periode_id' => $request->periode_id,
                'tanggal_bayar' => $request->tanggal_bayar
            ]);

            if ($histori) {
                DB::commit();
                dd($histori);
                // return redirect()->route('admins/histori/index',[

                // ]);
            } else {
                DB::rollBack();
                return redirect()->route('admins/pembayaran/index', [
                    'type' => 'danger',
                    'msg' => 'transaksi gagal'
                ]);
            }
        }

        // $pembayaran = Transaksi::whereIn('bulan_bayar', $request->bulan_bayar)
        //     ->pluck('bulan_bayar')
        //     ->where('siswa_id', $request->siswa_id)
        //     ->where('tagihan_id', $request->tagihan_id)
        //     ->toArray();


        // if (!$pembayaran) {
        //     DB::transaction(function () use ($request) {
        //         foreach ($request->bulan_bayar as $bulan) {
        //             Transaksi::create([
        //                 'tu_id' => $request->tu_id,
        //                 'siswa_id' => $request->siswa_id,
        //                 'tagihan_id' => $request->tagihan_id,
        //                 'nis' => $request->nis,
        //                 'periode_id' => $request->periode_id,
        //                 'bulan_bayar' => $bulan,
        //                 'tanggal_bayar' => Carbon::now('Asia/Jakarta')
        //             ]);
        //         }
        //     });
        //     return redirect()->route('admins/pembayaran/histori', [
        //         'type' => 'success',
        //         'msg' => 'Transaksi berhasil'
        //     ]);
        // } else {
        //     return back()->with([
        //         'type' => 'danger',
        //         'msg' => 'Transaksi gagal'
        //     ]);
        // }
    }


    // public function getHistori(Request $request)
    // {
    //     $histori = Transaksi::all();
    //     $siswa = Siswa::with(['siswa', 'kelas', 'periode']);
    //     $kelas = Kelas::all();
    //     $periode = Periode::all();

    //     if ($request->$histori) {
    //         return view('admins/histori/index', [
    //             'title' => 'Data Transaksi',
    //             'histori' => $histori,
    //             'siswa' => $siswa,
    //             'kelas' => $kelas,
    //             'periode' => $periode
    //         ]);
    //     } else {
    //         dd($histori);
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tagihan(Siswa $siswa)
    {
        $tagihan = $this->getTagihan($siswa);
        return response()->json($tagihan);
    }

    protected function getTagihan()
    {
        $tagihan_wajib = Tagihan::where('wajib_semua', '1')->get()->toArray();
        $tagihan = array_merge($tagihan_wajib);

        return $tagihan;
    }
}

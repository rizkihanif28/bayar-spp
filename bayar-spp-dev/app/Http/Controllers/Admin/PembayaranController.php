<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tatus;
use App\Models\Transaksi;
use Illuminate\Http\Request;
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
    public function create(Tatus $tatus, $id)
    {
        $siswa = Siswa::all()->first();
        $periode = Periode::all();
        $tagihan = Tagihan::all();
        return view('admins/pembayaran/form', [
            'title' => 'Create Pembayaran',
            'siswa' => $siswa,
            'periode' => $periode,
            'tagihan' => $tagihan
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
        // $siswa = Siswa::all();
        // $tatus = Tatus::all();
        // $tagihan = Tagihan::all();
        // $periode = Periode::all();

        $pembayaran = Transaksi::with(['tatus', $request->tu_id])
            ->where('siswa_id', $request->siswa_id)
            ->where('tagihan_id', $request->tagihan_id)
            ->where('periode_id', $request->periode_id)
            ->toArray();

        if (!$pembayaran) {
            DB::transaction(function () use ($request) {
                Transaksi::create([
                    'tu_id' => $request->tu_id,
                    'siswa_id' => $request->siswa_id,
                    'tagihan_id' => $request->tagihan_id,
                    'periode_id' => $request->periode_id,
                    'nis' => $request->nis,
                    'tanggal_bayar' => $request->tanggal_bayar

                ]);
            });

            return redirect()->route('admins/pembayaran/histori', [
                'type' => 'success',
                'msg' => 'Transaksi berhasil'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'msg' => 'Transaksi gagal'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getHistori()
    {
        //
    }

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

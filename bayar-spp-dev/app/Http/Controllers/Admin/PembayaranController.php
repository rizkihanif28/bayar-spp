<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
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
        $transaksi = Transaksi::all();
        return view('admins/pembayaran/index', [
            'siswa' => $siswa,
            'transaksi' => $transaksi,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Siswa $siswa, Tatus $tatus)
    {
        DB::beginTransaction();
        // mulai transaksi, membersihkan request->jumlah dari titik dan koma
        $jumlah = preg_replace("/[,.]/", "", $request->jumlah);

        // membuat transaksi baru
        $transaksi = Transaksi::make([
            'tu_id' => $tatus,
            'siswa_id' => $siswa->id,
            'tagihan_id' => $request->tagihan_id,
            'is_lunas' => 1
        ]);

        // menyimpan transaksi
        if ($transaksi->save()) {
            $histori = Histori::create([
                'transaksi_id' => $transaksi->id,
                'jumlah' => $jumlah
            ]);
        }

        if ($histori) {
            DB::commit();
            return response()->json(['msg' => 'Transaksi berhasil dilakukan']);
        } else {
            DB::rollBack();
            return redirect()->route('admins/pembayaran/index')->with([
                'type' => 'danger',
                'msg' => 'Terjadi kesalahan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

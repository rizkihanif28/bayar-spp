<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use App\Models\Tatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihan = Tagihan::all();
        return view('admins/tagihan/index', [
            'tagihan' => $tagihan,
            'title' => 'Tagihan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tatus = Tatus::all();
        return view('admins/tagihan/form', [
            'tatus' => $tatus,
            'title' => 'Tambah Tagihan'
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
            'tu_id' => 'required|max:255',
            'nama' => 'required|max:255',
            'jumlah' => 'required|numeric',
            'peserta' => 'required|numeric'
        ]);
        $tagihan = Tagihan::make($request->input());

        switch ($request->peserta) {
            case 1: // semua
                $tagihan->wajib_semua = 1;
                break;
            default:
                return Redirect::back()->withErrors(['Peserta Wajib diisi']);
        }

        if ($tagihan->save()) {
            return redirect()->route('admins/tagihan/index',)->with([
                'type' => 'success',
                'msg' => 'Tagihan berhasil ditambahkan'
            ]);
        } else {
            return redirect()->route('admins/tagihan/index')->with([
                'type' => 'danger',
                'msg' => 'Tagihan gagal ditambahkan'
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
    public function edit(Tagihan $tagihan)
    {
        $tatus = Tatus::all();

        return view('admins/tagihan/form', [
            'tatus' => $tatus,
            'tagihan' => $tagihan,
            'title' => 'Edit Tagihan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        $request->validate([
            'tu_id' => 'required|max:255',
            'nama' => 'required|max:255',
            'jumlah' => 'required|numeric',
            'peserta' => 'required|numeric'
        ]);

        $tagihan = $tagihan->fill($request->input());

        if ($tagihan->save()) {
            return redirect()->route('admins/tagihan/index')->with([
                'type' => 'success',
                'msg' => 'Tagihan diubah'
            ]);
        } else {
            return redirect()->route('admins/tagihan/index')->with([
                'type' => 'danger',
                'msg' => 'Tagihan gagal diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        if ($tagihan->delete()) {
            return redirect()->route('admins/tagihan/index')->with([
                'type' => 'success',
                'msg' => 'Siswa dihapus'
            ]);
        } else {
            return redirect()->route('admins/tagihan/index')->with([
                'type' => 'danger',
                'msg' => 'Siswa dihapus'
            ]);
        }
    }
}

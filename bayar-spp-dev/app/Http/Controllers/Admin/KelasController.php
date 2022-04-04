<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Periode;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admins/kelas/index', [
            'kelas' => $kelas,
            'title' => 'Kelas'
        ]);
    }

    public function create()
    {
        $periode = Periode::all();
        return view('admins/kelas/form', [
            'periode' => $periode,
            'title' => 'Tambah Kelas'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_id' => 'nullable|numeric',
            'nama' => 'required|max:255',
        ]);

        if (Kelas::create($request->input())) {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'success',
                'msg' => 'Kelas ditambahkan'
            ]);
        } else {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        $periode = Periode::all();
        return view('admins/kelas/form', [
            'periode' => $periode,
            'kelas' => $kelas,
            'title' => 'Edit Kelas'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'periode_id' => 'nullable|numeric',
            'nama' => 'required|max:255',
        ]);

        if ($kelas->fill($request->input())->save()) {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'success',
                'msg' => 'Kelas diubah'
            ]);
        } else {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        if ($kelas->siswa->count() != 0) {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'danger',
                'msg' => 'Tidak dapat menghapus kelas yang memiliki siswa'
            ]);
        }
        if ($kelas->delete()) {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'success',
                'msg' => 'Kelas dihapus'
            ]);
        } else {
            return redirect()->route('admins/kelas/index')->with([
                'type' => 'danger',
                'msg' => 'Kelas gagal dihapus'
            ]);
        }
    }
}

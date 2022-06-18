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
        $kelas = Kelas::orderBy('jurusan', 'asc')->get();
        return view('admins/kelas/index', [
            'kelas' => $kelas,
            'title' => 'Kelas'
        ]);
    }

    public function create()
    {
        $kelas = Kelas::where('jurusan')->first();
        return view('admins/kelas/form', [
            'kelas' => $kelas,
            'title' => 'Tambah Kelas'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|max:255',
            'jurusan' => 'required|max:255',
        ]);

        if (Kelas::create($request->input())) {
            return redirect()->route('admins/kelas/index')
                ->with('success', 'Kelas berhasil di tambahkan!');
        } else {
            return redirect()->route('admins/kelas/index')
                ->with('error', 'Kelas gagal di tambahkan!');
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
        return view('admins/kelas/form', [
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
            'nama_kelas' => 'required|max:255',
            'jurusan' => 'required|max:255',
        ]);

        if ($kelas->fill($request->input())->save()) {
            return redirect()->route('admins/kelas/index')
                ->with('success', 'Kelas berhasil di ubah!');
        } else {
            return redirect()->route('admins/kelas/index')
                ->with('error', 'Kelas gagal di ubah!');
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
            return redirect()->route('admins/kelas/index')
                ->with('success', 'Kelas berhasil di hapus!');
        } else {
            return redirect()->route('admins/kelas/index')
                ->with('error', 'Kelas gagal ditambahkan');;
        }
    }
}

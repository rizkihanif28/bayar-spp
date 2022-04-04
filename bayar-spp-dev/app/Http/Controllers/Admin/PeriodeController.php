<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periode = Periode::all();
        return view('admins/periode/index', [
            'periode' => $periode,
            'title' => 'Periode'
        ]);
    }

    public function create()
    {
        return view('admins/periode/form', [
            'title' => 'Tambah Periode'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'max:255'],
            'tgl_mulai' => 'required|date|before:' . $request->tgl_selesai,
            'tgl_selesai' => ['required', 'date'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $periode = Periode::make($request->input());

        if ($request->is_active == null) {
            $periode->is_active = 0;
        }

        if ($periode->save()) {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'success',
                'msg' => 'Periode ditambahkan',
            ]);
        } else {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'danger',
                'msg' => 'Periode gagal ditambahkan',
            ]);
        }
    }

    public function edit(Periode $periode)
    {
        return view('admins/periode/form', [
            'periode' => $periode,
            'title' => 'Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tgl_mulai' => 'required|date|before:' . $request->tgl_selesai,
            'tgl_selesai' => 'required|date',
            'is_active' => 'nullable|boolean',
        ]);

        $periode->fill($request->input());

        if ($request->is_active == null) {
            $periode->is_active = 0;
        }

        if ($periode->save()) {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'success',
                'msg' => 'Periode diubah'
            ]);
        } else {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'danger',
                'msg' => 'Periode gagal diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        if ($periode->kelas->count() != 0) {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'danger',
                'msg' => 'Tidak dapat menghapus periode yang memiliki kelas'
            ]);
        }
        if ($periode->delete()) {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'success',
                'msg' => 'Periode dihapus'
            ]);
        } else {
            return redirect()->route('admins/periode/index')->with([
                'type' => 'danger',
                'msg' => 'Periode gagal dihapus'
            ]);
        }
    }
}

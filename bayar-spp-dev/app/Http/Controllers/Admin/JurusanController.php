<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan =  Jurusan::all();
        return view('admins/jurusan/index', [
            'jurusan' => $jurusan,
            'title' => 'Jurusan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/jurusan/form', [
            'title' => 'Tambah Jurusan'
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
            'nama' => ['required', 'max:255']
        ]);

        $jurusan = Jurusan::make($request->input());

        if ($jurusan->save()) {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'success',
                'msg' => 'Jurusan berhasil ditambahkan'
            ]);
        } else {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'danger',
                'msg' => 'Jurusan gagal ditambahkan'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('admins/jurusan/form', [
            'jurusan' => $jurusan,
            'title' => 'Edit Jurusan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama' => ['required', 'max:255']
        ]);

        if ($jurusan->fill($request->input())->save()) {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'success',
                'msg' => "Jurusan diubah"
            ]);
        } else {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'success',
                'msg' => "Jurusan gagal diubah"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {

        if ($jurusan->delete()) {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'success',
                'msg' => 'Jurusan dihapus'
            ]);
        } else {
            return redirect()->route('admins/jurusan/index')->with([
                'type' => 'danger',
                'msg' => 'Jurusan gagal dihapus'
            ]);
        }
    }
}

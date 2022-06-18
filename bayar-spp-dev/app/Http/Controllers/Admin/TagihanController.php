<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
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
        return view('admins/tagihan/form', [
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
            'periode' => 'required',
            'nominal' => 'required',
        ]);
        $tagihan = Tagihan::make($request->input());

        if ($tagihan->save()) {
            return redirect()->route('admins/tagihan/index',)
                ->with('success', 'Tagihan berhasil di tambahkan!');
        } else {
            return redirect()->route('admins/tagihan/index')
                ->with('erorr', 'Tagihan gagal ditambahkan!');
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
        return view('admins/tagihan/form', [
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
            'periode' => 'required',
            'nominal' => 'required'
        ]);

        $tagihan = $tagihan->fill($request->input());

        if ($tagihan->save()) {
            return redirect()->route('admins/tagihan/index')
                ->with('success', 'Tagihan diubah');
        } else {
            return redirect()->route('admins/tagihan/index')
                ->with('error', 'Tagihan gagal diubah');
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
            return redirect()->route('admins/tagihan/index')
                ->with('success', 'Tagihan dihapus');
        } else {
            return redirect()->route('admins/tagihan/index')
                ->with('error', 'Tagihan dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;

class DasusController extends Controller
{
    public function index()
    {
        return view('admin/daftar-siswa');
    }

    public function create()
    {
        return view('admin/create-siswa');
    }

    public function store(Request $request)
    {
        $validateData = validator::make(
            $request->all(),
            [
                'siswa_id' => ['required', 'unique:siswas', 'min:3'],
                'nis' => ['required', 'unique:siswas', 'min:5'],
                'nama' => ['required', 'max:255'],
                'email' => ['required', 'email:dns', 'unique:siswas'],
                'jenis_kelamin' => ['required'],
                'kelas' => ['required'],
                'jurusan' => ['required'],
                'alamat' => ['required', 'max:255'],
                'telepon' => ['required'],
            ]
        );

        if ($validateData->fails()) {
            return redirect()->route('admin/daftar-siswa');
        }

        return Siswa::create([
            'siswa_id' => $request->siswa_id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);
    }
}

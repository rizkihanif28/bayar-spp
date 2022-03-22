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
        return view('admin/daftar-siswa', [
            "title" => "Data Siswa"
        ]);
    }

    public function read()
    {
        $data = Siswa::all();
        return view('admin/read-siswa')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin/create-siswa');
    }

    public function store(Request $request)
    {
        $data['siswa_id'] = $request->siswa_id;
        $data['nis'] = $request->nis;
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['kelas'] = $request->kelas;
        $data['jurusan'] = $request->jurusan;
        $data['alamat'] = $request->alamat;
        $data['telepon'] = $request->telepon;

        Siswa::create($data);
    }
}

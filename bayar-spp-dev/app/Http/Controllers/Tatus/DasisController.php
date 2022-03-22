<?php

namespace App\Http\Controllers\Tatus;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use DataTables;
use Illuminate\Http\Request;

class DasisController extends Controller
{
    public function index(Request $request)
    {
        $data = Siswa::get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->make(true);
        }

        return view('tatus/daftar-siswa', [
            "title" => "Data Siswa"
        ]);
    }

    // public function read()
    // {
    //     $data = Siswa::all();
    //     return view('tatus/read-siswa')->with([
    //         'data' => $data
    //     ]);
    // }

    // public function create()
    // {
    //     return view('tatus/create-siswa');
    // }

    // public function store(Request $request)
    // {
    //     $data['siswa_id'] = $request->siswa_id;
    //     $data['nis'] = $request->nis;
    //     $data['nama'] = $request->nama;
    //     $data['email'] = $request->email;
    //     $data['jenis_kelamin'] = $request->jenis_kelamin;
    //     $data['kelas'] = $request->kelas;
    //     $data['jurusan'] = $request->jurusan;
    //     $data['alamat'] = $request->alamat;
    //     $data['telepon'] = $request->telepon;

    //     Siswa::create($data);
    // }
}

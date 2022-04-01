<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Siswa::all();
        return view('admins/siswa/index', [
            'siswa' => $siswa,
            'title' => 'Siswa'
        ]);
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admins/siswa/form', [
            'kelas' => $kelas,
            'title' => 'Tambah Siswa'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => ['required', 'numeric'],
            'kelas_id' => ['required', 'numeric'],
            'nama' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'email:rfc,dns', 'unique:users', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'telepon' => ['required', 'numeric', 'max:12'],
        ]);

        $siswa = Siswa::make($request->input());

        if ($siswa->save()) {
            return redirect()->route('admins/siswa/index')->with([
                'type' => 'success',
                'msg' => 'Siswa berhasil ditambahkan',
            ]);
        } else {
            return redirect()->route('admins/siswa/index')->with([
                'type' => 'danger',
                'msg' => 'Siswa gagal ditambahkan',
            ]);
        }
    }
}

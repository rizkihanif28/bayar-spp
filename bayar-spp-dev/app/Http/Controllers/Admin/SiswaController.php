<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa', 'asc')->get();
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
        $validator = Validator::make($request->all(), [
            'kelas_id' => 'required',
            'username' => 'required|unique:users',
            'nis' => 'required|numeric',
            'nama_siswa' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:siswas|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        if ($validator->fails()) {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => ($request->nama_siswa),
                    'username' => ($request->username) . Str::lower(Str::random(5)),
                    'email' => Str::lower($request->email),
                    'password' => Hash::make('123'),
                ]);
                $user->assignRole('siswa');

                Siswa::create([
                    'user_id' => $user->id,
                    'nis' => $request->nis,
                    'nama_siswa' => $request->nama_siswa,
                    'kelas_id' => $request->kelas_id,
                    'email' => $request->email,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                ]);
            });
            return redirect()->route('admins/siswa/index')
                ->with('success', 'Siswa berhasil di tambahkan!');
        } else {
            return redirect()->route('admins/siswa/index')
                ->with('error', 'Siswa gagal di tambahkan!');
        }
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();

        return view('admins/siswa/form', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'title' => 'Edit Siswa'
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'kelas_id' => 'required|numeric',
            'nis' => 'required',
            'nama_siswa' => 'required|max:255',
            'email' => 'required|max:255',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable',
            'telepon' => 'nullable|numeric',
        ]);

        if ($siswa->fill($request->input())->save()) {
            return redirect()->route('admins/siswa/index',)
                ->with('success', 'Siswa berhasil di ubah!');
        } else {
            return redirect()->route('admins/siswa/index')
                ->with('error', 'Siswa gagal di ubah!');
        }
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->delete()) {
            return redirect()->route('admins/siswa/index')
                ->with('success', 'Siswa berhasil di hapus!');
        } else {
            return redirect()->route('admins/siswa/index')
                ->with('error', 'Siswa gagal di hapus!');
        }
    }
}

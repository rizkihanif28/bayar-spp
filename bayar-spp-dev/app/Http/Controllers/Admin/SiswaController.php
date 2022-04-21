<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

use function PHPSTORM_META\type;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('admins/siswa/index', [
            'siswa' => $siswa,
            'title' => 'Siswa'
        ]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('admins/siswa/form', [
            'jurusan' => $jurusan,
            'kelas' => $kelas,
            'title' => 'Tambah Siswa'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required|numeric',
            'kelas_id' => 'required|numeric',
            'nis' => 'required|numeric',
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:siswas|max:255',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable',
            'telepon' => 'nullable|numeric',
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

    public function edit(Siswa $siswa)
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();

        return view('admins/siswa/form', [
            'jurusan' => $jurusan,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'title' => 'Edit Siswa'
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'jurusan_id' => 'required|numeric',
            'kelas_id' => 'required|numeric',
            'nis' => 'required',
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:siswas|max:255',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable',
            'telepon' => 'nullable|numeric',
        ]);

        $siswa = $siswa->fill($request->input());

        if ($siswa->save()) {
            return redirect()->route('admins/siswa/index', [
                'type' => 'Success',
                'msg' => 'Siswa diubah'
            ]);
        } else {
            return redirect()->route('admins/siswa/index', [
                'type' => 'danger',
                'msg' => 'Siswa gagal diubah'
            ]);
        }
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->delete()) {
            return redirect()->route('admins/siswa/index')->with([
                'type' => 'success',
                'msg' => 'Siswa dihapus'
            ]);
        } else {
            return redirect()->route('admins/siswa/index')->with([
                'type' => 'danger',
                'msg' => 'Siswa gagal dihapus'
            ]);
        }
    }

    // api load
    public function getLoad(Siswa $siswa)
    {
        if ($siswa == null) {
            return response()->json(['msg' => 'siswa tidak ditemukan'], 404);
        }
    }

    public function getTagihan(Siswa $siswa)
    {
        $tagihan = [];
        $tagihan_ids = [];

        // wajib_semua
        $tagihan_wajib = Tagihan::where('wajib_semua', '1')->get()->toArray();

        $tagihan_semua = array_merge($tagihan_wajib);

        foreach ($tagihan_semua as $tagih) {
            $tagihan_ids[] = $tagih['id'];
            $payed = Transaksi::where('tagihan_id', $tagih['id'])->where('siswa_id', $siswa->id)->get();
            if ($payed->count() == 0) {
                $tagihan[] = [
                    'nama' => $tagih['nama'],
                    'jumlah' => format_idr($tagih['jumlah']),
                    'total' => '',
                    'is_lunas' => '0',
                    'created_at' => ''
                ];
            } else {
                foreach ($payed as $pay) {
                    $tagihan[] = [
                        'nama' => $pay['nama'],
                        'jumlah' => format_idr($pay['jumlah']),
                        'total' => format_idr($pay->jumlah),
                        'is_lunas' => $pay->is_lunas,
                        'created_at' => $pay->created_at->format('d-m-Y'),
                    ];
                }
            }
        }
        return $tagihan;
    }
}

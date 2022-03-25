<?php

namespace App\Http\Controllers\Tatus;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use DataTables;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class DasisController extends Controller
{
    public function index(Request $request)
    {
        $data = Siswa::get();

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    $button = "<button class='update btn btn-success btn-sm col-9' id='" . $data->id . "'>Update</button>";
                    $button .= "<button class='delete btn btn-danger btn-sm col-9' id='" . $data->id . "'>Delete</button>";
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('tatus/daftar-siswa', [
            "title" => "Data Siswa"
        ]);
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
        // Create siswa
        $siswa =  Siswa::create($data);

        if ($siswa) {
            return response()->json([
                'data' => $data,
                'message' => 'Data berhasil di simpan'
            ], 200);
        } else {
            return response()->json([
                'data' => $data,
                'message' => 'Data berhasil di simpan'
            ], 422);
        }
    }

    public function edits(Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);

        return response()->json(['message' => $data]);
    }

    public function updates(Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);

        $datas = [
            'siswa_id' => $request->siswa_id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];
        $save = $data->update($datas);
        if ($save) {
            return response()->json([
                'message' => 'Berhasil di ubah'
            ], 200);
        } else {
            return response()->json([
                'messsage' => 'Gagal di ubah'
            ], 422);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Siswa::find($id);
        $data->delete();
        return response()->json(['message' => 'Data berhasil di hapus'], 200);
    }
}

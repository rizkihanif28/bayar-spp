@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form class="card"
                action="{{ isset($siswa) ? route('tatus/siswa/update', $siswa->id) : route('tatus/siswa/store') }}"
                method="POST">
                <div class="card-header">
                    <h5 class="card-title">Siswa</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorrs }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">NIS</label>
                                <input type="text" placeholder="NIS" name="nis" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->nis : old('nis') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="name" placeholder="Nama" name="nama_siswa" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->nama_siswa : old('nama_siswa') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kelas</label>
                                <select id="select-beast" class="form-control custom-select" name="kelas_id">
                                    <option>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($siswa) ? ($item->id == $siswa->kelas_id ? 'selected' : '') : '' }}>
                                            {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->email : old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="select-beast" class="form-control custom-select">
                                    <option>-- Jenis Kelamin --</option>
                                    <option value="L"
                                        {{ isset($siswa) ? ($siswa->jenis_kelamin == 'L' ? 'selected' : '') : '' }}>
                                        Laki-Laki</option>
                                    <option value="P"
                                        {{ isset($siswa) ? ($siswa->jenis_kelamin == 'P' ? 'selected' : '') : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label w-100">Alamat</label>
                                {{-- <textarea name="alamat" id="alamat" placeholder="Alamat" class="col-12"></textarea> --}}
                                <input placeholder="Alamat" name="alamat" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->alamat : old('alamat') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Telepon</label>
                                <input type="text" placeholder="Telepon" name="telepon" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->telepon : old('telepon') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-link">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        require(['jquery', 'selectize'], function($, selectize) {
            $(document).ready(function() {
                $('.custom-select').selectize({});
            });
        });
    </script>
@endsection

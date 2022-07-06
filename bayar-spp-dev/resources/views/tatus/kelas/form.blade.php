@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Kelas
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ isset($kelas) ? route('tatus/kelas/update', $kelas->id) : route('tatus/kelas/store') }}"
                method="post" class="card">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Kelas</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control" name="nama_kelas" placeholder="Kelas"
                                    value="{{ isset($kelas) ? $kelas->nama_kelas : old('nama_kelas') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kompetensi Keahlian</label>
                            <input type="text" class="form-control" name="jurusan" placeholder="Jurusan"
                                value="{{ isset($kelas) ? $kelas->jurusan : old('jurusan') }}" required>
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
                $('#select-beast').selectize({});
            });
        });
    </script>
@endsection

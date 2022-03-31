@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Kelas
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="{{ isset($kelas) ? route('admins/kelas/update', $kelas->id) : route('admins/kelas/store') }}"
                method="post" class="card" style="margin-top: 2%">
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
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Periode</label>
                                <select class="form-control" name="periode_id">
                                    @foreach ($periode as $item)
                                        <option value=""></option>
                                        <option value="{{ $item->id }}"
                                            {{ isset($kelas) ? ($item->id == $kelas->id ? 'selected' : '') : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama"
                                    value="{{ isset($kelas) ? $kelas->nama : old('nama') }}" required>
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
                $('#select-beast').selectize({});
            });
        });
    </script>
@endsection

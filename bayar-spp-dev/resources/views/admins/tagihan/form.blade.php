@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Tagihan
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form
                action="{{ isset($tagihan) ? route('admins/tagihan/update', $tagihan->id) : route('admins/tagihan/store') }}"
                method="POST" class="card">
                <div class="card-header">
                    <h5>Tagihan</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorr)
                                {{ $errors }} <br>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Nama Tatausaha</label>
                                <select id="select-beast" class="form-control custom-select" name="tu_id">
                                    @foreach ($tatus as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($tagihan) ? ($item->id == $tagihan->$tu_id ? 'selected' : '') : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama"
                                    value="{{ isset($tagihan) ? $tagihan->nama : old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah"
                                    value="{{ isset($tagihan) ? $tagihan->jumlah : old('jumlah') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ route('admins/tagihan/index') }}" class="btn btn-link">Batal</a>
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

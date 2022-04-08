@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Periode
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form
                action="{{ isset($periode) ? route('admins/periode/update', $periode->id) : route('admins/periode/store') }}"
                method="POST" class="card">
                <div class="card-header">
                    <h5 class="card-title">Periode</h5>
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
                            <div class="form-group mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" placeholder="Nama" name="nama" class="form-control"
                                    value="{{ isset($periode) ? $periode->nama : old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Mulai s/d Selesai</label>
                                <div class="row gutters-xs">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="tgl_mulai" data-toggle="datepicker"
                                            placeholder="Tanggal Mulai" required autocomplete="off"
                                            value="{{ isset($periode) ? $periode->tgl_mulai : old('tgl_mulai') }}">
                                    </div>
                                    <div class="col-6 mb-1">
                                        <input type="text" class="form-control" name="tgl_selesai"
                                            data-toggle="datepicker" placeholder="Tanggal Selesai" required
                                            autocomplete="off"
                                            value="{{ isset($periode) ? $periode->tgl_selesai : old('tgl_selesai') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Status</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_active" value="1" class="custom-switch-input"
                                        {{ isset($periode) ? ($periode->is_active ? 'checked' : '') : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Aktif</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ route('admins/periode/index') }}" class="btn btn-link">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        require(['jquery', 'selectize', 'datepicker'], function($, selectize) {
            $(document).ready(function() {

                $('[data-toggle="datepicker"]').datepicker({
                    format: 'yyyy-MM-dd'
                });

            });
        });
    </script>
@endsection

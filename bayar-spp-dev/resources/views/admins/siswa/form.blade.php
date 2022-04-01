@extends('layouts.app-admin')

@section('content-admin')
    <div class="row">
        <div class="col-8">
            <form class="card"
                action="{{ isset($siswa) ? route('admins/siswa/update', $siswa->id) : route('admins/siswa/create') }}"
                method="POST">
                <div class="carr-header">
                    <h5 class="card-title">Form Siswa</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorr }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" placeholder="Nama" name="nama" class="form-control"
                                    value="{{ isset($siswa) ? $siswa->nama : old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jurusan</label>
                                <select name="jurusan_id" id="select-beast" class="form-control custom-select">
                                    @foreach ($jurusan as $item)
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

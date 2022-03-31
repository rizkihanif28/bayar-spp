@extends('layouts.app-admin')

@section('content-admin')
    <div class="container">
        <h3 class="mt-3">Daftar Siswa</h3>
        <div class="row">
            <div class="col-8">
                <form action="{{ route('admin/create-siswa') }}" class="card" method="post">
                    <div class="card-header">
                        <h5 class="card-title">Siswa</h5>
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
                                    <div class="form-group mb-4">
                                        <label for="form-label">Kelas</label>
                                        <select id="select-beast" class="form-control custom-select" name="kelas_id">
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($siswa) ? ($item->id == $siswa->kelas_id ? 'selected' : '') : '' }}>
                                                    {{ $item->nama }} -
                                                    {{ isset($item->periode) ? $item->periode->nama : '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS"
                                            required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="name" name="name" class="form-control" id="name" placeholder="Nama"
                                            required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email Address" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input class="form-control" list="datalistOptions" id="jenis_kelamin"
                                            placeholder="Jenis Kelamin" required>
                                        <datalist id="datalistOptions">
                                            <option value="L">
                                            <option value="P">
                                        </datalist>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input class="form-control" list="datalistJurusan" id="jurusan"
                                            placeholder="Jurusan" required>
                                        <datalist id="datalistJurusan">
                                            <option value="Teknik Sepeda Motor">
                                            <option value="Teknik Kendaraan Ringan">
                                            <option value="Akutansi">
                                            <option value="Administrasi Perkantoran">
                                        </datalist>
                                    </div>

                                    <div class="form-group mb-3">
                                        <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat" required></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="text" name="telepon" class="form-control" id="telepon"
                                            placeholder="Telepon" required>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success mt-2" onclick="store()">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

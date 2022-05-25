@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Pembayaran Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-lg">
            <form class="card" action="{{ route('admins/pembayaran/index') }}">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Pembayaran Siswa</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorrs }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        {{-- <input type="name" placeholder="Nama" name="nama" class="form-control" value="{{  }}"
                            required> --}}

                        {{-- <input required="" type="hidden" name="siswa_id" value="{{ $siswa->id }}" readonly
                                id="siswa_id" class="form-control">
                            <input required="" type="text" name="nama_siswa" value="{{ $siswa->nama }}" readonly
                                id="nama_siswa" class="form-control"> --}}
                        {{-- @error('nama_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

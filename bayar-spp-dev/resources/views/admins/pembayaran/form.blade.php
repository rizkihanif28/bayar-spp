@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Pembayaran Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form class="card" action="{{ route('admins/pembayaran/store', $siswa->nis) }}" method="POST">
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Nama Siswa</label>
                                <input required="" type="text" name="nama_siswa" value="{{ $siswa->nama }}" readonly
                                    id="nama_siswa" class="form-control">
                                @error('nama_siswa')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">NIS</label>
                                <input required="" type="text" name="nis" value="{{ $siswa->nis }}" readonly id="nis"
                                    class="form-control">
                                @error('nis')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Kelas</label>
                                <input required="" type="text" name="kelas" value="{{ $siswa->kelas->nama }}" readonly
                                    id="kelas" class="form-control">
                                @error('kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Tagihan Bulan</label>
                                <select id="select-beast" class="form-control custom-select" name="bulan">
                                    <option value="Pilih Periode">-- Pilih Bulan --</option>
                                    @foreach ($tagihan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($transaksi) ? ($item->id == $transaksi->tagihan_id ? 'selected' : '') : '' }}>
                                            {{ $item->nama }} - @currency($item->jumlah)
                                        </option>
                                    @endforeach
                                </select>
                                @error('bulan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Bulan</label>
                                <select id="select-beast" class="form-control custom-select" name="bulan">
                                    <option value="Pilih Periode">-- Bulan --</option>
                                   
                                </select>
                                @error('bulan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Periode</label>
                                <select id="select-beast" class="form-control custom-select" name="periode_id"
                                    data-dropdown>
                                    <option value="Pilih Periode">-- Pilih Periode --</option>
                                    @foreach ($periode as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($transaksi) ? ($item->id == $transaksi->periode_id ? 'selected' : '') : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
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

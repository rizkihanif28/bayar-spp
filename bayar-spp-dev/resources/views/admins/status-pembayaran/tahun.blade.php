@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Status Pembayaran SPP
        </h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Status</h4>
                </div>
                <div class="col-md-12">
                    <div class="callout callout-info mt-5">
                        <h5>Data Siswa</h5>
                        <p>
                            Nama Siswa : <b>{{ $siswa->nama_siswa }}</b><br>
                            NIS : <b>{{ $siswa->nis }}</b><br>
                            Kelas : <b>{{ $siswa->kelas->nama_kelas }}</b>
                        </p>
                    </div>
                    <div class="callout callout-warning">
                        <h5>Pemberitahuan !</h5>

                        <p>Garis biru pada list periode menandakan tahun aktif atau tahun sekarang</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm">
                        <i class="bi bi-bookmarks-fill"></i>Pilih Tahun
                    </a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($tagihan as $item)
                            @if ($item->periode == date('Y'))
                                <a href="{{ route('status-pembayaran/siswa', [$siswa->nis, $item->periode]) }}"
                                    class="list-group-item list-group-item-action active">
                                    {{ $item->periode }}
                                </a>
                            @else
                                <a href="{{ route('status-pembayaran/siswa', [$siswa->nis, $item->periode]) }}"
                                    class="list-group-item list-group-item-action">
                                    {{ $item->periode }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

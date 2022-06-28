@extends('layouts.app-siswa')

@section('content-siswa')
    <div class="container align-items-center">
        <div class="row">
            <div class="col-lg-6" style="margin-top: 14%">
                <div class="card">
                    <div class="card-header">
                        <h4>Status</h4>
                    </div>
                    <div class="col-12">
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

            {{-- <div class="col-md-5 ml-9" style="margin-top: 19%">
                <div class="callout" style="background-color: white">
                    <h5>Pemberitahuan !</h5>
                    <p>Garis biru pada list periode menandakan tahun aktif atau tahun sekarang</p>
                </div>
            </div> --}}

            <div class="col-md-5" style="margin-top: 14%">
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
                                    <a href="{{ route('siswa/status/show', [$item->periode]) }}"
                                        class="list-group-item list-group-item-action active">
                                        {{ $item->periode }}
                                    </a>
                                @else
                                    <a href="{{ route('siswa/status/show', [$item->periode]) }}"
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
    </div>
@endsection

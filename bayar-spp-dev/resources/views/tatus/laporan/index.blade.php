@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Laporan SPP
        </h2>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan</h4>
                    <a href="{{ route('tatus/laporan') }}" class="btn btn-primary btn-sm ml-5">
                        <i class="bi bi-printer"></i> Cetak Laporan</a>
                </div>
                @if (Session::get('msg'))
                    <div class="card-alert alert alert-{{ Session::get('type') }}" id="message"
                        style="border-radius: 0px !important">
                        @if (Session::get('type') == 'success')
                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                        @else
                            <i class="bi bi-x-lg" aria-hidden="true"></i>
                        @endif
                        {{ Session::get('msg') }}
                    </div>
                @endif
                <div class="p-3 text-center">
                    <table id="table-laporan" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>NIS</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan</th>
                                <th>Periode</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->petugas->nama }}</td>
                                    <td>{{ $item->siswa->nama_siswa }}</td>
                                    <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}</td>
                                    <td>{{ $item->bulan_bayar }}</td>
                                    <td>{{ $item->tahun_bayar }}</td>
                                    <td>{{ $item->jumlah_bayar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        requirejs(["datatables"], function() {
            $("#table-laporan").dataTable();
        });
    </script>
@endsection

@extends('layouts.app-siswa')

@section('content-siswa')
    <div class="container ml-9">
        <div class="page-header" style="margin-top: 8%">
            <div class="page-title">
                <h2>Pembayaran Tahun</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('siswa/status') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left-square"></i> KEMBALI
                        </a>
                    </div>
                    {{-- Card Header --}}
                    <div class="card-body">
                        @if ($transaksi->count() > 0)
                            <table id="table-status" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>NIS</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Nama Petugas</th>
                                        <th>Bulan</th>
                                        <th>Periode</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->siswa->nama_siswa }}</td>
                                            <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                            <td>{{ $item->nis }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}</td>
                                            <td>{{ $item->petugas->nama }}</td>
                                            <td>{{ $item->bulan_bayar }}</td>
                                            <td>{{ $item->tahun_bayar }}</td>
                                            <td>{{ $item->jumlah_bayar }}</td>
                                            <td>
                                                <a href="javascript:(0)" class="btn btn-success btn-sm"><i
                                                        class=""></i>LUNAS
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Data Pembayaran Tidak Tersedia!</h4>
                                <p>Pembayaran SPP di Tahun {{ $tagihan->periode }} tidak
                                    tersedia
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

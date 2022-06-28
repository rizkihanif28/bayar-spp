@extends('layouts.app-siswa')

@section('content-siswa')
    <div class="page-header" style="margin-top: 8%">
        <h2 class="page-title">
            Status Pembayaran SPP {{ $tagihan->periode }}
        </h2>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('siswa/status') }}" class="btn btn-danger btn-sm">
                        <i class="bi bi-arrow-left-square"></i> KEMBALI
                    </a>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    @if ($transaksi->count() > 0)
                        <table id="table-statusSiswa" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Petugas</th>
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
                                                    class=""></i>LUNAS</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Data Pembayaran Tidak Tersedia!</h4>
                            <p>Pembayaran SPP Anda di Tahun {{ $tagihan->periode }} tidak tersedia
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Row Status Pembayaran Bulan --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm">
                        <i class="bi bi-bell"></i>Status Pembayaran
                    </a>
                </div>
                {{-- Card Body --}}
                <div class="card-body">
                    @if ($transaksi->count() > 0)
                        <table id="table-statusPembayaran-siswa" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Universe::bulanAll() as $key => $value)
                                    <tr>
                                        <td>{{ $value['nama_bulan'] }}</td>
                                        <td>
                                            @if (Universe::statusPembayaranBulan($value['nama_bulan'], $tagihan->periode) == 'LUNAS')
                                                <a href="javascript:(0)" class="btn btn-success btn-sm">
                                                    <i class=""></i>
                                                    {{ Universe::statusPembayaranBulan($value['nama_bulan'], $tagihan->periode) }}
                                                </a>
                                            @else
                                                <a href="javascript:(0)" class="btn btn-danger btn-sm">
                                                    <i class=""></i>
                                                    {{ Universe::statusPembayaranBulan($value['nama_bulan'], $tagihan->periode) }}
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Data Status Tidak Tersedia!</h4>
                            <p>Status Pembayaran SPP Anda di Tahun {{ $tagihan->periode }} tidak
                                tersedia
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        requirejs(["datatables"], function() {
            $("#table-statusSiswa").dataTable();
            $("#table-statusPembayaran-siswa").dataTable();
        });
    </script>
@endsection

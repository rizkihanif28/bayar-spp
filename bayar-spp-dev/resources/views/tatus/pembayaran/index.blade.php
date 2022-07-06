@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Pembayaran SPP
        </h2>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pembayaran SPP</h4>
                </div>
                <div class="p-3 text-center">
                    <table id="table-siswa" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->kelas->nama_kelas }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('tatus/pembayaran/create', $item->nis) }}" title="bayar">
                                            <i class="bi bi-wallet"></i> Bayar
                                        </a>
                                        <a class="btn btn-green btn-sm"
                                            href="{{ route('status/show/tahun', $item->nis) }}" title="detail">
                                            <i class="bi bi-ticket-detailed"></i> Detail
                                        </a>
                                    </td>
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
            $("#table-siswa").dataTable();
        });
    </script>
@endsection

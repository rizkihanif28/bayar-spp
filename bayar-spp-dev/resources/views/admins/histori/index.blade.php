@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Histori Pembayaran
        </h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Histori</h4>
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
                    <table id="table-histori" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Petugas</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Periode</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histori as $item)
                                <tr>
                                    {{-- <td><span class="text-muted">{{ $index + 1 }}</span></td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->petugas->nama }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    <td>{{ $item->siswa->nis }}</td>
                                    <td>{{ $siswa->kelas->nama }} - {{ $siswa->jurusan->nama }}</td>
                                    <td>{{ $item->periode }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>@currency($item->jumlah)</td>
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
            $("#table-histori").dataTable();
        });
    </script>
@endsection

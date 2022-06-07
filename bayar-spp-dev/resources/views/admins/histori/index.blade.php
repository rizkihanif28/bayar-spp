@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header">
        <div class="col-10">
            <div class="page-title mt-3" style="font-size: 28px">
                Histori Pembayaran
                <hr class="solid mt-2">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Histori</h4>
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
                                <th>Periode</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histori as $item)
                                <tr>
                                    {{-- <td><span class="text-muted">{{ $index + 1 }}</span></td> --}}
                                    {{-- <td>{{ $item->created_at->format('d-m-Y') }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->petugas->nama }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    <td>{{ $item->siswa->nis }}</td>
                                    <td>{{ $item->periode }}</td>
                                    <td>{{ $item->transaksi->tanggal_bayar }}</td>
                                    <td>{{ $item->jumlah }}</td>
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
    <script>
        require(['jquery'], function($) {
            $(document).ready(function() {

            });
        });
    </script>
@endsection

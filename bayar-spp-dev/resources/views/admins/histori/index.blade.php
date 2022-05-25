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
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="p-3 text-center">
                    <table id="table-histori" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Tanggal</th>
                                <th>Siswa</th>
                                {{-- <th>Tagihan</th> --}}
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histori as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    {{-- <td>{{ $item->tagihan->nama }}</td> --}}
                                    <td>IDR. {{ format_idr($item->jumlah) }}</td>
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

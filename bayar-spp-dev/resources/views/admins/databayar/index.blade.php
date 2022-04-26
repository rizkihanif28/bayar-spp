@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header">
        <div class="col-10">
            <h1 class="page-title mt-3" style="font-size: 28px">
                Histori Pembayaran
                <hr class="solid mt-2">
            </h1>
        </div>
    </div>
    {{-- @if (Session::get('msg'))
        <div class="card-alert alert alert-{{ Session::get('type') }}" id="message" style="border-radius: 0px !important">
            @if (Session::get('type') == 'success')
                <i class="bi bi-check-lg" aria-hidden="true"></i>
            @else
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            @endif
            {{ Session::get('msg') }}
        </div>
    @endif --}}
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
                    <table id="databayar" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>id-pembayaran</th>
                                <th>Nama</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>Mei</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Agust</th>
                                <th>Sept</th>
                                <th>Okt</th>
                                <th>Nov</th>
                                <th>Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_bayar as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>{{ $item->pembayaran->id }}</td>
                                    <td>{{ $item->siswa->nama }}</td>
                                    <td>
                                        @if ($item->tagihan->jumlah)
                                            <span class="tag tag-green">Lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->tagihan->jumlah)
                                            <span class="tag tag-green">Lunas</span>
                                        @endif
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
            $("#databayar").dataTable();
        });
    </script>
    <script>
        require(['jquery'], function($) {
            $(document).ready(function() {

            });
        });
    </script>
@endsection

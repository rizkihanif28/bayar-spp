@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Status Pembayaran SPP
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Status Pembayaran</h4>
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
                    <table id="table-status" class="table table-striped card-table table-hover">
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
                                    {{-- <td><span class="text-muted">{{ $index + 1 }}</span></td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->kelas->nama_kelas }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-green btn-sm" href="{{ route('status/show', $item->nis) }}">
                                            <i class="bi bi-wallet"></i> Detail
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
            $("#table-status").dataTable();
        });
    </script>
@endsection

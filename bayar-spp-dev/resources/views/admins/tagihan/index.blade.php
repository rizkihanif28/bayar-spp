@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Tagihan
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tagihan</h4>
                    <a href="{{ route('admins/tagihan/create') }}" class="btn btn-primary btn-sm ml-5">+ Tambah Tagihan</a>
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
                <div class="table-responsive p-3 text-center">
                    <table id="table-tagihan" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                {{-- <th>Tatausaha</th> --}}
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan as $index => $item)
                                <tr>
                                    <td><span class="text-muted"> {{ $index + 1 }}</span></td>
                                    {{-- <td>{{ $item->tu_id->nama }}{{ isset($item->tagihan->tu_id) ? '(' . $item->tagihan->tu_id->nama . ')' : '' }}
                                    </td> --}}
                                    <td>{{ $item->nama }}</td>
                                    <td> @currency($item->jumlah)</td>
                                    <td class="text-center">
                                        {{-- <a class="icon" href="{{ route('admins/siswa/show', $item->id) }}"
                                            title="lihat detail">
                                            <i class="bi bi-ticket-detailed"></i>
                                        </a> --}}
                                        <a class="icon" href="{{ route('admins/tagihan/edit', $item->id) }}"
                                            title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="icon btn-delete" href="#!" data-id="{{ $item->id }}"
                                            title="delete item">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('admins/tagihan/destroy', $item->id) }}" method="POST"
                                            id="form-{{ $item->id }}">
                                            @csrf
                                        </form>
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
            $('#table-tagihan').dataTable();
        });
    </script>
    <script>
        require(['jquery', 'sweetalert'], function($, sweetalert) {
            $(document).ready(function() {

                $(document).on('click', '.btn-delete', function() {
                    formid = $(this).attr('data-id');
                    swal({
                        title: 'Anda yakin ingin menghapus?',
                        text: 'periode yang dihapus tidak dapat dikembalikan',
                        dangerMode: true,
                        buttons: {
                            cancel: true,
                            confirm: true,
                        },
                    }).then((result) => {
                        if (result) {
                            $('#form-' + formid).submit();
                        }
                    })
                })

            });
        });
    </script>
@endsection

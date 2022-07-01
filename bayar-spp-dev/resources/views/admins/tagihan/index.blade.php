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
                <x-alert />
                <div class="p-3 text-center">
                    <table id="table-tagihan" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Periode</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan as $index => $item)
                                <tr>
                                    <td><span class="text-muted"> {{ $index + 1 }}</span></td>
                                    <td>{{ $item->periode }}</td>
                                    <td> @currency(str_replace('.', '', $item->nominal))</td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admins/tagihan/edit', $item->id) }}" title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-delete" href="#!"
                                            data-id="{{ $item->id }}" title="delete item">
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
                        text: 'tagihan yang dihapus tidak dapat dikembalikan',
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

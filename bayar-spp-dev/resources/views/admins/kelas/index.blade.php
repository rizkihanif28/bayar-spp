@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Kelas
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kelas</h4>
                    <a href="{{ route('admins/kelas/create') }}" class="btn btn-primary btn-sm ml-5">+ Tambah
                        Kelas</a>
                </div>
                <x-alert />
                <div class="table-responsive mt-3 p-3 text-center">
                    <table class="table table-striped card-table table-hover table-vcenter text-nowrap" id="table-kelas">
                        <thead>
                            <tr>
                                <th style="width: 40px">No.</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>{{ $item->nama_kelas }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admins/kelas/edit', $item->id) }}" title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-delete" href="#!"
                                            data-id="{{ $item->id }}" title="delete item">
                                            <i class="bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('admins/kelas/destroy', $item->id) }}" method="POST"
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
            $('#table-kelas').dataTable();
        });
    </script>
    <script>
        require(['jquery', 'sweetalert'], function($, sweetalert) {
            $(document).ready(function() {

                $(document).on('click', '.btn-delete', function() {
                    formid = $(this).attr('data-id');
                    swal({
                        title: 'Anda yakin ingin menghapus?',
                        text: 'kelas yang dihapus tidak dapat dikembalikan',
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

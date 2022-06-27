@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Siswa</h4>
                    <a href="{{ route('tatus/siswa/create') }}" class="btn btn-primary btn-sm ml-5">+ Tambah Siswa</a>
                </div>
                <x-alert />
                <div class="p-3 text-center">
                    <table id="table-siswa" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->kelas->nama_kelas }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->telepon }}</td>

                                    <td class="text-center">
                                        {{-- <a class="icon" href="{{ route('tatus/siswa/show', $item->id) }}"
                                            title="lihat detail">
                                            <i class="bi bi-ticket-detailed"></i>
                                        </a> --}}
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('tatus/siswa/edit', $item->id) }}" title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-delete" href="#!"
                                            data-id="{{ $item->id }}" title="delete item">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('tatus/siswa/destroy', $item->id) }}" method="POST"
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
            $("#table-siswa").dataTable();
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

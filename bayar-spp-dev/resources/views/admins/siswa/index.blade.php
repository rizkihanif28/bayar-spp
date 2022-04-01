@extends('layouts.app-admin')

@section('content-admin')
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
                    <a href="{{ route('admins/siswa/create') }}" class="btn btn-primary btn-sm ml-5">+ Tambah Siswa</a>
                </div>
                @if (session()->has('msg'))
                    <div class="card-alert alert alert-{{ session()->get('type') }}" id="message"
                        style="border-radius: 0px !important">
                        @if (session()->get('type') == 'success')
                            <i class="fe fe-check mr-2" aria-hidden="true"></i>
                        @else
                            <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                        @endif
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <div class="table-responsive mt-3 p-3 text-center">
                    <table id="table-siswa" class="table table-striped card-table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td><a href="{{ route('admins/siswa/show', $item->id) }}" class="link-unmuted"></a>
                                        {{ $item->nama }}
                                    </td>
                                    <td>{{ $item->jurusan->nama }}{{ isset($item->siswa->jurusan) ? '(' . $item->siswa->jurusan->nama . ')' : '' }}
                                    </td>
                                    <td>{{ $item->kelas->nama }}{{ isset($item->kelas->periode) ? '(' . $item->kelas->periode->nama . ')' : '' }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $$tem->telepon }}</td>

                                    <td class="text-center">
                                        <a class="icon" href="{{ route('admins/siswa/show', $item->id) }}"
                                            title="lihat detail">
                                            <i class="bi bi-ticket-detailed"></i>
                                        </a>
                                        <a class="icon" href="{{ route('admins/siswa/edit', $item->id) }}"
                                            title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="icon btn-delete" href="#!" data-id="{{ $item->id }}"
                                            title="delete item">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('admins/siswa/destroy', $item->id) }}" method="POST"
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

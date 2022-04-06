@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Users
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Users</div>
                    <a href="{{ route('admins/users/create') }}" class="btn btn-primary btn-sm ml-5">+ Tambah User</a>
                </div>
                @if (session()->has('msg'))
                    <div class="card=alert alert alert-{{ session()->get('type') }}" id="message"
                        style="border-radius: 0px !important">
                        @if (session()->get('type') == 'success')
                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                        @else
                            <i class="bi bi-x-lg" aria-hidden="true"></i>
                        @endif
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <div class="table-responsive mt-3 p-3 text-center">
                    <table class="table table-striped card-table table-hover table-vcenter text-nowrap" id="table-users">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>
                                        @if (Auth::user()->id == $item->id)
                                            <span class="tag tag-teal">{{ $item->name }}</span>
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a class="icon" href="{{ route('admins/users/edit', $item->id) }}"
                                            title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="icon btn-delete" href="#!" data-id="{{ $item->id }}"
                                            title="delete item">
                                            <i class="bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('admins/users/destroy', $item->id) }}" method="POST"
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
            $('#table-users').dataTable();
        });
    </script>
    <script>
        require(['jquery', 'sweetalert'], function($, sweetalert) {
            $(document).ready(function() {

                $(document).on('click', '.btn-delete', function() {
                    formid = $(this).attr('data-id');
                    swal({
                        title: 'Anda yakin ingin menghapus',
                        text: 'user yang dihapus tidak dapat dikembalikan',
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

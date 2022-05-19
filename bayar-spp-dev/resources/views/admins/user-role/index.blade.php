@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            User List
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">User List</div>
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
                    <table class="table table-striped card-table table-hover table-vcenter text-nowrap" id="table-userlist">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                            @if ($item->hasAnyRole('admin'))
                                                <span class="badge badge-primary">
                                                    {{ $role->name }}
                                                </span>
                                            @endif
                                            @if ($item->hasAnyRole('tata usaha'))
                                                <span class="badge badge-success">
                                                    {{ $role->name }}
                                                </span>
                                            @endif
                                            @if ($item->hasAnyRole('siswa'))
                                                <span class="badge badge-danger">
                                                    {{ $role->name }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admins/user-role/create', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit fa-fw"></i> Handle
                                            </a>
                                        </div>
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
            $("#table-userlist").dataTable();
        });
    </script>
@endsection

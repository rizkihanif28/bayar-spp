@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            User Role
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">User Role</div>
                </div>
                <x-alert />
                <div class="table-responsive mt-3 p-3 text-center">
                    <table class="table table-striped card-table table-hover table-vcenter text-nowrap" id="table-user-role">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
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
                                                <span class="badge badge-warning">
                                                    {{ $role->name }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admins/user-role/create', $item->id) }}"
                                            class="btn btn-purple btn-sm">
                                            <i class="bi bi-hand-index-thumb"></i>
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
            $("#table-user-role").dataTable();
        });
    </script>
@endsection

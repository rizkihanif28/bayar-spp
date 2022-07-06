@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Role
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admins/user-role/store', $user->id) }}" method="POST" class="card">
                <div class="card-header">
                    <h5 class="card-title">User Role</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select id="select-beast" class="form-control custom-select" name="role">
                                    <option value="admin"
                                        {{ isset($user) ? ($user->roles == 'admin' ? 'selected' : '') : '' }}>
                                        Admin</option>
                                    <option value="tata usaha"
                                        {{ isset($user) ? ($user->roles == 'tata usaha' ? 'selected' : '') : '' }}>
                                        Tata Usaha
                                    </option>
                                    <option value="siswa"
                                        {{ isset($user) ? ($user->roles == 'siswa' ? 'selected' : '') : '' }}>
                                        Siswa
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-link">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        require(['jquery', 'selectize'], function($, selectize) {
            $(document).ready(function() {
                $('.custom-select').selectize({});
            });
        });
    </script>
@endsection

@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form User
        </h2>
    </div>

    <div class="row">
        <div class="col-8">
            <form action="{{ isset($user) ? route('admins/users/update', $user->id) : route('admins/users/store') }}"
                method="POST" class="card">
                <div class="card-header">
                    <h5 class="card-title">User</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorrs }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama"
                                    value="{{ isset($user) ? $user->name : old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" placeholder="Email" name="email" class="form-control"
                                    value="{{ isset($user) ? $user->email : old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" placeholder="Password" name="password" class="form-control"
                                    value="{{ isset($user) ? '' : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" placeholder="Password" name="password_confirmation"
                                    class="form-control" value="{{ isset($user) ? '' : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select name="select-beast" class="form-control custom-select" name="role">
                                    <option value="">Pilih Role</option>
                                    <option value="admin"
                                        {{ isset($user) ? ($user->role == 'admin' ? 'selected' : '') : '' }}>Admin
                                    </option>
                                    <option value="tatausaha"
                                        {{ isset($user) ? ($user->role == 'tatausaha' ? 'selected' : '') : '' }}>Tata
                                        Usaha
                                    </option>
                                    <option value="user"
                                        {{ isset($user) ? ($user->role == 'siswa' ? 'selected' : '') : '' }}>Siswa
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
                $('#select-beast').selectize({});
            });
        });
    </script>
@endsection

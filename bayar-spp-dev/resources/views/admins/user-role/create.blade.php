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
                    <div class="card-title mr-5">User List</div>
                    <div class="btn btn-danger btn-sm p-2">
                        <i class="bi bi-people-fill mr-2"></i> {{ $user->name }}
                    </div>
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
                <div class="row">
                    <div class="col-8">
                        <form method="POST" action="{{ route('admins/user-role/store', $user->id) }}">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select id="select-beast" class="form-control custom-select" name="role">
                                        <option value="admin"
                                            {{ isset($user) ? ($user->role == 'Admin' ? 'selected' : '') : '' }}>
                                            Admin</option>
                                        <option value="tata usaha"
                                            {{ isset($user) ? ($user->role == 'Tata Usaha' ? 'selected' : '') : '' }}>Tata
                                            Usaha
                                        </option>
                                        <option value="siswa"
                                            {{ isset($user) ? ($user->role == 'Siswa' ? 'selected' : '') : '' }}>
                                            Siswa
                                        </option>
                                    </select>
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
            </div>
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

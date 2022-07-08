@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 10%">
        <h2 class="page-title">
            Profile
        </h2>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-body">
                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="img-profil" class="rounded-circle">
                    <div class="nama text-center mt-4" style="font-size: 19px">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profil</h4>
                </div>
                <x-alert />
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <input type="name" value="{{ Universe::Petugas()->nama }}" class="form-control" readonly
                                id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-9">
                            <input type="username" value="{{ Auth::user()->username }}" class="form-control" readonly
                                id="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" value="{{ Auth::user()->email }}" class="form-control" readonly
                                id="email">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('pass/update') }}">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label for="old_password" class="col-md-3 col-form-label">Password Sekarang</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" required name="old_password" id="old_password">
                            </div>
                            @error('old_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-3 col-form-label">Password Baru</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" required name="new_password" id="new_password">
                            </div>
                            @error('new_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-6">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

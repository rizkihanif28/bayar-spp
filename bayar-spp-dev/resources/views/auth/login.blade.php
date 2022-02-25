@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-lg-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form>
                @csrf
                <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65" height="65">
                <h2 class="h3 mb-3 fw-normal text-center">Please Login</h2>

                <div class="form-floating">
                    <input type="username" class="form-control" id="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember me">
                        Remember me
                    </label>
                </div>

                <button class="w-100 btn btn-primary" type="submit">Login</button>


            </form>
            <small class="d-block text-right mt-2 mb-1"> Not Registed? <a href="/regis">Register Now!</a></small>
            <small class="mt-2"><a href="/lupas">Lupa Password?</a></small>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

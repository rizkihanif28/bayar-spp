@extends('layouts.app')

@section('content')
    <div class="col-md-4">
        <h2>SPP WALANG JAYA</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5 style="margin-bottom: 6%">Silahkan Login</h5>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control rounded-bottom @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required id="email" name="email" placeholder="Email"
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-5">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            required id="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-file-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- </div> --}}
    {{-- <div class="row justify-content-center">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-md-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65"
                    height="65">
                <h2 class="h3 mb-3 fw-normal text-center">Please Login</h2>

                <div class="form-floating">
                    <input id="email" type="email"
                        class="form-control rounded-bottom @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required placeholder="Email" autocomplete="email" autofocus>
                    <label for="email">{{ __('Email Address') }}</label>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input id="password" type="password"
                        class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" required
                        placeholder="Password">
                    <label for="password">{{ __('Password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="checkbox mb-3 mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Login') }}
                </button>
            </form>
            <small class="d-block text-right mt-2"> Not Registed? <a href="/register">Register Now!</a></small>

            @if (Route::has('password.request'))
                <small>
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </small>
            @endif
        </div>
    </div> --}}
@endsection

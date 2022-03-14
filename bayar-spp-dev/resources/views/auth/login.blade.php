@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-lg-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65" height="65">
                <h2 class="h3 mb-3 fw-normal text-center">Please Login</h2>

                <div class="form-floating">
                    <input id="email" type="email" class="form-control rounded-bottom @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="email"
                        autofocus>
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
    </div>
@endsection

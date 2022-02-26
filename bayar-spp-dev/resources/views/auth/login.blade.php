@extends('layouts.app')

@section('content')
    <div class="row justify-content-center ">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-md-3">
            <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65" height="65">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email">{{ 'Email Address' }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="current-password">
                    <label for="password">{{ 'Password' }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check mt-3 mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ 'Remember Me' }}
                    </label>
                </div>


                <button type="submit" class="w-100 btn btn-primary mb-2">
                    {{ 'Login' }}
                </button>

            </form>

            @if (Route::has('register'))
                <small class="d-block text-right mt-2 "> Not Register?
                    <a href="{{ route('register') }}">{{ __('Register Now!') }}</a>
                </small>
            @endif

            @if (Route::has('password.request'))
                <small class="d-block text-right mt-1">
                    <a href="{{ route('password.request') }}">
                        {{ 'Lupa Password?' }}
                    </a>
                </small>
            @endif
        </div>
    </div>
@endsection

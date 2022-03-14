@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="h3 mb-3 fw-normal text-center">Form Registrasi Siswa</h2>

                    <div class="form-floating">
                        <input type="name" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                            id="name" placeholder="Name" required autocomplete="name" value="{{ old('name') }}" autofocus>
                        <label for="name">{{ __('Name') }}</label>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                            id="email" placeholder="Name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirm Password" required autocomplete="new-password">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 w-100">
                        {{ __('Register') }}
                    </button>
                </form>
                <small class="d-block text-right mt-2 mb-1"> Already Registed? <a href="/login">Login</a></small>
                <small class="mt-2"><a href="/lupas">Lupa Password?</a></small>
            </div>
        </div>
    </div>
@endsection

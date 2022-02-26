@extends('layouts.app')

@section('content')
    <div class="form-registration mt-0">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="title row justify-content-center">Form Registrasi Siswa</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-floating">
                        <input type="username" class="form-control @error('username') is-invalid @enderror" name="username"
                            placeholder="Username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                        <label for="username">{{ __('Username') }}</label>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name">{{ __('Name') }}</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">{{ __('Email Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="new-password">
                        <label for="password">{{ __('Password') }}</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-primary mt-3" type="submit">{{ __('Register') }}</button>
                    <small class="d-block text-right mt-2 mb-1"> Already Registed? <a href="/login">Login</a></small>
                    <small class="d-block text-right mt-1"><a href="#">Lupa Password?</a></small>
                </form>
            </div>
        </div>
    </div>
@endsection

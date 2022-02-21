@extends('layouts.login')

@section('login')
    <div class="row justify-content-center">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-md-3">
            <form>
                <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65" height="65">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                </div>

                <a class="btn btn-primary w-100" href="/home">Login</a>

            </form>
            <small class="mt-2"><a href="/register">Lupa Password?</a></small>
        </div>
    </div>
@endsection

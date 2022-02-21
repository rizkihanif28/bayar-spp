@extends('layouts.regis')

@section('regis')
    <div class="row justify-content-center">
        <div class="title row justify-content-center">Sistem Informasi Pembayaran SMK Walang Jaya</div>
        <div class="col-md-3">
            <form>
                <img class="logo-brand mb-4" src="{{ asset('assets/img/logo-brand.png') }}" alt="" width="65" height="65">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="name" placeholder="n=Name">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="name" placeholder="n=Name">
                    <label for="name"></label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-2">Not registed? <a href="/register">Register Now!</a></small>
        </div>
    </div>
@endsection

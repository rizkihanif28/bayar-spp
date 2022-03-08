{{-- @extends('layouts.login')

@section('login')
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
@endsection --}}

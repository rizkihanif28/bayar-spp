{{-- @extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <form action="/register" method="post">
                @csrf
                <h2 class="h3 mb-3 fw-normal text-center">Form Registrasi Siswa</h2>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                        id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="username" name="username" class="form-control  @error('username') is-invalid @enderror"
                        id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                        placeholder="Name@example.com" required value="{{ old('email') }}">
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

                <button class="w-100 btn btn-primary mt-3" type="submit">Register</button>

            </form>
            <small class="d-block text-right mt-2 mb-1"> Already Registed? <a href="/login">Login</a></small>
            <small class="mt-2"><a href="/lupas">Lupa Password?</a></small>
        </div>
    </div>
@endsection --}}

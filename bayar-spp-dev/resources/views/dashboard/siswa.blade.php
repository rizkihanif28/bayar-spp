@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid mx-4">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 33px" class="icon-brand" />
            <a class="navbar-brand" href="http://127.0.0.1:8000">
                Pembayaran Walang Jaya
            </a>
            {{-- <a class="navbar-brand" href="{{ url('dashboard/siswa') }}">
                {{ config('app.name', 'Bayar_SPP') }}
            </a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="/home-siswa">Beranda</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#">SPP Pembayaran</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                            style="width: 30px" class="rounded-circle mr-1" />
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu pr-md-4">
                                        <li>
                                            <a class="dropdown-item" href="/profil">
                                                Profil
                                            </a>
                                        </li>
                                        <li>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bi bi-box-arrow-right"></i>Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

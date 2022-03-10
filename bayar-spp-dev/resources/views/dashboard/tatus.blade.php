@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid mx-4">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 33px" class="icon-brand" />
            <a class="navbar-brand" href="http://127.0.0.1:8000">
                Pembayaran Walang Jaya
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="/home">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-3" href="/kesiswaan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kesiswaan
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/siswa">Siswa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/pembayaran">Pembayaran</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/data-bayar">Data Pembayaran</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-3" href="/laporan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Laporan
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/lapor-bulanan">
                                        <i class="fa-regular fa-camera"></i>Bulanan
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/lapor-tahunan">Tahunan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" style="width: 30px"
                                    class="rounded-circle mr-1" />
                                <div class="d-sm-none d-lg-inline-block">Tata Usaha</div>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <a class="dropdown-item" href="/profil">
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                            Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}

    <div class="main-content">
        @yield('tatus')
    </div>
@endsection

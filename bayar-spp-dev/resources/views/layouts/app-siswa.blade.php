<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale('/login')) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPP WJ | {{ $title }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.min.js">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid mx-4">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 33px" class="icon-brand" />
            <a class="navbar-brand" href="http://127.0.0.1:8000">
                Pembayaran Walang Jaya
            </a>
            {{-- <a class="navbar-brand" href="{{ url('dashboard/siswa') }}">
                {{ config('app.name', 'Bayar_SPP') }}
            </a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
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
                                            <form action="#" method="post">
                                                <button type="submit" class="dropdown-item">
                                                    Profil
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    Keluar
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

    {{-- Main Content --}}
    <div id="app-siswa">
        <main class="py-5">
            @yield('content-siswa')
        </main>
    </div>

    <footer class="main-footer fixed-bottom">
        Copyright &copy; 2022
        <div class="bullet"></div>
        SMK Walang Jaya Jakarta
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>

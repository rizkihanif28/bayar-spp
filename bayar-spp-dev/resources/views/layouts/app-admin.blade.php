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

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.css') }}" />

    {{-- Other Script --}}

    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/require.min.js') }}"></script>

    {{-- Other CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tabler.css') }}">

    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker.css') }}" />

    <script>
        requirejs.config({
            baseUrl: '{{ route('web.index') }}',
            paths: {
                "jquery": "assets/js/vendors/jquery-3.2.1.min",
                "datatables": "assets/plugins/datatables/datatables.min",
                "selectize": "assets/js/vendors/selectize.min",
                "datepicker": "assets/js/vendors/datepicker",
                "selectize": "assets/js/vendors/selectize.min",
                "sweetalert": "assets/js/vendors/sweetalert.min",
                "select2": "assets/js/vendors/select2.min",
            }
        });
    </script>

    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid ml-6">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 40px" class="icon-brand" />
            <a class="navbar-brand" href="http://127.0.0.1:8000">
                Pembayaran Walang Jaya
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/dashboard/admin">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Master Data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/admins/users/index">
                                        <i class="bi bi-people-fill"></i>
                                        User
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admins/siswa/index">
                                        <i class="bi bi-person-lines-fill"></i>
                                        Siswa
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admins/tagihan/index">
                                        <i class="bi bi-receipt"></i>
                                        Tagihan
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admins/pembayaran/index">
                                        <i class="bi bi-wallet"></i>
                                        Pembayaran
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item disabled" href="/admins/databayar/index">
                                        <i class="bi bi-bar-chart-steps"></i>
                                        Data Pembayaran
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admins/histori/index">
                                        <i class="bi bi-bar-chart-steps"></i>
                                        Histori Pembayaran
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="/admins/periode/index">Periode</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="/admins/kelas/index">Kelas</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link active" href="/admins/jurusan/index">Jurusan</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="/laporan" id="navbarDropdown" role="button"
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

                    <ul class="navbar-nav mr-7">
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    style="width: 30px" class="rounded-circle mr-1" />
                                <div class="d-sm-none d-lg-inline-block">Administrator</div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"> {{-- href="{{ route('/admins/users/edit', Auth::user()->id) }}"> --}}
                                        <i>class="bi bi-person-bounding-box"></i>
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-left"></i>
                                            Keluar
                                        </button>
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
    <div class="app-admin ">
        <div class="container">
            @yield('content-admin')
        </div>
    </div>

    {{-- <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                    Copyright &copy; 2022
                    <div class="bullet"></div>
                    SMK Walang Jaya Jakarta
                </div>
            </div>
        </div>
    </footer> --}}

    {{-- Custom JS --}}
    @yield('js')

</body>
{{-- @stack('js') --}}

</html>

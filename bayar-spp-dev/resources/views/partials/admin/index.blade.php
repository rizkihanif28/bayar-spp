<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.min.js') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/fontawesome.min.css') }}" />

</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid mx-4">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 33px" class="icon-brand" />
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
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="/home">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-3" href="/kesiswaan" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Master Data
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/#">User</a>
                                </li>
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
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    style="width: 30px" class="rounded-circle mr-1" />
                                <div class="d-sm-none d-lg-inline-block">Administrator</div>
                            </a>
                            <ul class="dropdown-menu pr-md-4">
                                <li>
                                    <a class="dropdown-item" href="/profil">
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/login">Logout
                                    </a>
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
        @yield('admin')
    </div>

    {{-- Main Footer --}}

    <footer class="main-footer">
        Copyright &copy; 2022
        <div class="bullet"></div>
        SMK Walang Jaya Jakarta
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>

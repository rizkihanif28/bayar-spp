<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale('/login')) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPP WALANG JAYA</title>

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
    {{-- Main Content --}}
    <div id="app">
        <main class="py-5">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/admin/tambah-siswa.js') }}"></script>

</body>

</html>

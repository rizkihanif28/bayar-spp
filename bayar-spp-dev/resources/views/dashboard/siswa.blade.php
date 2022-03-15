@extends('layouts.app-siswa')

@section('content-siswa')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <section class="content">
                    <div class="jumbotron bg-warning">
                        {{ __('Selamat Datang, ') }}
                        {{ Auth::user()->name }}
                        <p>Silahkan Pilih Menu Diatas Untuk Memulai Aktifitas</p>
                </section>
            </div>
        </div>
    </div>
@endsection

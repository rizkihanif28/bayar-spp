@extends('layouts.app-admin')

@section('content-admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="jumbotron bg-warning">
                {{ __('Selamat Datang, ') }}
                {{ Auth::user()->name }}
                <p>Silahkan Pilih Menu Diatas Untuk Memulai Aktifitas</p>
            </section>
        </div>
    </div>
@endsection

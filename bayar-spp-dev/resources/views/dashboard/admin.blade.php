@extends('layouts.app-admin')

@section('content-admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="jumbotron bg-warning">
                {{ __('Selamat Datang, ') }}
                {{ Auth::user()->name }}
                <p>Silahkan Pilih Menu Diatas Untuk Memulai Aktifitas</p>
            </section>

            <div class="jumbotron">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

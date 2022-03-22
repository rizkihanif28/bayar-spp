@extends('layouts.app-admin')

@section('content-admin')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h3>Pembayaran SPP</h3>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <form action="../admin/detail-pembayaran">
                    <div class="input-group mt-5">
                        <h5 class="p-2">Nomor Induk Siswa</h5>
                        <input type="text" class="form-control w-25" name="search" id="search" type="search"
                            placeholder="Nomor Induk Siswa">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app-admin')

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>Pembayaran SPP</h3>
            </div>
        </div>

        <table class="table table-bordered mt-5" id="table-bayar1" name="data-bayar" style="width: 500px">
            <tr>
                <td>NIS</td>
                <td>ISIAN NIS</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>ISIAN NAMA</td>
            </tr>
        </table>
        <table class="table table-bordered" id="table-pembayaran2" name="pembayaran-siswa" style="width: 500px">
            <tr>
                <td>PEMBAYARAN</td>
                <td>Kelas</td>
            </tr>
        </table>
    </div>
@endsection

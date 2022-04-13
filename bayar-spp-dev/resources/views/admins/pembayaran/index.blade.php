@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header">
        <h1 class="page-title mt-3" style="font-size: 28px">
            Pembayaran SPP
            <hr class="solid">
        </h1>
    </div>
    @if (Session::get('msg'))
        <div class="card-alert alert alert-{{ Session::get('type') }}" id="message" style="border-radius: 0px !important">
            @if (Session::get('type') == 'success')
                <i class="bi bi-check-lg" aria-hidden="true"></i>
            @else
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            @endif
            {{ Session::get('msg') }}
        </div>
    @endif
    <div class="row">
        <div class="col-10">
            <div class="form-group">
                <label class="form-label" style="font-size: 20px">Siswa</label>
                <select class="form-control" id="siswa" name="siswa_id">
                    <option value="#">[-- Pilih Siswa --]</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama . ' - ' . $item->kelas->nama }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran SPP</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        @csrf
                        <div class="form-group" style="display:none" id="form-tagihan">
                            <label class="form-label">Tagihan</label>
                            <select id="tagihan" class="form-control" name="tagihan_id">

                            </select>
                        </div>
                        <div class="form-group" style="display:none" id="form-tagihan-2">
                            <label class="form-label">Total Tagihan</label>
                            <span id="harga">@currency(0)</span>
                        </div>
                        <div class="form-group" style="display: none" id="form-total">
                            <label class="form-label">Total Pembayaran</label>
                            <input type="text" name="pembayaran" class="form-control" id="total" readonly>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary ml-auto" style="display: none" id="btn-simpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    {{-- <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: black;
        }

        .select2 {
            width: 100% !important;
        }

    </style> --}}
@endsection

@section('js')
    <script>
        require(['jquery', 'select2', 'sweetalert'], function($, select2, sweetalert) {
            $(document).ready(function() {
                $('#siswa').select2({
                    placeholder: "Pilih Siswa",
                });
                $('#tagihan').select2({});
            });
        });
    </script>
@endsection

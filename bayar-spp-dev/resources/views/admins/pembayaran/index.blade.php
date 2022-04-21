@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header">
        <div class="col-10">
            <h1 class="page-title mt-3" style="font-size: 28px">
                Pembayaran SPP
                <hr class="solid mt-2">
            </h1>
        </div>
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
                    <div class="col-10 ml-5">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Siswa</label>
                            <select class="form-control" id="siswa" name="siswa_id">
                                <option value="#">[-- Cari Siswa --]</option>
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama . ' - ' . $item->kelas->nama }} </option>
                                @endforeach
                            </select>
                            <span id="loading">...</span>
                        </div>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaksi</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-hover text-wraps">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Tanggal</th>
                                <th>Siswa</th>
                                <th>Tagihan</th>
                                <th>Terbayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $index => $item)
                                <tr><span class="text-muted">{{ $index + 1 }}</span></tr>
                                <tr>{{ $item->created_at->format('d-m-Y') }}</tr>
                                <td>
                                    <a href="{{ route('siswa.show', $item->siswa->id) }}" target="_blank">
                                        {{ $item->siswa->nama . '(' . $item->siswa->kelas->nama . ')' }}
                                    </a>
                                </td>
                                <td>{{ $item->tagihan->nama }}</td>
                                <td>@currency($item->jumlah)</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: black;
        }

        .select2 {
            width: 100% !important;
        }

    </style>
@endsection

@section('js')
    <script>
        require(['jquery', 'select2', 'sweetalert'], function($, select2, sweetalert) {
            $(document).ready(function() {
                function formatNumber(num) {
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                }
                $('#siswa').select2({
                    placeholder: "Cari Siswa",
                });
                $('#tagihan').select2({});

                let siswa_id;
                let tagihan_id;
                let total;

                $('#siswa').on('change', function() {
                    if (this.value == '#') {
                        $('#form-tagihan').hide()
                        $('#form-tagihan-2').hide()
                        $('#form-total').hide()
                        $('#btn-simpan').hide()
                        return;
                    } else {
                        siswa_id = this.value
                    }

                    //get load tagihan
                    $.ajax({
                        url: "{{ route('api/getload') }}/" + this.value,
                        success: function(result) {
                            $('#loading').text("*Siswa ditemukan*")
                            $('#form-tagihan').show()
                            $('#form-tagihan-2').show()
                            $('#form-total').show()
                            $('#btn-simpan').show()
                        },
                        beforeSend: function() {
                            $('#loading').text('tunggu, sedang loading.....')
                            $('#form-tagihan').hide()
                            $('#form-tagihan-2').hide()
                            $('#form-total').hide()
                            $('#btn-simpan').hide()
                        }
                    });

                    // get tagihan siswa
                    $.ajax({
                        url: "{{ route('api/gettagihan') }}/" + this.value,
                        success: function(result) {
                            if (result.length == 0) {
                                alert('tidak ada item tagihan yang tersedia')
                            }
                            $("#tagihan").empty()
                            for (i = 0; i < result.length; i++) {
                                $("#tagihan").append('<option value="' + result[i].id +
                                    '" data-harga="' + result[i].jumlah + '">' +
                                    result[i].nama + '</option>');
                            }
                            tagihan_id = result[0].id
                            harga = result[0].jumlah
                            //menampilkan harga
                            $('#harga').text(formatNumber(harga));
                            $('#total').val(formatNumber(harga));
                        },
                    });
                })

                $('#tagihan').on('change', function() {
                    tagihan_id = this.value
                    // set harga dari opsi
                    harga = $('option:selected', this).attr('data-harga');

                    ('#harga').text(formatNumber(harga));
                    $('#total').val(formatNumber(harga));

                })
            });
        });
    </script>
@endsection

@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Pembayaran Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" class="card" action="{{ route('admins/pembayaran/store', $siswa->nis) }}">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Pembayaran Siswa</h5>
                </div>
                <x-alert />
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorrs }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input required="" type="hidden" name="siswa_id" value="{{ $siswa->id }}" readonly
                                    id="siswa_id" class="form-control">
                                <input required="" type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}"
                                    readonly id="nama_siswa" class="form-control">
                                @error('nama_siswa')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="form-label">NIS</label>
                                <input required="" type="text" name="nis" value="{{ $siswa->nis }}" readonly
                                    id="nis" class="form-control">
                                @error('nis')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="form-label">Kelas</label>
                                <input required type="text" name="kelas" value="{{ $siswa->kelas->nama_kelas }}"
                                    readonly id="kelas" class="form-control">
                                @error('kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_bayar">Periode</label>
                                <select required="" name="tahun_bayar" id="tahun_bayar" class="form-control select2bs4">
                                    <option disabled="" selected="">-- Pilih Periode --</option>
                                    @foreach ($tagihan as $item)
                                        <option value="{{ $item->periode }}">{{ $item->periode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah_bayar" id="nominal_spp_label">Nominal</label>
                                <input type="" name="nominal" readonly="" id="nominal" class="form-control">
                                <input required="" type="hidden" name="jumlah_bayar" readonly="" id="jumlah_bayar"
                                    class="form-control">
                                @error('jumlah_bayar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group select2-purple">
                                <label for="bulan_bayar">Bulan</label>
                                <select required="" name="bulan_bayar[]" id="bulan_bayar" class="select2"
                                    multiple="multiple" data-dropdown-css-class="select2-purple"
                                    data-placeholder=" Pilih Bulan " style="width: 100%;">
                                    @foreach (Universe::bulanAll() as $bulan)
                                        <option value="{{ $bulan['nama_bulan'] }}">{{ $bulan['nama_bulan'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="total_bayar"><strong>Total Bayar</strong></label>
                                <input required="" type="" name="total_bayar" readonly="" id="total_bayar"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto" onclick="simpan()">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        require(['jquery', 'select2', 'sweetalert'], function($, select2, sweetalert) {
            $(document).ready(function() {

                // $('.custom-select').selectize({});
                $('.select2').select2({});

                function rupiah(number) {
                    var formatter = new Intl.NumberFormat('ID', {
                        style: 'currency',
                        currency: 'idr',
                    })

                    return formatter.format(number)
                }

                $(document).on("change", "#tahun_bayar", function() {
                    var periode = $(this).val()

                    $.ajax({
                        url: "/pembayaran/spp/" + periode,
                        method: "GET",
                        success: function(response) {
                            $("#nominal_spp_label").html(`Nominal Spp Periode ` +
                                periode + ':')
                            $("#nominal").val(response.nominal_rupiah)
                            $("#jumlah_bayar").val(response.data.nominal)
                        }
                    })
                })

                $(document).on("change", "#bulan_bayar", function() {
                    var bulan = $(this).val()
                    var total_bulan = bulan.length
                    var total_bayar = $("#jumlah_bayar").val()
                    var hasil_bayar = (total_bulan * total_bayar)

                    var formatter = new Intl.NumberFormat('ID', {
                        style: 'currency',
                        currency: 'idr',
                    })
                    $("#total_bayar").val(formatter.format(hasil_bayar))
                })
            })
        })
    </script>
@endsection

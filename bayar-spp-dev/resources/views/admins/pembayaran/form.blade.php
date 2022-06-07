@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Pembayaran Siswa
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form method="POST" class="card" action="{{ route('admins/pembayaran/store', $siswa->nis) }}">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Pembayaran Siswa</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorrs)
                                {{ $erorrs }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Nama Siswa</label>
                                <input required="" type="text" name="nama" value=" {{ $siswa->nama }}" readonly id="nama"
                                    class="form-control">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">NIS</label>
                                <input required="" type="text" name="nis" value="{{ $siswa->nis }}" readonly id="nis"
                                    class="form-control">
                                @error('nis')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Kelas</label>
                                <input required type="text" name="kelas"
                                    value="{{ $siswa->kelas->nama }} - {{ $jurusan->nama }} " readonly id="kelas"
                                    class="form-control">
                                @error('kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Bulan</label>
                                <select required name="bulan_bayar[]" id="select-beast" class="form-control custom-select">
                                    <option value="">-- Pilih Bulan --</option>
                                    @foreach (Universe::bulanAll() as $bulan)
                                        <option value="{{ $bulan['nama_bulan'] }}">{{ $bulan['nama_bulan'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="form-label">Periode</label>
                                <select required name="periode" id="select-beast" class="form-control custom-select">
                                    <option disabled="" selected>-- Pilih Periode</option>
                                    @foreach ($tagihan as $item)
                                        <option value="{{ $item->periode }}">{{ $item->periode }}</option>
                                    @endforeach
                                </select>
                                @error('periode')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="jumlah" id="tagihan">Tagihan</label>
                                <select required name="jumlah" id="select-beast" class="form-control custom-select">
                                    <option disabled="" selected>-- Pilih Tagihan</option>
                                    @foreach ($tagihan as $item)
                                        <option value="{{ $item->jumlah }}">@currency($item->jumlah) </option>
                                    @endforeach
                                </select>
                                @error('jumlah')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        require(['jquery', 'selectize'], function($, selectize) {
            $(document).ready(function() {

                $('.custom-select').selectize({});

                // function rupiah(number) {
                //     var formatter = new Intl.NumberFormat('ID', {
                //         style: 'currency',
                //         currency: 'idr',
                //     })

                //     return formatter.format(number)
                // }

                // $(document).on("change", "#periode", function() {

                //     let periode = $(this).val()

                //     $.ajax({
                //         url: "/pembayaran/spp/" + periode,
                //         method: "GET",
                //         success: function(response) {
                //             // $("#jumlah_tagihan").html(`Tagihan ` + periode + ':')
                //             $("#nominal").val(response.nominal_rupiah)
                //             $("#jumlah_bayar").val(response.data.jumlah)
                //         }
                //     })
                // })
            })
        })
    </script>
@endsection

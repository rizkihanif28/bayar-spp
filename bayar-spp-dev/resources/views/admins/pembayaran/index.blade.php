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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran SPP</h4>
                </div>
                @if (Session::get('msg'))
                    <div class="card-alert alert alert-{{ Session::get('type') }}" id="message"
                        style="border-radius: 0px !important">
                        @if (Session::get('type') == 'success')
                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                        @else
                            <i class="bi bi-x-lg" aria-hidden="true"></i>
                        @endif
                        {{ Session::get('msg') }}
                    </div>
                @endif
                <div class="p-3 text-center">
                    <table id="table-siswa" class="table table-striped card-table table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    {{-- <td><span class="text-muted">{{ $index + 1 }}</span></td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kelas->nama }} - {{ $item->jurusan->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admins/pembayaran/create', $item->nis) }}" title="bayar">
                                            <i class="bi bi-wallet"></i> Bayar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        requirejs(["datatables"], function() {
            $("#table-siswa").dataTable();
        });
    </script>
@endsection

{{-- @section('js') --}}
{{-- <script>
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
                let harga;

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
                            //set harga dari data pertama
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
                    // harga = $('option:selected', this).attr('data-harga');

                    // Menampilkan harga dan total
                    $('#harga').text(formatNumber(harga));
                    $('#total').val(formatNumber(harga));

                })
                // batas
                $('#btn-simpan').on('click', function() {
                    console.log(harga);
                    $('#btn-simpan')
                    $.ajax({
                        type: "POST",
                        url: "{{ route('api/bayar-spp') }}/" + siswa_id,
                        data: {
                            siswa_id: siswa_id,
                            tagihan_id: tagihan_id,
                            jumlah: harga
                        },
                        success: function(data) {
                            console.log(data);
                            swal({
                                title: data.msg
                            })
                            setTimeout(() => {
                                window.location.reload()
                            }, 2000)
                        },
                        error: function(data) {
                            swal({
                                title: "Terjadi kesalahan pada transaksi, Transaksi dibatalkan"
                            })
                            setTimeout(() => {
                                window.location.reload()
                            }, 2000)
                        }
                    });
                })

            });
        });
    </script> --}}
{{-- @endsection --}}

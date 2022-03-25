@extends('layouts.app-tatus')

@section('content-tatus')
    {{-- Table Data Siswa --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <h4>DAFTAR SISWA</h4>
                <button type="button" class="btn btn-primary mt-4 mb-4" id="tambah" data-bs-toggle="modal"
                    data-bs-target="#create">
                    + Tambah Siswa
                </button>
            </div>
        </div>

        {{-- Modal Untuk Create Siswa --}}
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Kesiswaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- Modal Body Create --}}
                    <div class="modal-body">
                        {{-- form input siswa --}}
                        <form action="tatus/store-siswa" method="post" id="form-store">
                            @csrf
                            <div class="mb-3">
                                <label for="siswa_id" class="form-label">SISWA ID</label>
                                <input type="text" class="form-control" id="siswa_id" placeholder="Masukan Id Siswa">
                                <input type="hidden" id="id" name="id">
                            </div>

                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="nis" class="form-control" id="nis" placeholder="Masukan Nis Siswa">
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukan Email">
                            </div>


                            <div class="form-group mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input class="form-control" list="datalistOptions" id="jenis_kelamin"
                                    placeholder="Pilih Jenis Kelamin" required>
                                <datalist id="datalistOptions">
                                    <option value="L">
                                    <option value="P">
                                </datalist>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input class="form-control" list="datalistKelas" id="kelas" placeholder="Pilih Kelas"
                                    required>
                                <datalist id="datalistKelas">
                                    <option value="X">
                                    <option value="XI">
                                    <option value="XII">
                                </datalist>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input class="form-control" list="datalistJurusan" id="jurusan"
                                    placeholder="Pilih Jurusan" required>
                                <datalist id="datalistJurusan">
                                    <option value="Teknik Sepeda Motor">
                                    <option value="Teknik Kendaraan Ringan">
                                    <option value="Akutansi">
                                    <option value="Administrasi Perkantoran">
                                </datalist>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" placeholder="Masukan Alamat" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input class="form-control" id="telepon" rows="3" placeholder="Masukan No Telepon"
                                    required>
                            </div>

                        </form>
                    </div>
                    {{-- Modal Body Create --}}
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="save" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- table siswa mengelola dengan server side --}}
        <table class="table table-striped table-light" id="table-data" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>JK</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


        {{-- Load Data Table Siswa --}}
        <script>
            $(document).ready(function() {
                index()
            })

            // Menambahkan data load data-table
            function index() {
                $('#table-data').DataTable({
                    serverside: true,
                    responseive: true,
                    ajax: {
                        url: "{{ route('tatus/daftar-siswa') }}"
                    },

                    columns: [{
                            "data": null,
                            "sortable": false,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1
                            }
                        },
                        {
                            data: 'siswa_id',
                            name: 'siswa_id'
                        },
                        {
                            data: 'nis',
                            name: 'nis'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin'
                        },
                        {
                            data: 'kelas',
                            name: 'kelas'
                        },
                        {
                            data: 'jurusan',
                            name: 'jurusan'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'telepon',
                            name: 'telepon'
                        },
                        {
                            data: 'aksi',
                            name: 'aksi'
                        }
                    ]
                })
            }
        </script>

        {{-- post data siswa ajax --}}
        <script>
            $('#save').on('click', function() {
                if ($(this).text() === 'Save Update') {
                    updates()
                } else {
                    // Jika tidak maka menambah data
                    $.ajax({
                        url: "{{ route('tatus/store-siswa') }}",
                        type: "post",
                        data: {
                            siswa_id: $('#siswa_id').val(),
                            nis: $('#nis').val(),
                            nama: $('#nama').val(),
                            email: $('#email').val(),
                            jenis_kelamin: $('#jenis_kelamin').val(),
                            kelas: $('#kelas').val(),
                            jurusan: $('#jurusan').val(),
                            alamat: $('#alamat').val(),
                            telepon: $('#telepon').val(),
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            console.log(res);
                            alert(res.message)
                            $("#close").click()
                            $("#table-data").DataTable().ajax.reload()
                            $("#form-store")[0].reset()
                        },
                        error: function(xhr) {
                            alert(xhr.responJson.message)
                        }
                    })

                }

            })

            // Update
            $(document).on('click', '.update', function() {
                let id = $(this).attr('id')
                $("#tambah").click()
                $("#save").text('Save Update')

                $.ajax({
                    url: "{{ route('tatus/edits-siswa') }}",
                    type: "post",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        $('#id').val(res.message.id)
                        $('#siswa_id').val(res.message.siswa_id)
                        $('#nis').val(res.message.nis)
                        $("#nama").val(res.message.nama)
                        $("#email").val(res.message.email)
                        $("#jenis_kelamin").val(res.message.jenis_kelamin)
                        $("#kelas").val(res.message.kelas)
                        $("#jurusan").val(res.message.jurusan)
                        $("#alamat").val(res.message.alamat)
                        $("#telepon").val(res.message.telepon)
                    }
                })
            })

            function updates() {
                $.ajax({
                    url: "{{ route('tatus/updates-siswa') }}",
                    type: "post",
                    data: {
                        id: $('#id').val(),
                        siswa_id: $('#siswa_id').val(),
                        nis: $('#nis').val(),
                        nama: $('#nama').val(),
                        email: $('#email').val(),
                        jenis_kelamin: $('#jenis_kelamin').val(),
                        kelas: $('#kelas').val(),
                        jurusan: $('#jurusan').val(),
                        alamat: $('#alamat').val(),
                        telepon: $('#telepon').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res);
                        alert(res.message)
                        $("#close").click()
                        $("#table-data").DataTable().ajax.reload()
                        $("#form-store")[0].reset()
                        $("#save").text('Create Siswa')
                    },
                    error: function(xhr) {
                        alert(xhr.responJson.message)
                    }
                })
            }

            $(document).on('click', '.delete', function() {
                let id = $(this).attr('id')

                $.ajax({
                    url: "{{ route('tatus/destroy-siswa') }}",
                    type: "post",
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(params) {
                        alert(params.message)
                        $("#table-data").DataTable().ajax.reload()
                    }

                })
            })
        </script>
    @endpush
@endsection

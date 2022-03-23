@extends('layouts.app-tatus')

@section('content-tatus')
    {{-- Table Data Siswa --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <h4>DAFTAR SISWA</h4>
                <button type="button" id="tambah" class="btn btn-primary mt-4" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    + Tambah Siswa
                </button>
                <div id="tambah" class="mb-4"></div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form input siswa --}}
                        <form action="tatus/store-siswa" method="post" id="form-store">
                            @csrf
                            <div class="p-2">
                                <div class="form-group mb-4">
                                    <input type="text" name="siswa-id" class="form-control" id="siswa_id"
                                        placeholder="ID SISWA" required>
                                    <input type="hidden" id="id" name="id">
                                </div>

                                <div class="form-group mb-4">
                                    <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS"
                                        required>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="name" name="name" class="form-control" id="name" placeholder="Nama"
                                        required>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email Address" required>
                                </div>

                                <div class="form-group mb-4">
                                    <input class="form-control" list="datalistOptions" id="jenis_kelamin"
                                        placeholder="Jenis Kelamin" required>
                                    <datalist id="datalistOptions">
                                        <option value="L">
                                        <option value="P">
                                    </datalist>
                                </div>

                                <div class="form-group mb-4">
                                    <input class="form-control" list="datalistKelas" id="kelas" placeholder="Kelas"
                                        required>
                                    <datalist id="datalistKelas">
                                        <option value="X">
                                        <option value="XI">
                                        <option value="XII">
                                    </datalist>
                                </div>

                                <div class="form-group mb-4">
                                    <input class="form-control" list="datalistJurusan" id="jurusan" placeholder="Jurusan"
                                        required>
                                    <datalist id="datalistJurusan">
                                        <option value="Teknik Sepeda Motor">
                                        <option value="Teknik Kendaraan Ringan">
                                        <option value="Akutansi">
                                        <option value="Administrasi Perkantoran">
                                    </datalist>
                                </div>

                                <div class="form-group mb-3">
                                    <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat" required></textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="text" name="telepon" class="form-control" id="telepon"
                                        placeholder="Telepon" required>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="save" class="btn btn-primary">Save</button>
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


        {{-- Data Table --}}
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
                if ($(this).text() === "Save Update") {
                    update()
                } else {
                    $.ajax({
                        url: "{{ route('tatus/store-siswa') }}",
                        type: "post",
                        data: {
                            siswa_id: $('#siswa_id').val(),
                            nis: $('#nis').val(),
                            nama: $('#name').val(),
                            email: $('#email').val(),
                            jenis_kelamin: $('#jenis_kelamin').val(),
                            kelas: $('#kelas').val(),
                            jurusan: $('#jurusan').val(),
                            alamat: $('#alamat').val(),
                            telepon: $('#telepon').val(),
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            console.log(res.message);
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

            // Update function
            $(document).on('click', '.update', function() {
                let id = $(this).attr('id')
                $("#tambah").click()
                $("#save").text("Save Update")

                $.ajax({
                    url: "{{ route('tatus/update-siswa') }}",
                    type: "post",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        $('#id').val(res.data.id)
                        $('#siswa_id').val(res.data.siswa_id)
                        $('#nis').val(res.data.nis)
                        $('#name').val(res.data.name)
                        $('#email').val(res.data.email)
                        $('#jenis_kelamin').val(res.data.jenis_kelamin)
                        $('#kelas').val(res.data.kelas)
                        $('#jurusan').val(res.data.jurusan)
                        $('#alamat').val(res.data.alamat)
                        $('#telepon').val(res.data.telepon)
                    }
                })

            })

            function update() {
                $.ajax({
                    url: "{{ route('tatus/update-siswa') }}",
                    type: "post",
                    data: {
                        id: $('#id').val(),
                        siswa_id: $('#siswa_id').val(),
                        nis: $('#nis').val(),
                        nama: $('#name').val(),
                        email: $('#email').val(),
                        jenis_kelamin: $('#jenis_kelamin').val(),
                        kelas: $('#kelas').val(),
                        jurusan: $('#jurusan').val(),
                        alamat: $('#alamat').val(),
                        telepon: $('#telepon').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res.message);
                        alert(res.message)
                        $("#close").click()
                        $("#table-data").DataTable().ajax.reload()
                        $("#form-store")[0].reset()
                        $("#save").text("Save")
                    },
                    error: function(xhr) {
                        alert(xhr.responJson.message)
                    }
                })
            }
        </script>
    @endpush
@endsection

@extends('layouts.app-tatus')

@section('content-tatus')
    {{-- Table Data Siswa --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h3>DAFTAR SISWA</h3>
                <button type="submit" class="btn btn-primary mt-3" onclick="create()">+ Tambah Siswa</button>
                <div id="read" class="mt-3"></div>
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
                        <div id="page-create" class="mt-1">Submit</div>
                    </div>
                </div>
            </div>
        </div>

        <table id="table-data1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Siswa ID</th>
                    <th>Nomor Induk Siswa</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
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
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        {{-- Data Table --}}
        <script>
            $(document).ready(function() {
                store()
            });

            function store() {
                $('#table-data1').DataTable({
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
                    ]
                })
            }
        </script>
    @endpush
@endsection

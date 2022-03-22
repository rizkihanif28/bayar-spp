@extends('layouts.app-admin')

@section('content-admin')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h3>DAFTAR SISWA</h3>
                <button type="submit" class="btn btn-primary mt-3" onclick="create()">+ Tambah Siswa</button>
                <div id="read" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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

    <script>
        $(document).ready(function() {
            read("#table-data");
        });

        // read database
        function read() {
            $.get("{{ url('admin/read-siswa') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        };

        // Page Create Siswa
        function create() {
            $.get("{{ url('admin/create-siswa') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('TAMBAH SISWA')
                $("#page-create").html(data);
                $("#exampleModal").modal("show");
            });
        }
        // Proses Create Siswa
        function store() {
            const formData = {
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
            };
            $.ajax({
                type: "get",
                url: "{{ url('admin/store-siswa') }}",
                data: formData,
                success: function(data) {
                    $(".btn-close").click();
                }
            });
        }
    </script>

    @push('js')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    @endpush
@endsection

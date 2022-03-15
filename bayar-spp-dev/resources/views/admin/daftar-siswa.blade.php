@extends('layouts.app-admin')

@section('content-admin')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h3>DAFTAR SISWA</h3>
                <button type="submit" class="btn btn-primary mt-3" onclick="create()">+ Tambah Siswa</button>
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
            const name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('admin/store-siswa') }}",
                data: {
                    siswa_id: siswa_id,
                    nis: nis,
                    nama: nama,
                    email: email,
                    jenis_kelamin: jenis_kelamin,
                    kelas: kelas,
                    jurusan: jurusan,
                    alamat: alamat,
                    telepon: telepon,
                },
                success: function(data) {
                    $(".btn-close").click();
                }
            });
        }
    </script>
@endsection

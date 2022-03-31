@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Periode
        </h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 2%">
                <div class="card-header">
                    <h4 class="card-title mb-3">Periode</h4>
                    <a href="{{ route('admins/periode/create') }}" class="btn btn-outline-primary btn-sm ml-5">Tambah
                        Periode</a>
                </div>
                @if (session()->has('msg'))
                    <div class="card-alert alert alert-{{ session()->get('type') }}" id="message"
                        style="border-radius: 0px !important">
                        @if (session()->get('type') == 'success')
                            <i class="fe fe-check mr-2" aria-hidden="true"></i>
                        @else
                            <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                        @endif
                        {{ session()->get('msg') }}
                    </div>
                @endif
                <div class="table-responsive mt-3 p-3 text-left">

                    <table id="table-periode" class="table table-striped card-table table-hover table-vcenter text-nowrap">
                        <thead style="margin-top:70%">
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $index => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        {{ $item->tgl_mulai }}
                                    </td>
                                    <td>
                                        {{ $item->tgl_selesai }}
                                    </td>
                                    <td>
                                        @if ($item->is_active)
                                            <span class="tag tag-green">Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="icon" href="{{ route('admins/periode/edit', $item->id) }}"
                                            title="edit item">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="icon btn-delete" href="#!" data-id="{{ $item->id }}"
                                            title="delete item">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                        <form action="{{ route('admins/periode/destroy', $item->id) }}" method="post"
                                            id="form-{{ $item->id }}">
                                            @csrf
                                        </form>
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
    {{-- <script src="{{ asset('assets/js/vendors/sweetalert.min.js') }}"></script> --}}
    <script>
        requirejs(["datatables"], function() {
            $('#table-periode').dataTable();
        });
    </script>
    <script>
        require(['jquery', 'sweetalert'], function($, sweetalert) {
            $(document).ready(function() {

                $(document).on('click', '.btn-delete', function() {
                    formid = $(this).attr('data-id');
                    swal({
                        title: 'Anda yakin ingin menghapus?',
                        text: 'periode yang dihapus tidak dapat dikembalikan',
                        dangerMode: true,
                        buttons: {
                            cancel: true,
                            confirm: true,
                        },
                    }).then((result) => {
                        if (result) {
                            $('#form-' + formid).submit();
                        }
                    })
                })

            });
        });
    </script>
@endsection

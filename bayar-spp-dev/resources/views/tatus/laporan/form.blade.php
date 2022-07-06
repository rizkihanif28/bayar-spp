@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Print Laporan
        </h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" class="card" action="{{ route('tatus/laporan/print') }}">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Print</h5>
                </div>
                <x-alert />
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="tanggal_mulai"><strong>Tanggal Mulai</strong></label>
                                <input type="date" name="tanggal_mulai" required class="form-control" id="tanggal_mulai">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="tanggal_selesai"><strong>Tanggal Selesai</strong></label>
                                <input type="date" name="tanggal_selesai" required class="form-control"
                                    id="tanggal_selesai">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right form-group">
                    <button type="submit" class="btn btn-danger d-flex" style="font-size: 15px">
                        <i class="bi bi-printer"></i>Print
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        requirejs(["datatables"], function() {});
    </script>
@endsection

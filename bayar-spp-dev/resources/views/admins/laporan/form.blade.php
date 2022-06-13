@extends('layouts.app-admin')

@section('content-admin')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Print Laporan
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form action="POST" class="card" action="#">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Print</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="tanggal_mulai"><strong>Tanggal Mulai</strong></label>
                                <input type="date" name="tanggal_mulai" required class="form-control" id="tanggal_mulai">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="tanggal_selesai"><strong>Tanggal Selesai</strong></label>
                                <input type="date" name="tanggal_selesai" required class="form-control"
                                    id="tanggal_selesai">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-printer"></i>Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

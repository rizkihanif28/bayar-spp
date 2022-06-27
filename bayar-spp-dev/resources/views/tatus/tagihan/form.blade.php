@extends('layouts.app-tatus')

@section('content-tatus')
    <div class="page-header" style="margin-top: 7%">
        <h2 class="page-title">
            Form Tagihan
        </h2>
    </div>
    <div class="row">
        <div class="col-8">
            <form class="card"
                action="{{ isset($tagihan) ? route('tatus/tagihan/update', $tagihan->id) : route('tatus/tagihan/store') }}"
                method="POST">
                <div class="card-header">
                    <h5 class="cartd title">Tagihan</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $erorr)
                                {{ $errors }} <br>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Periode</label>
                                <input required type="text" placeholder="Periode" name="periode" id="periode"
                                    class="form-control"
                                    value="{{ isset($tagihan) ? $tagihan->periode : old('periode') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jumlah</label>
                                <input required type="text" placeholder="Nominal" name="nominal" id="nominal"
                                    class="form-control"
                                    value="{{ isset($tagihan) ? $tagihan->nominal : old('nominal') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="{{ route('tatus/tagihan/index') }}" class="btn btn-link">Batal</a>
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
            });
        });
    </script>
@endsection

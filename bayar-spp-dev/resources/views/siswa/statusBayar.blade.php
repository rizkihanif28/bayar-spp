@extends('layouts.app-siswa')

@section('content-siswa')
    <div class="container ml-9">
        <div class="page-header" style="margin-top: 8%">
            <h2 class="page-title">
                Status Pembayaran SPP
            </h2>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm">
                            <i class="bi bi-bookmarks-fill"></i>Pilih Tahun
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($tagihan as $item)
                                @if ($item->periode == date('Y'))
                                    <a href="{{ route('siswa/status/show', [$item->periode]) }}"
                                        class="list-group-item list-group-item-action active">
                                        {{ $item->periode }}
                                    </a>
                                @else
                                    <a href="{{ route('siswa/status/show', [$item->periode]) }}"
                                        class="list-group-item list-group-item-action">
                                        {{ $item->periode }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

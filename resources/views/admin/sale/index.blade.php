@extends('layouts.admin.master')

@section('page_title')
    {{ __('Penjualan') }}
@endsection

@section('section_header_title')
    {{ __('Penjualan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Penjualan') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Penjualan') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data penjualan') }}
                            </p>
                        </div>
                    </div>
                    @can('setor tabungan create')
                        <div class="d-flex" role="search">
                            <a href="{{ route('admin.sale.create') }}" class="btn btn-primary">
                                {{ __('Baru') }}
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="card-body">
                    <button class="btn btn-primary-light" type="button" disabled="">
                        <span class="align-middle spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        Loading...
                    </button>
                    <button type="button" class="btn btn-primary btn-wave waves-effect waves-light btn_process"
                        onclick="ajaxDelete()">
                        Primary
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@push('scripts')
    <script>
        function ajaxDelete() {
            $('.btn_process').text("{{ __('Processing...') }}");
            $('.btn_process').attr('disabled', 'disabled');
            $('.btn_process').prepend(
                '<span class="align-middle spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;'
            );
        }
    </script>
@endpush

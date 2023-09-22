@extends('layouts.admin.master')

@section('page_title')
    {{ __('Plafon Pinjaman') }}
@endsection

@section('section_header_title')
    {{ __('Plafon Pinjaman') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Plafon Pinjaman') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Plafon Pinjaman') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data plafon pinjaman') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                    <th scope="col" width="5%">{{ __('Aksi') }}</th>
                                    <th scope="col">{{ __('Masa Kerja') }}</th>
                                    <th scope="col">{{ __('Level') }}</th>
                                    <th scope="col">{{ __('Jaminan') }}</th>
                                    <th scope="col">{{ __('Aset') }}</th>
                                    <th scope="col">{{ __('Index') }}</th>
                                    <th scope="col">{{ __('Maximal Pinjaman') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@include('layouts.admin.includes.datatable')

@push('scripts')
    <script>
        let table_data;

        table_data = $('#table_data').DataTable({
            processing: true,
            autoWidth: false,
            responsive: true,
            serverSide: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            ajax: {
                url: '{{ route('admin.plafond.data') }}',
            },
            columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                sortable: false,
            }, {
                data: 'action',
                searchable: false,
                sortable: false,
            }, {
                data: 'years_of_work',
                searchable: true,
                sortable: true,
            }, {
                data: 'level',
                searchable: true,
                sortable: true,
            }, {
                data: 'warranty',
                searchable: true,
                sortable: true,
            }, {
                data: 'asset',
                searchable: true,
                sortable: true,
            }, {
                data: 'index',
                searchable: true,
                sortable: true,
            }, {
                data: 'max_loan',
                searchable: true,
                sortable: true,
            }],
        });
    </script>
@endpush

@extends('layouts.admin.master')

@section('page_title')
    {{ __('Pengurus Koperasi') }}
@endsection

@section('section_header_title')
    {{ __('Pengurus Koperasi') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Pengurus Koperasi') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Pengurus Koperasi') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data pengurus koperasi') }}
                            </p>
                        </div>
                    </div>
                    @can('pengurus create')
                        <div class="d-flex" role="search">
                            <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                                {{ __('Baru') }}
                            </a>
                        </div>
                    @endcan

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">{{ __('Nomor') }}</th>
                                    <th scope="col" width="5%">{{ __('Aksi') }}</th>
                                    <th scope="col" width="7%"></th>
                                    <th scope="col">{{ __('NIK') }}</th>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('Departemen') }}</th>
                                    <th scope="col">{{ __('Bagian') }}</th>
                                    <th scope="col">{{ __('Role') }}</th>
                                    <th scope="col" width="10%">{{ __('Status') }}</th>
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
                url: '{{ route('admin.admin.data') }}',
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
                data: 'image',
                searchable: true,
                sortable: true,
            }, {
                data: 'nik',
                searchable: true,
                sortable: true,
            }, {
                data: 'name',
                searchable: true,
                sortable: true,
            }, {
                data: 'department',
                searchable: true,
                sortable: true,
            }, {
                data: 'section',
                searchable: true,
                sortable: true,
            }, {
                data: 'role',
                searchable: true,
                sortable: true,
            }, {
                data: 'status',
                searchable: true,
                sortable: true,
            }],
        });
    </script>
@endpush

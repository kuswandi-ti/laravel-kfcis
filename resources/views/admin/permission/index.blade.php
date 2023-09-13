@extends('layouts.admin.master')

@section('page_title')
    {{ __('Permission') }}
@endsection

@section('section_header_title')
    {{ __('Permission') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Permission') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Permission') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua permission akses user') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex" role="search">
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                            {{ __('Baru') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-3 table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">
                                        <i class='bx bx-list-ol fs-16'></i>
                                    </th>
                                    <th scope="col" width="10%">
                                        <i class='bx bxs-cog fs-16'></i>
                                    </th>
                                    <th scope="col">{{ __('Nama Permission') }}</th>
                                    <th scope="col">{{ __('Grup Permission') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12">
            @if (!empty($permission))
                <form method="POST" action="{{ route('admin.permission.update', $permission->id) }}">
                    @csrf
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('admin.permission.store') }}">
                        @csrf
            @endif

            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Input Data Permission') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Silahkan mengisi data untuk proses membuat baru atau update data permission') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('admin.permission.index') }}" class="btn btn-warning">
                            {{ __('Refresh') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-xl-12">
                            <label for="permission_name" class="form-label text-default">{{ __('Nama Permission') }}
                                <x-all-not-null /></label>
                            <input type="text" class="form-control @error('permission_name') is-invalid @enderror"
                                name="permission_name"
                                value="{{ old('permission_name') ?? (!empty($permission) ? $permission->name : '') }}"
                                placeholder="{{ __('Nama Permission') }}" required autofocus>
                            @error('permission_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xl-12">
                            <label for="group_name" class="form-label text-default">{{ __('Grup Permission') }}
                                <x-all-not-null /></label>
                            <input type="text" class="form-control @error('group_name') is-invalid @enderror"
                                name="group_name"
                                value="{{ old('group_name') ?? (!empty($permission) ? $permission->group_name : '') }}"
                                placeholder="{{ __('Grup Permission') }}" required>
                            @error('group_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </div>
            </form>
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
            ajax: {
                url: '{{ route('admin.permission.data') }}',
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
                data: 'name',
                searchable: true,
                sortable: true,
            }, {
                data: 'group_name',
                searchable: true,
                sortable: true,
            }],
        });
    </script>
@endpush

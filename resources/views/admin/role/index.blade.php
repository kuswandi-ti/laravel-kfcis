@extends('layouts.admin.master')

@section('page_title')
    {{ __('Role') }}
@endsection

@section('section_header_title')
    {{ __('Role') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Role') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Role') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua role akses user') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex" role="search">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
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
                                    <th scope="col">{{ __('Nama Role') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12">
            @if (!empty($role))
                <form method="POST" action="{{ route('admin.role.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('admin.role.store') }}">
                        @csrf
            @endif

            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Input Data Role') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Silahkan mengisi data untuk proses membuat baru atau update data role') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-warning">
                            {{ __('Refresh') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 row gy-4">
                        <div class="col-xl-12">
                            <label for="role_name" class="form-label text-default">{{ __('Nama Role') }}
                                <x-all-not-null /></label>
                            <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                name="role_name" value="{{ old('role_name') ?? (!empty($role) ? $role->name : '') }}"
                                placeholder="{{ __('Nama Role') }}" required autofocus>
                            @error('role_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row gy-4">
                        <div class="col-xl-12">
                            <div id="permission">
                                <label for="role_name" class="form-label text-default">{{ __('Permission') }}</label>
                                <div class="accordion accordionicon-left accordions-items-seperate"
                                    id="accordionPanelsStayOpenExample">
                                    @foreach ($permissions as $key => $permission)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#{{ Str::slug($key) }}" aria-expanded="true"
                                                    aria-controls="{{ Str::slug($key) }}">
                                                    {{ $key }}
                                                </button>
                                            </h2>
                                            <div id="{{ Str::slug($key) }}" class="accordion-collapse collapse show"
                                                aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    <div class="mt-2 row gy-1">
                                                        @foreach ($permission->sortBy('name') as $item)
                                                            <div class="col-xl-3">
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        value="{{ $item->name }}" type="checkbox"
                                                                        role="switch" name="permissions[]"
                                                                        id="{{ $item->id }}"
                                                                        {{ !empty($role) ? (in_array($item->name, $roles_permissions) ? 'checked' : '') : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $item->id }}">{{ $item->name }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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

<x-swal />

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
                url: '{{ route('admin.role.data') }}',
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
            }],
        });
    </script>
@endpush

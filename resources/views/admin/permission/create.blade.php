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
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.permission.store') }}">
                @csrf

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Input Data Permission') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses membuat data permission') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.permission.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
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

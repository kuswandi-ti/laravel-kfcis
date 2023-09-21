@extends('layouts.admin.master')

@section('page_title')
    {{ __('Periode') }}
@endsection

@section('section_header_title')
    {{ __('Periode') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.period.index') }}" class="text-white-50">
            {{ __('Periode') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Periode') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.period.update', $period) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Periode') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses memperbarui data periode') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.period.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Periode') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? ($period->name ?? '') }}"
                                    placeholder="{{ __('Periode') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xl-12">
                                <div class="custom-toggle-switch d-flex align-items-center">
                                    <input id="status" name="status" type="checkbox" value="1"
                                        {{ old('status') ?? ($period->status == 1 ? 'checked' : '') }}>
                                    <label for="status" class="label-primary"></label><span
                                        class="ms-3">{{ __('Status') }}</span>
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

@extends('layouts.admin.master')

@section('page_title')
    {{ __('Plafon Pinjaman') }}
@endsection

@section('section_header_title')
    {{ __('Plafon Pinjaman') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.plafond.index') }}" class="text-white-50">
            {{ __('Plafon Pinjaman') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Plafon Pinjaman') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.plafond.update', $plafond) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Plafon Pinjaman') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses memperbarui data plafon pinjaman') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.plafond.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-6">
                                <label for="years_of_work" class="form-label text-default">{{ __('Masa Kerja') }}</label>
                                <input type="text" class="form-control @error('years_of_work') is-invalid @enderror"
                                    name="years_of_work"
                                    value="{{ old('years_of_work') ?? ($plafond->years_of_work ?? '') }}"
                                    placeholder="{{ __('Masa Kerja') }}" disabled>
                                @error('years_of_work')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="level" class="form-label text-default">
                                    {{ __('Level') }}
                                    <x-web-badge-read-only />
                                </label>
                                <input type="text" class="form-control number-only @error('level') is-invalid @enderror"
                                    name="level" value="{{ old('level') ?? ($plafond->level ?? '') }}"
                                    placeholder="{{ __('Level') }}" readonly>
                                @error('level')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="warranty" class="form-label text-default">{{ __('Jaminan') }}
                                    <x-all-not-null /></label>
                                <input type="text"
                                    class="form-control number-only @error('warranty') is-invalid @enderror" name="warranty"
                                    value="{{ old('warranty') ?? ($plafond->warranty ?? 0) }}"
                                    placeholder="{{ __('Jaminan') }}" required autofocus>
                                @error('warranty')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="asset" class="form-label text-default">{{ __('Aset') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control number-only @error('asset') is-invalid @enderror"
                                    name="asset" value="{{ old('asset') ?? ($plafond->asset ?? 0) }}"
                                    placeholder="{{ __('Aset') }}" required autofocus>
                                @error('asset')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="index" class="form-label text-default">{{ __('Index') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control number-only @error('index') is-invalid @enderror"
                                    name="index" value="{{ old('index') ?? ($plafond->index ?? 0) }}"
                                    placeholder="{{ __('Index') }}" required>
                                @error('index')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="max_loan" class="form-label text-default">
                                    {{ __('Maksimal Pinjaman') }}
                                    <x-web-badge-read-only />
                                </label>
                                <input type="text"
                                    class="form-control number-only @error('max_loan') is-invalid @enderror" name="max_loan"
                                    value="{{ old('max_loan') ?? ($plafond->max_loan ?? 0) }}"
                                    placeholder="{{ __('Maksimal Pinjaman') }}" readonly>
                                @error('max_loan')
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

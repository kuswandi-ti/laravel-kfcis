@extends('layouts.admin.master')

@section('page_title')
    {{ __('Pengaturan Sistem') }}
@endsection

@section('section_header_title')
    {{ __('Pengaturan Sistem') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Pengaturan Sistem') }}</li>
@endsection

@section('page_content')
    <div class="card custom-card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                            href="#personal-info" aria-selected="true"><i
                                class="bx bx-cog me-2 fs-18 align-middle"></i>{{ __('Informasi Koperasi') }}</a>
                        <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page"
                            href="#account-settings" aria-selected="false" tabindex="-1"><i
                                class="bx bx-coin-stack me-2 fs-18 align-middle"></i>Account Settings</a>
                        <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page"
                            href="#email-settings" aria-selected="false" tabindex="-1"><i
                                class="bx bx-envelope me-2 fs-18 align-middle"></i>Email</a>
                        <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page" href="#labels"
                            aria-selected="false" tabindex="-1"><i
                                class="bx bx-label me-2 fs-18 align-middle"></i>Labels</a>
                        <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page"
                            href="#notification-settings" aria-selected="false" tabindex="-1"><i
                                class="bx bx-notification me-2 fs-18 align-middle"></i>Notifications</a>
                        <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page" href="#security"
                            aria-selected="false" tabindex="-1"><i
                                class="bx bx-shield-plus me-2 fs-18 align-middle"></i>Security</a>
                    </nav>
                </div>
                <div class="col-xl-10 col-lg-9">
                    <div class="tab-content mail-setting-tab mt-4 mt-lg-0">
                        <form method="POST" action="{{ route('admin.general_setting.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="tab-pane text-muted active show" id="personal-info" role="tabpanel">
                                <div class="p-3">
                                    <div class="row mb-3">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                            <div class="card custom-card shadow-none border border-dashed-primary">
                                                <div class="card-body p-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('Nama Koperasi') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('company_name') is-invalid @enderror"
                                                                        name="company_name" id="company_name"
                                                                        value="{{ old('company_name') ?? $setting_system['company_name'] }}"
                                                                        placeholder="{{ __('Nama Koperasi') }}" required
                                                                        autofocus>
                                                                    @error('company_name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('Nama Aplikasi') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('site_title') is-invalid @enderror"
                                                                        name="site_title" id="site_title"
                                                                        value="{{ old('site_title') ?? $setting_system['site_title'] }}"
                                                                        placeholder="{{ __('Nama Aplikasi') }}" required>
                                                                    @error('site_title')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('Email Koperasi') }} <x-all-not-null />
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="email"
                                                                        class="form-control @error('company_email') is-invalid @enderror"
                                                                        name="company_email" id="company_email"
                                                                        value="{{ old('company_email') ?? $setting_system['company_email'] }}"
                                                                        placeholder="{{ __('Email Koperasi') }}" required>
                                                                    @error('company_email')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('No. HP Koperasi') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <input type="text"
                                                                        class="form-control @error('company_phone') is-invalid @enderror"
                                                                        name="company_phone" id="company_phone"
                                                                        value="{{ old('company_phone') ?? $setting_system['company_phone'] }}"
                                                                        placeholder="{{ __('No. HP Koperasi') }}">
                                                                    @error('company_phone')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('Alamat Koperasi') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address"
                                                                        id="company_address" rows="5" placeholder="{{ __('Alamat Koperasi') }}">{{ old('company_address') ?? $setting_system['company_address'] }}</textarea>
                                                                    @error('company_address')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div
                                                                class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                                <div class="col-xl-3">
                                                                    <span class="fs-14 fw-semibold mb-0">
                                                                        {{ __('Logo Koperasi') }}
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-9">
                                                                    <div class="row">
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="card custom-card shadow-none border border-dashed-primary">
                                                                                <div class="card-body p-3 text-center">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="file-format-icon mb-2">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo']) ? $setting_system['company_logo'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                                        class="object-fit-cover img-fluid rounded preview-path_image_company_logo"
                                                                                                        alt="...">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Koperasi') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    {{ __('Utama') }}
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_logo"
                                                                                                        onchange="preview('.preview-path_image_company_logo', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_logo"
                                                                                                        value="{{ $setting_system['company_logo'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="card custom-card shadow-none border border-dashed-primary">
                                                                                <div class="card-body p-3 text-center">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="file-format-icon mb-2">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_favicon']) ? $setting_system['company_favicon'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                                        class="object-fit-cover img-fluid rounded preview-path_image_company_favicon"
                                                                                                        alt="...">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Koperasi') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    {{ __('Favicon') }}
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_favicon"
                                                                                                        onchange="preview('.preview-path_image_company_favicon', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_favicon"
                                                                                                        value="{{ $setting_system['company_favicon'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                                                                            <div
                                                                                class="card custom-card shadow-none border border-dashed-primary">
                                                                                <div class="card-body p-3 text-center">
                                                                                    <a href="javascript:void(0);">
                                                                                        <div
                                                                                            class="justify-content-between">
                                                                                            <div
                                                                                                class="file-format-icon mb-2">
                                                                                                <div class="text-center">
                                                                                                    <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo_light_big']) ? $setting_system['company_logo_light_big'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                                        class="object-fit-cover img-fluid rounded preview-path_image_company_logo_light_big"
                                                                                                        alt="...">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <span class="fw-semibold">
                                                                                                    {{ __('Logo Koperasi') }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="fs-10 d-block text-muted">
                                                                                                    {{ __('Light Big (125 x 33)') }}
                                                                                                </span>
                                                                                                <div class="mt-3">
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="file"
                                                                                                        name="image_company_logo_light_big"
                                                                                                        onchange="preview('.preview-path_image_company_logo_light_big', this.files[0])">
                                                                                                    <input type="hidden"
                                                                                                        name="old_image_company_logo_light_big"
                                                                                                        value="{{ $setting_system['company_logo_light_big'] ?? '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="d-grid gap-2 mt-4">
                                                        <button class="btn btn-primary" type="submit">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo']) ? $setting_system['company_logo'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_logo"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Utama') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_logo"
                                                                                onchange="preview('.preview-path_image_company_logo', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_logo"
                                                                                value="{{ $setting_system['company_logo'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo_light_big']) ? $setting_system['company_logo_light_big'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_logo_light_big"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Light Big (125 x 33)') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_logo_light_big"
                                                                                onchange="preview('.preview-path_image_company_logo_light_big', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_logo_light_big"
                                                                                value="{{ $setting_system['company_logo_light_big'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo_dark_big']) ? $setting_system['company_logo_dark_big'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_logo_dark_big"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Dark Big (125 x 33)') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_logo_dark_big"
                                                                                onchange="preview('.preview-path_image_company_logo_dark_big', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_logo_dark_big"
                                                                                value="{{ $setting_system['company_logo_dark_big'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_favicon']) ? $setting_system['company_favicon'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_favicon"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Favicon') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_favicon"
                                                                                onchange="preview('.preview-path_image_company_favicon', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_favicon"
                                                                                value="{{ $setting_system['company_favicon'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo_light_small']) ? $setting_system['company_logo_light_small'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_logo_light_small"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Light Small (35 x 33)') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_logo_light_small"
                                                                                onchange="preview('.preview-path_image_company_logo_light_small', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_logo_light_small"
                                                                                value="{{ $setting_system['company_logo_light_small'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                    <div class="card custom-card shadow-none border border-dashed-primary">
                                                        <div class="card-body p-3 text-center">
                                                            <a href="javascript:void(0);">
                                                                <div class="justify-content-between">
                                                                    <div class="file-format-icon mb-2">
                                                                        <div class="text-center">
                                                                            <img src="{{ url(config('common.path_storage') . (!empty($setting_system['company_logo_dark_small']) ? $setting_system['company_logo_dark_small'] : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                                class="object-fit-cover img-fluid rounded preview-path_image_company_logo_dark_small"
                                                                                alt="...">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="fw-semibold">
                                                                            {{ __('Logo Koperasi') }}
                                                                        </span>
                                                                        <span class="fs-10 d-block text-muted">
                                                                            {{ __('Dark Small (35 x 33)') }}
                                                                        </span>
                                                                        <div class="mt-3">
                                                                            <input class="form-control" type="file"
                                                                                name="image_company_logo_dark_small"
                                                                                onchange="preview('.preview-path_image_company_logo_dark_small', this.files[0])">
                                                                            <input type="hidden"
                                                                                name="old_image_company_logo_dark_small"
                                                                                value="{{ $setting_system['company_logo_dark_small'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="tab-pane p-4 text-muted" id="account-settings" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="card custom-card shadow-none mb-xl-0 border">
                                        <div class="card-body">
                                            <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Two Step Verification</p>
                                                    <p class="fs-12 text-muted mb-0">Two step verificatoin is very secured
                                                        and restricts in happening faulty practices.</p>
                                                </div>
                                                <div class="custom-toggle-switch ms-sm-2 ms-0">
                                                    <input id="two-step" type="checkbox" checked="">
                                                    <label for="two-step" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                <div class="mb-2 mb-lg-0">
                                                    <p class="fs-14 mb-2 fw-semibold">Authentication</p>
                                                    <div class="mb-0">
                                                        <div class="btn-group mail-verification" role="group"
                                                            aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" name="btnradio"
                                                                id="btnradio1" checked="">
                                                            <label class="btn btn-outline-primary d-inline-flex"
                                                                for="btnradio1"><i
                                                                    class="ri-lock-unlock-line me-1 align-middle"></i>Pin</label>
                                                            <input type="radio" class="btn-check" name="btnradio"
                                                                id="btnradio2">
                                                            <label class="btn btn-outline-primary d-inline-flex"
                                                                for="btnradio2"><i
                                                                    class="ri-lock-password-line me-1 align-middle"></i>Password</label>
                                                            <input type="radio" class="btn-check" name="btnradio"
                                                                id="btnradio3">
                                                            <label class="btn btn-outline-primary d-inline-flex"
                                                                for="btnradio3"><i
                                                                    class="ri-fingerprint-line me-1 align-middle"></i>Finger
                                                                Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="custom-toggle-switch ms-sm-2 ms-0">
                                                    <input id="authentication" type="checkbox" checked="">
                                                    <label for="authentication" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Recovery Mail</p>
                                                    <p class="fs-12 text-muted mb-0">Incase of forgetting password mails
                                                        are sent to heifo@gmail.com</p>
                                                </div>
                                                <div class="custom-toggle-switch ms-sm-2 ms-0">
                                                    <input id="recovery-mail" type="checkbox" checked="">
                                                    <label for="recovery-mail" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">SMS Recovery</p>
                                                    <p class="fs-12 text-muted mb-0">SMS are sent to 9102312xx in case of
                                                        recovery</p>
                                                </div>
                                                <div class="custom-toggle-switch ms-sm-2 ms-0">
                                                    <input id="sms-recovery" type="checkbox" checked="">
                                                    <label for="sms-recovery" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Reset Password</p>
                                                    <p class="fs-12 text-muted">Password should be min of <b
                                                            class="text-success">8 digits<sup>*</sup></b>,atleast <b
                                                            class="text-success">One Capital letter<sup>*</sup></b> and <b
                                                            class="text-success">One Special Character<sup>*</sup></b>
                                                        included.</p>
                                                    <div class="mb-2">
                                                        <label for="current-password" class="form-label">Current
                                                            Password</label>
                                                        <input type="text" class="form-control" id="current-password"
                                                            placeholder="Current Password">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="new-password" class="form-label">New Password</label>
                                                        <input type="text" class="form-control" id="new-password"
                                                            placeholder="New Password">
                                                    </div>
                                                    <div class="mb-0">
                                                        <label for="confirm-password" class="form-label">Confirm
                                                            Password</label>
                                                        <input type="text" class="form-control" id="confirm-password"
                                                            placeholder="Confirm PAssword">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="card custom-card shadow-none mb-0 border">
                                        <div class="card-header justify-content-between d-sm-flex d-block">
                                            <div class="card-title">Registered Devices</div>
                                            <div class="mt-sm-0 mt-2">
                                                <button type="button" class="btn btn-sm btn-primary">Signout from all
                                                    devices</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="d-sm-flex d-block align-items-top">
                                                        <div class="lh-1"><i
                                                                class="bi bi-phone me-2 fs-16 align-middle text-muted"></i>
                                                        </div>
                                                        <div class="lh-1 flex-fill">
                                                            <p class="mb-1">
                                                                <span class="fw-semibold">Mobile-LG-1023</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="text-muted fs-11">Manchester, UK-Nov 30,
                                                                    04:45PM</span>
                                                            </p>
                                                        </div>
                                                        <div class="dropdown mt-sm-0 mt-2">
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-light"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Another action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Something else here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-sm-flex d-block align-items-top">
                                                        <div class="lh-1"><i
                                                                class="bi bi-laptop me-2 fs-16 align-middle text-muted"></i>
                                                        </div>
                                                        <div class="lh-1 flex-fill">
                                                            <p class="mb-1">
                                                                <span class="fw-semibold">Lenovo-1291203</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="text-muted fs-11">England, UK-Aug 12,
                                                                    12:25PM</span>
                                                            </p>
                                                        </div>
                                                        <div class="dropdown mt-sm-0 mt-2">
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-light"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Another action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Something else here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-sm-flex d-block align-items-top">
                                                        <div class="lh-1"><i
                                                                class="bi bi-laptop me-2 fs-16 align-middle text-muted"></i>
                                                        </div>
                                                        <div class="lh-1 flex-fill">
                                                            <p class="mb-1">
                                                                <span class="fw-semibold">Macbook-Suzika</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="text-muted fs-11">Brightoon, UK-Jul 18,
                                                                    8:34AM</span>
                                                            </p>
                                                        </div>
                                                        <div class="dropdown mt-sm-0 mt-2">
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-light"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Another action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Something else here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-sm-flex d-block align-items-top">
                                                        <div class="lh-1"><i
                                                                class="bi bi-pc-display-horizontal me-2 fs-16 align-middle text-muted"></i>
                                                        </div>
                                                        <div class="lh-1 flex-fill">
                                                            <p class="mb-1">
                                                                <span class="fw-semibold">Apple-Desktop</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="text-muted fs-11">Darlington, UK-Jan 14,
                                                                    11:14AM</span>
                                                            </p>
                                                        </div>
                                                        <div class="dropdown mt-sm-0 mt-2">
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-icon btn-sm btn-light"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Another action</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="javascript:void(0);">Something else here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-muted" id="email-settings" role="tabpanel">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                            <span class="fs-14 fw-semibold mb-0">Menu View :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default View
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2" checked="">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Advanced View
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="menu-view" type="checkbox" checked="">
                                                <label for="menu-view" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-3 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Language :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="mail-language" class="form-label">Languages :</label>
                                            <div class="choices" data-type="select-multiple" role="combobox"
                                                aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                <div class="choices__inner"><select class="form-control choices__input"
                                                        name="mail-language" id="mail-language" multiple=""
                                                        hidden="" tabindex="-1" data-choice="active">
                                                        <option value="Choice 1" data-custom-properties="[object Object]">
                                                            English</option>
                                                        <option value="Choice 2" data-custom-properties="[object Object]">
                                                            French</option>
                                                    </select>
                                                    <div class="choices__list choices__list--multiple">
                                                        <div class="choices__item choices__item--selectable"
                                                            data-item="" data-id="1" data-value="Choice 1"
                                                            data-custom-properties="[object Object]" aria-selected="true"
                                                            data-deletable="">English<button type="button"
                                                                class="choices__button"
                                                                aria-label="Remove item: 'Choice 1'" data-button="">Remove
                                                                item</button></div>
                                                        <div class="choices__item choices__item--selectable"
                                                            data-item="" data-id="2" data-value="Choice 2"
                                                            data-custom-properties="[object Object]" aria-selected="true"
                                                            data-deletable="">French<button type="button"
                                                                class="choices__button"
                                                                aria-label="Remove item: 'Choice 2'" data-button="">Remove
                                                                item</button></div>
                                                    </div><input type="search" name="search_terms"
                                                        class="choices__input choices__input--cloned" autocomplete="off"
                                                        autocapitalize="off" spellcheck="false" role="textbox"
                                                        aria-autocomplete="list" aria-label="null">
                                                </div>
                                                <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                                    <div class="choices__list" aria-multiselectable="true"
                                                        role="listbox">
                                                        <div id="choices--mail-language-item-choice-1"
                                                            class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                            role="option" data-choice="" data-id="1"
                                                            data-value="Choice 3" data-select-text="Press to select"
                                                            data-choice-selectable="" aria-selected="true">Arabic</div>
                                                        <div id="choices--mail-language-item-choice-4"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="4"
                                                            data-value="Choice 4" data-select-text="Press to select"
                                                            data-choice-selectable="">Hindi</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="mail-languages" type="checkbox">
                                                <label for="mail-languages" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Images :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="images-open"
                                                    id="images-open1">
                                                <label class="form-check-label" for="images-open1">
                                                    Always Open Images
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="images-hide"
                                                    id="images-hide2" checked="">
                                                <label class="form-check-label" for="images-hide2">
                                                    Ask For Permission
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="mails-images" type="checkbox">
                                                <label for="mails-images" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Keyboard Shortcuts :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="keyboard-enable"
                                                    id="keyboard-enable1">
                                                <label class="form-check-label" for="keyboard-enable1">
                                                    Keyboard Shortcuts Enable
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="keyboard-disable"
                                                    id="keyboard-disable2" checked="">
                                                <label class="form-check-label" for="keyboard-disable2">
                                                    Keyboard Shortcuts Disable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="keyboard-shortcuts" type="checkbox">
                                                <label for="keyboard-shortcuts" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Notifications :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="desktop-notifications" checked="">
                                                <label class="form-check-label" for="desktop-notifications">
                                                    Desktop Notifications
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="mobile-notifications">
                                                <label class="form-check-label" for="mobile-notifications">
                                                    Mobile Notifications
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="float-sm-end">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-success-ghost btn-sm">Learn-more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-3 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Maximum Mails Per Page :</span>
                                        </div>
                                        <div class="col-xl-2">
                                            <div class="choices" data-type="select-one" tabindex="0" role="combobox"
                                                aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                <div class="choices__inner"><select class="form-control choices__input"
                                                        data-trigger="" name="mail-per-page" id="mail-per-page"
                                                        hidden="" tabindex="-1" data-choice="active">
                                                        <option value="Choice 1" data-custom-properties="[object Object]">
                                                            10</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable"
                                                            data-item="" data-id="1" data-value="Choice 1"
                                                            data-custom-properties="[object Object]" aria-selected="true">
                                                            10</div>
                                                    </div>
                                                </div>
                                                <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                                    <input type="search" name="search_terms"
                                                        class="choices__input choices__input--cloned" autocomplete="off"
                                                        autocapitalize="off" spellcheck="false" role="textbox"
                                                        aria-autocomplete="list"
                                                        aria-label="This is a placeholder set in the config"
                                                        placeholder="Search">
                                                    <div class="choices__list" role="listbox">
                                                        <div id="choices--mail-per-page-item-choice-1"
                                                            class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                            role="option" data-choice="" data-id="1"
                                                            data-value="Choice 1" data-select-text="Press to select"
                                                            data-choice-selectable="" aria-selected="true">10</div>
                                                        <div id="choices--mail-per-page-item-choice-2"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="2"
                                                            data-value="Choice 2" data-select-text="Press to select"
                                                            data-choice-selectable="">50</div>
                                                        <div id="choices--mail-per-page-item-choice-3"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="3"
                                                            data-value="Choice 3" data-select-text="Press to select"
                                                            data-choice-selectable="">100</div>
                                                        <div id="choices--mail-per-page-item-choice-4"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="4"
                                                            data-value="Choice 3" data-select-text="Press to select"
                                                            data-choice-selectable="">120</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="mails-per-page" type="checkbox">
                                                <label for="mails-per-page" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Mail Composer :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="mail-composeron"
                                                    id="mail-composeron1">
                                                <label class="form-check-label" for="mail-composeron1">
                                                    Mail Composer On
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="mail-composeroff"
                                                    id="mail-composeroff2" checked="">
                                                <label class="form-check-label" for="mail-composeroff2">
                                                    Mail Composer Off
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="mail-composer" type="checkbox">
                                                <label for="mail-composer" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Auto Correct :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="auto-correcton"
                                                    id="auto-correcton1">
                                                <label class="form-check-label" for="auto-correcton1">
                                                    Auto Correct On
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="auto-correctoff"
                                                    id="auto-correctoff2" checked="">
                                                <label class="form-check-label" for="auto-correctoff2">
                                                    Auto Correct Off
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="custom-toggle-switch float-sm-end">
                                                <input id="auto-correct" type="checkbox">
                                                <label for="auto-correct" class="label-danger mb-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                        <div class="col-xl-3">
                                            <span class="fs-14 fw-semibold mb-0">Mail Send Action :</span>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="on-keyboard" checked="">
                                                <label class="form-check-label" for="on-keyboard">
                                                    On Keyboard Action
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="on-buttonclick">
                                                <label class="form-check-label" for="on-buttonclick">
                                                    On Button Click
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="float-sm-end">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-success-ghost btn-sm">Learn-more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane p-4 text-muted" id="labels" role="tabpanel">
                            <p class="fs-14 fw-semibold mb-3">Mail Labels :</p>
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">All Mails</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-allmails"
                                                        id="all-mails-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="all-mails-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-allmails"
                                                        id="all-mails-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="all-mails-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Inbox</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-inbox"
                                                        id="inbox-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="inbox-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-inbox"
                                                        id="inbox-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="inbox-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Sent</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-sent"
                                                        id="sent-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="sent-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-sent"
                                                        id="sent-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="sent-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Drafts</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-drafts"
                                                        id="drafts-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="drafts-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-drafts"
                                                        id="drafts-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="drafts-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Spam</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-spam"
                                                        id="spam-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="spam-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-spam"
                                                        id="spam-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="spam-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Important</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-important"
                                                        id="important-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="important-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-important"
                                                        id="important-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="important-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Trash</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-trash"
                                                        id="trash-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="trash-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-trash"
                                                        id="trash-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="trash-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Archive</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-archive"
                                                        id="archive-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="archive-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-archive"
                                                        id="archive-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="archive-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Starred</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-starred"
                                                        id="starred-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="starred-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-starred"
                                                        id="starred-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="starred-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="fs-14 fw-semibold mb-3">Settings :</p>
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Settings</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-settings"
                                                        id="settings-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="settings-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-settings"
                                                        id="settings-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="settings-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="fs-14 fw-semibold mb-3">Custom Labels :</p>
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Mail</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-custom-mail"
                                                        id="custom-mail-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="custom-mail-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-custom-mail"
                                                        id="custom-mail-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="custom-mail-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Home</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-home"
                                                        id="home-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="home-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-home"
                                                        id="home-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="home-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Work</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-work"
                                                        id="work-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="work-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-work"
                                                        id="work-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="work-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card custom-card shadow-none border">
                                        <div class="card-body align-items-center justify-content-between flex-wrap">
                                            <div class="mb-1">
                                                <span class="fw-semibold">Friends</span>
                                            </div>
                                            <div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="label-friends"
                                                        id="friends-enable" checked="">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="friends-enable">Enable</label>
                                                    <input type="radio" class="btn-check" name="label-friends"
                                                        id="friends-disable">
                                                    <label class="btn btn-sm btn-outline-primary"
                                                        for="friends-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-muted" id="notification-settings" role="tabpanel">
                            <ul class="list-group list-group-flush list-unstyled rounded">
                                <li class="list-group-item">
                                    <div class="row gx-5">
                                        <div class="col-xl-5">
                                            <p class="fs-16 mb-1 fw-semibold">Email Notifications</p>
                                            <p class="fs-12 mb-0 text-muted">Email notifications are the notifications you
                                                will receeive when you are offline, you can customize them by enabling or
                                                disabling them.</p>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="d-flex align-items-top justify-content-between mt-sm-0 mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Updates &amp; Features</p>
                                                    <p class="fs-12 mb-0 text-muted">Notifications about new updates and
                                                        their features.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="update-features" type="checkbox" checked="">
                                                        <label for="update-features" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Early Access</p>
                                                    <p class="fs-12 mb-0 text-muted">Users are selected for beta testing
                                                        of new update,notifications relating or participate in any of paid
                                                        product promotion.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="early-access" type="checkbox">
                                                        <label for="early-access" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Email Shortcuts</p>
                                                    <p class="fs-12 mb-0 text-muted">Shortcut notifications for email.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="email-shortcut" type="checkbox" checked="">
                                                        <label for="email-shortcut" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">New Mails</p>
                                                    <p class="fs-12 mb-0 text-muted">Notifications related to new mails
                                                        received.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="new-mails" type="checkbox" checked="">
                                                        <label for="new-mails" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Mail Chat Messages</p>
                                                    <p class="fs-12 mb-0 text-muted">Any of new messages are received will
                                                        be updated through notifications.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="mail-chat-messages" type="checkbox" checked="">
                                                        <label for="mail-chat-messages"
                                                            class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gx-5">
                                        <div class="col-xl-5">
                                            <p class="fs-16 mb-1 fw-semibold">Push Notifications</p>
                                            <p class="fs-12 mb-0 text-muted">Push notifications are recieved when you are
                                                online, you can customize them by enabling or disabling them.</p>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="d-flex align-items-top justify-content-between mt-sm-0 mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">New Mails</p>
                                                    <p class="fs-12 mb-0 text-muted">Notifications related to new mails
                                                        received.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="push-new-mails" type="checkbox" checked="">
                                                        <label for="push-new-mails" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Mail Chat Messages</p>
                                                    <p class="fs-12 mb-0 text-muted">Any of new messages are received will
                                                        be updated through notifications.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="push-mail-chat-messages" type="checkbox"
                                                            checked="">
                                                        <label for="push-mail-chat-messages"
                                                            class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-top justify-content-between mt-3">
                                                <div class="mail-notification-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Mail Extensions</p>
                                                    <p class="fs-12 mb-0 text-muted">Notifications related to the
                                                        extensions received by new emails and thier propertied also been
                                                        displayed.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="mail-extensions" type="checkbox">
                                                        <label for="mail-extensions" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane text-muted" id="security" role="tabpanel">
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="list-group-item">
                                    <div class="row gx-5">
                                        <div class="col-xl-4">
                                            <p class="fs-16 mb-1 fw-semibold">Logging In</p>
                                            <p class="fs-12 mb-0 text-muted">Security settings related to logging into our
                                                email account and taking down account if any mischevious action happended.
                                            </p>
                                        </div>
                                        <div class="col-xl-8">
                                            <div
                                                class="d-sm-flex d-block align-items-top justify-content-between mt-sm-0 mt-3">
                                                <div class="mail-security-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Max Limit for login attempts</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Account will freeze for
                                                        24hrs while attempt to login with wrong credentials for selected
                                                        number of times</p>
                                                </div>
                                                <div>
                                                    <div class="choices" data-type="select-one" tabindex="0"
                                                        role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="choices__inner"><select
                                                                class="form-control choices__input" data-trigger=""
                                                                name="max-login-attempts" id="max-login-attempts"
                                                                hidden="" tabindex="-1" data-choice="active">
                                                                <option value="Choice 1"
                                                                    data-custom-properties="[object Object]">3</option>
                                                            </select>
                                                            <div class="choices__list choices__list--single">
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="1"
                                                                    data-value="Choice 1"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true">3</div>
                                                            </div>
                                                        </div>
                                                        <div class="choices__list choices__list--dropdown"
                                                            aria-expanded="false"><input type="search"
                                                                name="search_terms"
                                                                class="choices__input choices__input--cloned"
                                                                autocomplete="off" autocapitalize="off"
                                                                spellcheck="false" role="textbox"
                                                                aria-autocomplete="list"
                                                                aria-label="This is a placeholder set in the config"
                                                                placeholder="Search">
                                                            <div class="choices__list" role="listbox">
                                                                <div id="choices--max-login-attempts-item-choice-1"
                                                                    class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                                    role="option" data-choice="" data-id="1"
                                                                    data-value="Choice 1"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="true">3
                                                                </div>
                                                                <div id="choices--max-login-attempts-item-choice-2"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="2"
                                                                    data-value="Choice 2"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">5</div>
                                                                <div id="choices--max-login-attempts-item-choice-3"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="3"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">10</div>
                                                                <div id="choices--max-login-attempts-item-choice-4"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="4"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">20</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Account Freeze time management</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">You can change the time
                                                        for the account freeze when attempts for </p>
                                                </div>
                                                <div>
                                                    <div class="choices" data-type="select-one" tabindex="0"
                                                        role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="choices__inner"><select
                                                                class="form-control choices__input" data-trigger=""
                                                                name="account-freeze-time-format"
                                                                id="account-freeze-time-format" hidden=""
                                                                tabindex="-1" data-choice="active">
                                                                <option value="Choice 1"
                                                                    data-custom-properties="[object Object]">1 Day
                                                                </option>
                                                            </select>
                                                            <div class="choices__list choices__list--single">
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="1"
                                                                    data-value="Choice 1"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true">1 Day</div>
                                                            </div>
                                                        </div>
                                                        <div class="choices__list choices__list--dropdown"
                                                            aria-expanded="false"><input type="search"
                                                                name="search_terms"
                                                                class="choices__input choices__input--cloned"
                                                                autocomplete="off" autocapitalize="off"
                                                                spellcheck="false" role="textbox"
                                                                aria-autocomplete="list"
                                                                aria-label="This is a placeholder set in the config"
                                                                placeholder="Search">
                                                            <div class="choices__list" role="listbox">
                                                                <div id="choices--account-freeze-time-format-item-choice-1"
                                                                    class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                                    role="option" data-choice="" data-id="1"
                                                                    data-value="Choice 1"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="true">1 Day
                                                                </div>
                                                                <div id="choices--account-freeze-time-format-item-choice-2"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="2"
                                                                    data-value="Choice 2"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">1 Hour</div>
                                                                <div id="choices--account-freeze-time-format-item-choice-3"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="3"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">1 Month</div>
                                                                <div id="choices--account-freeze-time-format-item-choice-4"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="4"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">1 Year</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gx-5">
                                        <div class="col-xl-4">
                                            <p class="fs-16 mb-1 fw-semibold">Password Requirements</p>
                                            <p class="fs-12 mb-0 text-muted">Security settings related to password
                                                strength.</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <div
                                                class="d-sm-flex d-block align-items-top justify-content-between mt-sm-0 mt-3">
                                                <div class="mail-security-settings">
                                                    <p class="fs-14 mb-1 fw-semibold">Minimum number of characters in the
                                                        password</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">There should be a
                                                        minimum number of characters for a password to be validated that
                                                        shouls be set here.</p>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control w-50 ms-auto"
                                                        value="8">
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Contain A Number</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Password should contain
                                                        a number.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="password-number" type="checkbox">
                                                        <label for="password-number" class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Contain A Special Character</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Password should contain
                                                        a special Character.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="password-special-character" type="checkbox"
                                                            checked="">
                                                        <label for="password-special-character"
                                                            class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Atleast One Capital Letter</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Password should contain
                                                        atleast one capital letter.</p>
                                                </div>
                                                <div>
                                                    <div class="custom-toggle-switch float-sm-end">
                                                        <input id="password-capital" type="checkbox" checked="">
                                                        <label for="password-capital"
                                                            class="label-success mb-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                <div>
                                                    <p class="fs-14 mb-1 fw-semibold">Maximum Password Length</p>
                                                    <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Maximum password lenth
                                                        should be selected here.</p>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control w-50 ms-auto"
                                                        value="16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row gx-5">
                                        <div class="col-xl-4">
                                            <p class="fs-16 mb-1 fw-semibold">Unknown Chats</p>
                                            <p class="fs-12 mb-0 text-muted mb-3 mb-lg-0">Security settings related to
                                                unknown chats.</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="unknown-messages-show" id="unknown-messages-show1">
                                                    <label class="form-check-label" for="unknown-messages-show1">
                                                        Show
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="unknown-messages-hide" id="unknown-messages-hide2"
                                                        checked="">
                                                    <label class="form-check-label" for="unknown-messages-hide2">
                                                        Hide
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<x-web-sweet-alert />

@extends('layouts.admin.master')

@section('page_title')
    {{ __('Profil') }}
@endsection

@section('section_header_title')
    {{ __('Profil') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Profil') }}</li>
@endsection

@section('page_content')
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3">
                                <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                                    <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                                        href="#personal-info" aria-selected="true">
                                        <i class="bx bxs-user me-2 fs-18 align-middle"></i>
                                        {{ __('Informasi Akun') }}
                                    </a>
                                    <a class="nav-link mt-3" data-bs-toggle="tab" role="tab" aria-current="page"
                                        href="#security" aria-selected="false" tabindex="-1">
                                        <i class="bx bxs-key me-2 fs-18 align-middle"></i>
                                        {{ __('Ubah Password') }}
                                    </a>
                                </nav>
                            </div>
                            <div class="col-xl-10 col-lg-9">
                                <div class="tab-content mail-setting-tab mt-4 mt-lg-0">
                                    <div class="tab-pane text-muted active show" id="personal-info" role="tabpanel">
                                        <form method="post"
                                            action="{{ route('admin.profile.update', auth()->user()->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="p-3">
                                                <div class="mb-4 d-sm-flex align-items-center">
                                                    <div class="mb-0 me-sm-5 d-sm-flex align-items-center">
                                                        <span class="avatar avatar-xxl ">
                                                            <img src="{{ url(config('common.path_storage') . (!empty(auth()->user()->image) ? auth()->user()->image : config('common.no_image')) ?? config('common.no_image')) }}"
                                                                alt="" id="profile-img">
                                                            <a href="javascript:void(0);"
                                                                class="badge rounded-pill bg-primary avatar-badge">
                                                                <input type="file" name="image"
                                                                    class="position-absolute w-100 h-100 op-0"
                                                                    id="profile-change">
                                                                <i class="fe fe-camera"></i>
                                                            </a>
                                                        </span>
                                                        <input type="hidden" name="old_image"
                                                            value="{{ $admin->image ?? '' }}">
                                                        <div class="ms-sm-3">
                                                            <h5 class="text-dark mb-1">{{ $admin->name ?? '' }}</h5>
                                                            <p class="text-muted mb-0">
                                                                <span class="">Email : </span>
                                                                <span>{{ $admin->email ?? '' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row gy-4 mb-4">
                                                    <div class="col-xl-12">
                                                        <label for="name" class="form-label">{{ __('Nama') }}
                                                            <x-all-not-null /></label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="name"
                                                            value="{{ old('name') ?? $admin->name }}"
                                                            placeholder="{{ __('Nama') }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="email"
                                                            class="form-label">{{ __('Email') }}</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" id="email"
                                                            value="{{ old('email') ?? $admin->email }}"
                                                            placeholder="{{ __('Email') }}" disabled>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="approved_at"
                                                            class="form-label">{{ __('Tgl Approve') }}</label>
                                                        <input type="text"
                                                            class="form-control @error('approved_at') is-invalid @enderror"
                                                            name="approved_at" id="approved_at"
                                                            value="{{ old('approved_at') ?? $admin->approved_at }}"
                                                            placeholder="{{ __('Tgl Approve') }}" disabled>
                                                    </div>

                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane text-muted" id="security" role="tabpanel">
                                        <form method="post"
                                            action="{{ route('admin.profile_password.update', $admin->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="p-3">
                                                <div class="row gy-4 mb-4">
                                                    <div class="col-xl-12">
                                                        <label for="current_password"
                                                            class="form-label">{{ __('Password Saat Ini') }}
                                                            <x-all-not-null /></label>
                                                        <input type="password"
                                                            class="form-control @error('current_password') is-invalid @enderror"
                                                            name="current_password" id="current_password"
                                                            placeholder="{{ __('Password Saat Ini') }}">
                                                        @error('current_password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="password"
                                                            class="form-label">{{ __('Password Baru') }}
                                                            <x-all-not-null /></label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" id="password"
                                                            placeholder="{{ __('Password Baru') }}">
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label for="password_confirmation"
                                                            class="form-label">{{ __('Konfirmasi Password Baru') }}
                                                            <x-all-not-null /></label>
                                                        <input type="password"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" id="password_confirmation"
                                                            placeholder="{{ __('Konfirmasi Password Baru') }}">
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Simpan') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

@include('layouts.admin.includes.upload_image')

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
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <form method="post" action="{{ route('admin.profile.update', auth()->user()->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ __('Update Profil User') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Silahkan sesuaikan data user anda') }}
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <p class="avatar avatar-xxxl avatar-rounded">
                                <img src="{{ url(config('common.path_storage') . (!empty(auth()->user()->image) ? auth()->user()->image : config('common.no_image')) ?? config('common.no_image')) }}"
                                    class="object-fit-cover preview-path_image">
                            </p>
                            <div class="mb-4">
                                <label for="path_image" class="form-label text-default">{{ __('Foto Profil') }}</label>
                                <input class="form-control" type="file" name="image"
                                    onchange="preview('.preview-path_image', this.files[0])">
                                <input type="hidden" name="old_image" value="{{ $admin->image ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Nama') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') ?? $admin->name }}"
                                    placeholder="{{ __('Nama') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">{{ __('Email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') ?? $admin->email }}"
                                    placeholder="{{ __('Email') }}" disabled>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-xl-12">
                                <label for="approved_at" class="form-label text-default">{{ __('Tgl Approve') }}</label>
                                <input type="text" class="form-control @error('approved_at') is-invalid @enderror"
                                    name="approved_at" id="approved_at"
                                    value="{{ old('approved_at') ?? $admin->approved_at }}"
                                    placeholder="{{ __('Tgl Approve') }}" disabled>
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

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <form method="post" action="{{ route('admin.profile_password.update', $admin->id) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ __('Update Password') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Silahkan update password akun anda') }}
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="current_password" class="form-label text-default">{{ __('Password Saat Ini') }}
                                    <x-all-not-null /></label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" placeholder="{{ __('Password Saat Ini') }}">
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="password" class="form-label text-default">{{ __('Password Baru') }}
                                    <x-all-not-null /></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="{{ __('Password Baru') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="password_confirmation"
                                    class="form-label text-default">{{ __('Konfirmasi Password Baru') }}
                                    <x-all-not-null /></label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="{{ __('Konfirmasi Password Baru') }}">
                                @error('password_confirmation')
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

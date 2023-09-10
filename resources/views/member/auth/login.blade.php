@extends('layouts.admin.auth')

@section('page_title')
    {{ __('Admin Login') }}
@endsection

@section('content')
    <div class="col-xl-8 col-md-12 col-sm-10 ">
        <div class="card custom-card rectangle2">
            <div class="p-0 card-body ">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ps-0 text-fixed-white rounded-0 d-none d-md-block ">
                        <div class="mb-0 overflow-hidden card custom-card cover-background rounded-start rounded-0">
                            <div class="p-0 card-img-overlay d-flex align-items-center rounded-0">
                                <div class="p-5 card-body rectangle3">
                                    <div class="text-center">
                                        <a href="{{ route('website.index') }}">
                                            <img src="{{ url(config('common.path_storage') . '/images/koperasi.png') }}"
                                                alt="logo" class="desktop-dark" style="width: 70%">
                                        </a>
                                    </div>
                                    <h6 class="mt-4 fs-15 op-9 text-fixed-white">
                                        {{ __('Login') }}
                                    </h6>
                                    <div class="mt-3 d-flex">
                                        <p class="mb-0 fw-normal fs-14 op-7 text-fixed-white">
                                            {{ __('Selamat datang kembali di sistem') }} <strong>Koperasi FCI
                                                Sejahtera.</strong><br><br>
                                            {{ __('Masukkan email dan password akun anda agar bisa menggunakan fasilitas-fasilitas menu yang ada di sistem') }}
                                            <strong>Koperasi FCI
                                                Sejahtera.</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 pe-sm-0">
                        <div class="p-3 p-sm-5">
                            <p class="mb-2 h4 fw-semibold">
                                {{ __('Login') }}
                            </p>

                            <p class="mb-3 text-muted op-7 fw-normal">
                                {{ __('Selamat datang di sistem kami') }}
                            </p>

                            <div class="alert alert-solid-warning alert-dismissible fade show">
                                Email : <strong>adminrt5rw11ph6@mail.com</strong>
                                Password : <strong>password</strong>
                            </div>

                            <form method="POST" action="{{ route('member.login.post') }}">
                                @csrf

                                <div class="mt-3 row gy-3">
                                    <div class="mt-0 col-xl-12">
                                        <label for="email" class="form-label text-default">
                                            {{ __('Email') }} <x-all-not-null />
                                        </label>
                                        <input type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="{{ __('Email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-xl-12">
                                        <label for="password" class="form-label text-default d-block">
                                            {{ __('Password') }} <x-all-not-null />
                                            <a href="{{ route('admin.forgot_password') }}" class="float-end text-primary">
                                                {{ __('Lupa password ?') }}
                                            </a>
                                        </label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" id="password" id="password"
                                                placeholder="{{ __('Password') }}">
                                            <button class="bg-transparent btn btn-light" type="button"
                                                onclick="createpassword('password', this)">
                                                <i class="align-middle ri-eye-off-line"></i>
                                            </button>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="defaultCheck1">
                                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                    {{ __('Ingatkan password') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 col-xl-12 d-grid">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center ">
                                <p class="mt-4 mb-0 fs-12 text-muted">
                                    {{ __('Belum punya akun ? Daftar') }}
                                    <a href="{{ route('member.register') }}" class="text-primary">
                                        {{ __('disini') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

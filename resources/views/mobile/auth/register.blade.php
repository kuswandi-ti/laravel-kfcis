@extends('layouts.mobile.auth')

@section('title')
    {{ __('Pendaftaran User Baru') }}
@endsection

@section('content')
    <div class="login-form mt-4">
        <div class="section text-center">
            <img src="{{ url(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" width="50%">
        </div>
        <div class="section mt-4 mb-4 text-center">
            <h2>{{ __('Pendaftaran User Baru') }}</h2>
            <h4>{{ __('Silahkan lengkapi form dibawah ini untuk proses pendaftaran user baru') }}</h4>
        </div>
        <div class="section mt-1 mb-5">
            <x-mobile-alert-message />

            <form method="POST" action="{{ route('mobile.register.post') }}">
                @csrf

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" name="nik" value="{{ old('nik') }}"
                            placeholder="{{ __('NIK') }}" required autofocus>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" name="password" autocomplete="off"
                            placeholder="{{ __('Password') }}" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" name="password_confirmation" autocomplete="off"
                            placeholder="{{ __('Konfirmasi Password') }}" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Daftar') }}</button>
                </div>
            </form>

            <div class="section text-center mt-2">
                {{ __('Sudah punya akun ?') }}
                <a href="{{ route('mobile.login') }}">{{ __('Login disini') }}</a>
            </div>
        </div>
    </div>
@endsection

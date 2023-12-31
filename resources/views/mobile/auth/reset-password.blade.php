{{-- @extends('layouts.mobile.auth')

@section('app_title')
    {{ __('Reset Password') }}
@endsection

@section('content')
    <div id="appCapsule">
        <div class="text-center section">
            <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" alt="img"
                class="imaged" style="width: 150px;">
        </div>

        <div class="mt-2 text-center section">
            <h1>{{ __('Reset Password') }}</h1>
            <h4>{{ __('Reset Password Registered User') }}</h4>
        </div>

        <div class="p-2 mb-5 section">
            <x-alert-message />

            <form method="POST" action="{{ route('mobile.reset_password.send') }}">
                @csrf
                <div class="card">
                    <div class="pb-1 card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">{{ __('E-mail') }} <x-fill-field /></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ request()->email }}" placeholder="{{ __('Your email') }}" required autofocus>
                                <input type="hidden" value="{{ request()->token }}" name="token">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">{{ __('New Password') }} <x-fill-field /></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete="off" placeholder="{{ __('Your new password') }}">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password_confirmation">{{ __('New Password Confirmation') }}
                                    <x-fill-field /></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" autocomplete="off"
                                    placeholder="{{ __('Your new password confirmation') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="mt-2 mb-2 btn btn-primary btn-block btn-lg">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.mobile.auth')

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('content')
    <div class="login-form mt-4">
        <div class="section text-center">
            <img src="{{ url(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" width="50%">
        </div>
        <div class="section mt-4 mb-4 text-center">
            <h2>{{ __('Reset Password') }}</h2>
            <h4>{{ __('Reset password untuk user yang sudah terdaftar') }}</h4>
        </div>
        <div class="section mt-1 mb-5">
            <x-mobile-alert-message />

            <form method="POST" action="{{ route('mobile.reset_password.send') }}">
                @csrf

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}" value="{{ request()->email }}" required>
                        <input type="hidden" value="{{ request()->token }}" name="token">
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" name="password" autocomplete="off"
                            placeholder="{{ __('Password Baru') }}" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" name="password_confirmation" autocomplete="off"
                            placeholder="{{ __('Konfirmasi Password Baru') }}" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

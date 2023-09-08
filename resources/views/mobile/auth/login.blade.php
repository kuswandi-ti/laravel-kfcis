@extends('layouts.mobile.auth')

@section('title')
    {{ __('Login') }}
@endsection

@section('content')
    <div class="login-form mt-4 mb-4">
        <div class="section text-center">
            <img src="{{ url(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" width="50%">
        </div>
        <div class="section mt-4 mb-4 text-center">
            <h2>{{ __('Login') }}</h2>
            <h4>{{ __('Masukkan email dan password akun anda') }}</h4>
        </div>
        <div class="section mt-1">
            <div class="card bg-primary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="text-warning">STAFF</span><br>
                            Email : ketuart5rw11ph6@mail.com<br>
                            Password : password
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <span class="text-warning">USER</span><br>
                            Email : kuswandirt5rw11ph6@mail.com<br>
                            Password : password
                        </div>
                    </div>
                </div>
            </div>

            <x-mobile-alert-message />

            <form method="POST" action="{{ route('mobile.login') }}">
                @csrf

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="{{ __('Email') }}" required autofocus>
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

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>
            </form>

            <div class="section text-center mt-2">
                {{ __('Belum punya akun ?') }}
                <a href="{{ route('mobile.register.index') }}">{{ __('Daftar disini') }}</a>
            </div>
            <div class="section text-center">
                <a href="{{ route('mobile.forgot_password') }}">{{ __('Lupa password') }}</a>
            </div>
        </div>
    </div>
@endsection

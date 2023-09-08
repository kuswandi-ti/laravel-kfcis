@extends('layouts.mobile.auth')

@section('title')
    {{ __('Lupa Password') }}
@endsection

@section('content')
    <div class="login-form mt-4">
        <div class="section text-center">
            <img src="{{ url(config('common.path_template_mobile') . 'assets/img/illustration/login.png') }}" width="50%">
        </div>
        <div class="section mt-4 mb-4 text-center">
            <h2>{{ __('Lupa Password') }}</h2>
            <h4>{{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru') }}
            </h4>
        </div>
        <div class="section mt-1 mb-5">
            <x-mobile-alert-message />

            <form method="POST" action="{{ route('mobile.forgot_password.send') }}">
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

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Kirim Link Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

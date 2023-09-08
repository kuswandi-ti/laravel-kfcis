<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    @include('layouts.mobile.partials._meta')

    <!-- Title -->
    <title>{{ $system_setting['company_name'] ?? config('app.name') }} &mdash; @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png"
        href="{{ url(config('common.path_storage') . (!empty($system_setting['company_logo']) ? $system_setting['company_logo'] : config('common.no_image')) ?? config('common.no_image')) }}"
        sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ url(config('common.path_storage') . (!empty($system_setting['company_logo']) ? $system_setting['company_logo'] : config('common.no_image')) ?? config('common.no_image')) }}">

    <!-- Styles -->
    @include('layouts.mobile.includes.styles')
</head>

<body>
    <!-- Preloader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <div id="appCapsule" class="pt-0">
        @yield('content')
    </div>

    @include('layouts.mobile.includes.scripts')
</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.mobile.partials._meta')

    <title>{{ $setting['site_title'] ?? config('app.name') }} &mdash; @yield('app_title')</title>

    <link rel="icon" type="image/png"
        href="{{ url(config('common.path_storage') . (!empty($setting['company_favicon']) ? $setting['company_favicon'] : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
        sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset(config('common.path_template_mobile') . 'assets/img/icon/192x192.png') }}">

    @include('layouts.mobile.includes.styles')

    @stack('styles_vendor')
    @stack('styles')

    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/loading-icon.png') }}" alt="icon"
            class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    {{-- @include('layouts.mobile.partials._header') --}}
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    @if (isset($app_bottom_menu))
        @if ($app_bottom_menu == 1)
            @include('layouts.mobile.partials._bottom_menu')
        @endif
    @else
        @include('layouts.mobile.partials._bottom_menu')
    @endif
    <!-- * App Bottom Menu -->

    @if (!auth()->user()->getRoleNames()->isEmpty())
        <!-- App Sidebar -->
        @include('layouts.mobile.partials._sidebar')
    @endif

    @include('layouts.mobile.includes.scripts')

    @stack('scripts_vendor')
    @stack('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>

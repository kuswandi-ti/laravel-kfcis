{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting['site_title'] ?? config('app.name') }} &mdash; @yield('page_title')</title>

    <link rel="icon"
        href="{{ url(config('common.path_storage') . (!empty($setting['company_favicon']) ? $setting['company_favicon'] : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
        type="image/*">

    <!-- Page Specific CSS File -->
    @stack('styles_vendor')

    @include('layouts.admin.includes.styles')

    <!-- Page Specific CSS Style -->
    @stack('styles')

    <!-- Inline CSS -->
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.admin.partials._sidebar_' . getGuardNameLoggedUser())

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @stack('header_back')
                        <h1>@yield('section_header_title')</h1>
                        <div class="section-header-breadcrumb">
                            @section('section_header_breadcrumb')
                                <div class="breadcrumb-item active">
                                    <a
                                        href="{{ route(getGuardNameLoggedUser() . '.dashboard.index') }}">{{ __('admin.Dashboard') }}</a>
                                </div>
                            @show
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">@yield('section_body_title')</h2>
                        <p class="section-lead">
                            @yield('section_body_lead')
                        </p>
                        @yield('content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    {{ __('admin.Copyright') }} &copy; {{ date('Y') }} <div class="bullet"></div>
                    {{ __('admin.Design By') }} <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @include('layouts.admin.includes.scripts')

    <!-- Page Specific JS File -->
    @stack('scripts_vendor')

    <!-- Page Specific JS Script -->
    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset(config('common.path_template_admin') . 'assets/js/scripts.js') }}"></script>

    <!-- Inline JS -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function preview(target, image) {
            $(target)
                .attr('src', window.URL.createObjectURL(image))
                .show()
        }

        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                let filename = $(this)
                    .val()
                    .split('\\')
                    .pop()
                $(this)
                    .next('.custom-file-label')
                    .addClass('selected')
                    .html(filename)
            })

            $('body').on('click', '.logout', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "{{ __('Are you sure to logout?') }}",
                    text: "{{ __('After logging out will return to the login page') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Yes, logging out !') }}"
                }).then((result) => {
                    if (result.value === true) {
                        $('#form-logout').submit()
                    }
                })
            })

            $('body').on('click', '.delete_item', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "{{ __('Are you sure?') }}",
                    text: "{{ __('You do not be able to revert this!') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Yes, delete it!') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                })
            })
        });

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="gradient"
    data-menu-styles="dark" style="--primary-rgb: 0, 128, 172;">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $system_setting['site_title'] ?? config('app.name') }} &mdash; @yield('page_title')</title>

    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="simple admin panel template html css,admin panel html,bootstrap 5 admin template,admin,bootstrap dashboard,bootstrap 5 admin panel template,html and css,admin panel,admin panel html template,simple html template,bootstrap admin template,admin dashboard,admin dashboard template,admin panel template,template dashboard">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon"
        href="{{ url(config('common.path_storage') . (!empty($system_setting['company_favicon']) ? $system_setting['company_favicon'] : config('common.no_image')) ?? config('common.no_image')) }}"
        type="image/png">

    <!-- Choices JS -->
    <script
        src="{{ url(config('common.path_template_admin') . 'assets/libs/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>

    <!-- Main Theme Js -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ url(config('common.path_template_admin') . 'assets/css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ url(config('common.path_template_admin') . 'assets/css/icons.css') }}.." rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ url(config('common.path_template_admin') . 'assets/libs/node-waves/waves.min.css') }}"
        rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ url(config('common.path_template_admin') . 'assets/libs/simplebar/simplebar.min.css') }}"
        rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <link rel="stylesheet"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

    <link rel="stylesheet"
        href="{{ url(config('common.path_template_admin') . 'assets/libs/swiper/swiper-bundle.min.css') }}">

</head>

<body>
    <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab"
                        aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="border-0 tab-pane fade show active" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-ltr" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical &amp; Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                            <div class="col-4 rounded-header">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-rounded">
                                        Rounded
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-0 tab-pane fade" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="pb-2 d-flex switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked>
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header &amp; Bredcrumb Colors:</p>
                            <div class="pb-2 d-flex switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio"
                                        name="header-colors" id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio"
                                        name="header-colors" id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Header"
                                        type="radio" name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="pb-2 d-flex switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Default Light Header" type="radio"
                                        name="header-colors" id="switcher-default-header-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Default Dark Header" type="radio"
                                        name="header-colors" id="switcher-default-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Default Color Header" type="radio"
                                        name="header-colors" id="switcher-default-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Default Gradient Header" type="radio" name="header-colors"
                                        id="switcher-default-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Default Transparent Header" type="radio" name="header-colors"
                                        id="switcher-default-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="flex-wrap d-flex align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="mt-1 form-check switch-select ps-0 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="flex-wrap d-flex align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div
                                    class="mt-1 form-check switch-select ps-0 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 menu-image">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="flex-wrap d-flex align-items-center switcher-style">
                                <div class="m-2 form-check switch-select">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="m-2 form-check switch-select">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="m-2 form-check switch-select">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="theme-background" id="switcher-bg-img2">
                                </div>
                                <div class="m-2 form-check switch-select">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="m-2 form-check switch-select">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid canvas-footer">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->
    <!-- Loader -->
    <div id="loader">
        <img src="{{ url(config('common.path_template_admin') . 'assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{{ url(config('common.path_template_admin') . 'assets/images/brand-logos/desktop-logo.png') }}"
                                    alt="logo" class="desktop-logo">
                                <img src="{{ url(config('common.path_template_admin') . 'assets/images/brand-logos/toggle-logo.png') }}"
                                    alt="logo" class="toggle-logo">
                                <img src="{{ url(config('common.path_template_admin') . 'assets/images/brand-logos/desktop-dark.png') }}"
                                    alt="logo" class="desktop-dark">
                                <img src="{{ url(config('common.path_template_admin') . 'assets/images/brand-logos/toggle-dark.png') }}"
                                    alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link"
                            data-bs-toggle="sidebar">
                            <span class="open-toggle me-2">
                                <i class="bx bx-menu header-link-icon"></i>
                            </span>
                        </a>
                        <div class="main-header-center d-none d-lg-block header-link">
                            <input type="text" class="form-control form-control-lg" id="typehead"
                                placeholder="Search for results..." autocomplete="off">
                            <button type="button" aria-label="button" class="btn pe-1"><i class="fe fe-search"
                                    aria-hidden="true"></i></button>
                            <div id="headersearch" class="header-search">
                                <div class="p-3">
                                    <div class="">
                                        <p class="mb-2 fw-semibold text-muted fs-13">Recent Searches</p>
                                        <div class="ps-2">
                                            <a href="javascript:void(0)" class="search-tags"><i
                                                    class="fe fe-search me-2"></i>People<span></span></a>
                                            <a href="javascript:void(0)" class="search-tags"><i
                                                    class="fe fe-search me-2"></i>Pages<span></span></a>
                                            <a href="javascript:void(0)" class="search-tags"><i
                                                    class="fe fe-search me-2"></i>Articles<span></span></a>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-2 fw-semibold text-muted fs-13">Apps and pages</p>
                                        <ul class="ps-2">
                                            <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                                <a href="full-calendar.html"><span><i
                                                            class="p-2 bx bx-calendar me-2 fs-14 bg-primary-transparent rounded-circle"></i>Calendar</span></a>
                                            </li>
                                            <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                                <a href="mail.html"><span><i
                                                            class="p-2 bx bx-envelope me-2 fs-14 bg-primary-transparent rounded-circle"></i>Mail</span></a>
                                            </li>
                                            <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                                <a href="buttons.html"><span><i
                                                            class="p-2 bx bx-dice-1 me-2 fs-14 bg-primary-transparent rounded-circle"></i>Buttons</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-2 fw-semibold text-muted fs-13">Links</p>
                                        <ul class="ps-2">
                                            <li class="p-1 mb-1 align-items-center text-muted search-app">
                                                <a href="javascript:void(0)"
                                                    class="text-primary"><u>http://spruko/spruko.com</u></a>
                                            </li>
                                            <li class="p-1 mb-1 align-items-center text-muted search-app">
                                                <a href="javascript:void(0)"
                                                    class="text-primary"><u>http://spruko/spruko.com</u></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="px-0 py-3 border-top">
                                    <div class="text-center">
                                        <a href="javascript:void(0)"
                                            class="text-primary text-decoration-underline fs-15">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-search d-lg-none d-block ">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bx bx-search-alt-2 header-link-icon"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">

                    <!-- Start::header-element -->
                    <div class="header-element country-selector">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <i class="bx bx-globe header-link-icon"></i>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="border-0 main-header-dropdown dropdown-menu" data-popper-placement="none">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/us_flag.jpg" alt="img">
                                    </span>
                                    English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/spain_flag.jpg" alt="img">
                                    </span>
                                    Spanish
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/french_flag.jpg" alt="img">
                                    </span>
                                    French
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/germany_flag.jpg" alt="img">
                                    </span>
                                    German
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/italy_flag.jpg" alt="img">
                                    </span>
                                    Italian
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2">
                                        <img src="../assets/images/flags/russia_flag.jpg" alt="img">
                                    </span>
                                    Russian
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                            <!-- Start::header-link-icon -->
                            <i class="bx bx-sun bx-flip-horizontal header-link-icon ionicon dark-layout"></i>
                            <!-- End::header-link-icon -->
                            <!--  Start::header-link-icon -->
                            <i class="bx bx-moon bx-flip-horizontal header-link-icon ionicon light-layout"></i>
                            <!-- End::header-link-icon -->
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element cart-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside">
                            <i class="bx bx-cart header-link-icon ionicon"></i>
                            <span class="badge bg-danger rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="border-0 main-header-dropdown dropdown-menu dropdown-menu-end"
                            data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                                    <span class="badge bg-success-transparent" id="cart-data">5 Items</span>
                                </div>
                            </div>
                            <div>
                                <hr class="dropdown-divider">
                            </div>
                            <ul class="mb-0 list-unstyled" id="header-cart-items-scroll">
                                <li class="dropdown-item border-bottom">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <span class="p-1 avatar avatar-xl bd-gray-200">
                                            <img src="../assets/images/ecommerce/png/1.png" alt="">
                                        </span>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="mb-0 d-flex align-items-start justify-content-between">
                                                <div class=" fs-13 fw-semibold">
                                                    <a href="cart.html">Cactus mini plant</a>
                                                </div>
                                                <div>
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="min-w-fit-content align-items-start">
                                                <div class=" fw-normal fs-12 text-muted">Quantity:02</div>
                                                <div class="d-flex align-items-center">
                                                    <span class=" fw-semibold fs-16">$1,229</span>
                                                    <p
                                                        class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                        $1,799</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item border-bottom">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <span class="p-1 avatar avatar-xl bd-gray-200">
                                            <img src="../assets/images/ecommerce/png/15.png" alt="">
                                        </span>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="mb-0 d-flex align-items-start justify-content-between">
                                                <div class=" fs-13 fw-semibold">
                                                    <a href="cart.html">Sports shoes for men</a>
                                                </div>
                                                <div>
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="min-w-fit-content align-items-start">
                                                <div class=" fw-normal fs-12 text-muted">Quantity:01</div>
                                                <div class="d-flex align-items-center">
                                                    <span class=" fw-semibold fs-16">$10,229</span>
                                                    <p
                                                        class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                        $799</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item border-bottom">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <span class="p-1 avatar avatar-xl bd-gray-200">
                                            <img src="../assets/images/ecommerce/png/40.png" alt="">
                                        </span>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="mb-0 d-flex align-items-start justify-content-between">
                                                <div class=" fs-13 fw-semibold">
                                                    <a href="cart.html">Pink color smart watch </a>
                                                </div>
                                                <div>
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="min-w-fit-content align-items-start">
                                                <div class=" fw-normal fs-12 text-muted">Quantity:03</div>
                                                <div class="d-flex align-items-center">
                                                    <span class=" fw-semibold fs-16">$5,500</span>
                                                    <p
                                                        class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                        $599</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item border-bottom">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <span class="p-1 avatar avatar-xl bd-gray-200">
                                            <img src="../assets/images/ecommerce/png/8.png" alt="">
                                        </span>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="mb-0 d-flex align-items-start justify-content-between">
                                                <div class=" fs-13 fw-semibold">
                                                    <a href="cart.html">Red Leafs plant </a>
                                                </div>
                                                <div>
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="min-w-fit-content align-items-start">
                                                <div class=" fw-normal fs-12 text-muted">Quantity:01</div>
                                                <div class="d-flex align-items-center">
                                                    <span class=" fw-semibold fs-16">$15,300</span>
                                                    <p
                                                        class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                        $799</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start cart-dropdown-item">
                                        <span class="p-1 avatar avatar-xl bd-gray-200">
                                            <img src="../assets/images/ecommerce/png/11.png" alt="">
                                        </span>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="mb-0 d-flex align-items-start justify-content-between">
                                                <div class=" fs-13 fw-semibold">
                                                    <a href="cart.html">Good luck mini plant</a>
                                                </div>
                                                <div>
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="header-cart-remove float-end dropdown-item-close"><i
                                                            class="ti ti-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="min-w-fit-content align-items-start">
                                                <div class=" fw-normal fs-12 text-muted">Quantity:02</div>
                                                <div class="d-flex align-items-center">
                                                    <span class=" fw-semibold fs-16">$600</span>
                                                    <p
                                                        class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                        $99</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item border-top">
                                <div class="d-grid">
                                    <a href="checkout.html" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xxl avatar-rounded bg-warning-transparent">
                                        <i class="bx bx-cart bx-tada fs-2"></i>
                                    </span>
                                    <h6 class="mt-3 mb-2 fw-bold">Your Cart is Empty</h6>
                                    <a href="products.html" class="m-1 btn btn-primary btn-wave btn-sm"
                                        data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element notifications-dropdown ">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <i class="bx bx-bell bx-flip-horizontal header-link-icon ionicon"></i>
                            <span class="badge bg-info rounded-pill header-icon-badge pulse pulse-secondary"
                                id="notification-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="border-0 main-header-dropdown dropdown-menu dropdown-menu-end"
                            data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                                    <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="mb-0 list-unstyled" id="header-notification-scroll">
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-secondary-transparent rounded-2">
                                                <img src="../assets/images/faces/2.jpg" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Olivia
                                                        James</a></p>
                                                <span class="fs-12 text-muted fw-normal">Congratulate for New template
                                                    start</span>
                                            </div>
                                            <div class="min-w-fit-content ms-2 text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                        class="ti ti-x fs-14"></i></a>
                                                <p class="mb-0 text-muted fs-11">2 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-warning-transparent rounded-2"><i
                                                    class="bx bx-pyramid fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Order Placed
                                                        <span class="text-warning">ID: #1116773</span></a></p>
                                                <span class="fs-12 text-muted fw-normal header-notification-text">Order
                                                    Placed Successfully</span>
                                            </div>
                                            <div class="min-w-fit-content ms-2 text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                        class="ti ti-x fs-14"></i></a>
                                                <p class="mb-0 text-muted fs-11">5 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-secondary-transparent rounded-2">
                                                <img src="../assets/images/faces/8.jpg" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Elizabeth
                                                        Lewis</a></p>
                                                <span class="fs-12 text-muted fw-normal">added new schedule realease
                                                    date</span>
                                            </div>
                                            <div class="min-w-fit-content ms-2 text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                        class="ti ti-x fs-14"></i></a>
                                                <p class="mb-0 text-muted fs-11">10 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-primary-transparent rounded-2"><i
                                                    class="bx bx-pulse fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Your Order
                                                        Has Been Shipped</a></p>
                                                <span class="fs-12 text-muted fw-normal header-notification-text">Order
                                                    No: 123456 Has Shipped To Your Delivery Address</span>
                                            </div>
                                            <div class="min-w-fit-content ms-2 text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                        class="ti ti-x fs-14"></i></a>
                                                <p class="mb-0 text-muted fs-11">12 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-pink-transparent rounded-2"><i
                                                    class="bx bx-badge-check"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Account Has
                                                        Been Verified</a></p>
                                                <span class="fs-12 text-muted fw-normal header-notification-text">Your
                                                    Account Has Been Verified Sucessfully</span>
                                            </div>
                                            <div class="min-w-fit-content ms-2 text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                        class="ti ti-x fs-14"></i></a>
                                                <p class="mb-0 text-muted fs-11">20 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid">
                                    <a href="notifications.html" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="bx bx-bell-off bx-tada fs-2"></i>
                                    </span>
                                    <h6 class="mt-3 fw-semibold">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <div class="header-element d-flex header-settings header-shortcuts-dropdown">
                        <a aria-label="anchor" href="javascript:void(0);" class=" header-link nav-link icon"
                            data-bs-toggle="offcanvas" data-bs-target="#apps" aria-controls="apps">
                            <i class="bx bx-category header-link-icon"></i>
                        </a>
                    </div>

                    <div class="offcanvas offcanvas-end wd-330" tabindex="-1" id="apps"
                        aria-labelledby="appsLabel">
                        <div class="offcanvas-header border-bottom">
                            <h5 id="appsLabel" class="mb-0 fs-18">Related Apps</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"> <i class="bx bx-x apps-btn-close"></i></button>
                        </div>
                        <div class="p-3">
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="full-calendar.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar fs-23 bg-success-transparent">
                                                <i class="bx bx-calendar text-success"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Calendar</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="mail.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar fs-23 bg-info-transparent">
                                                <i class="bx bx-envelope text-info"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Mail</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="profile.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar bg-warning-transparent fs-23 bg">
                                                <i class="bx bx-user text-warning"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Profile</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="chat.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar bg-pink-transparent fs-23 bg">
                                                <i class="bx bx-chat text-pink"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Chat</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="contacts.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar bg-secondary-transparent fs-23 bg">
                                                <i class="bx bx-phone text-secondary"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Contacts</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="mail-settings.html">
                                        <div class="p-3 text-center border related-app">
                                            <span class="p-2 mb-2 avatar bg-teal-transparent fs-23 bg">
                                                <i class="bx bx-cog text-teal"></i>
                                            </span>
                                            <span class="d-block fs-13 text-muted fw-semibold">Settings</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" onclick="openFullscreen();" href="javascript:void(0);"
                            class="header-link">
                            <i class="bx bx-fullscreen header-link-icon full-screen-open"></i>
                            <i class="bx bx-exit-fullscreen header-link-icon full-screen-close d-none"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element d-flex header-settings">
                        <a aria-label="anchor" href="javascript:void(0);" class=" header-link nav-link icon me-1"
                            data-bs-toggle="offcanvas" data-bs-target="#sidebar-right" aria-controls="sidebar-right">
                            <i class="bx bx-slider header-link-icon"></i>
                        </a>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element mainuserProfile">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="d-sm-flex wd-100p">
                                    <div class="avatar avatar-sm"><img alt="avatar" class="rounded-circle"
                                            src="../assets/images/faces/1.jpg"></div>
                                    <div class="my-auto ms-2 d-none d-xl-flex">
                                        <h6 class="mb-0 font-weight-semibold fs-13 user-name d-sm-block d-none">Harry
                                            Jones</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="overflow-hidden border-0 dropdown-menu main-header-dropdown header-profile-dropdown"
                            aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item border-bottom" href="profile.html"><i
                                        class="fs-13 me-2 bx bx-user"></i>Profile</a></li>
                            <li><a class="dropdown-item border-bottom" href="mail.html"><i
                                        class="fs-13 me-2 bx bx-comment"></i>Message</a></li>
                            <li><a class="dropdown-item border-bottom" href="mail-settings.html"><i
                                        class="fs-13 me-2 bx bx-cog"></i>Settings</a></li>
                            <li><a class="dropdown-item border-bottom" href="faq's.html"><i
                                        class="fs-13 me-2 bx bx-help-circle"></i>Help</a></li>
                            <li><a class="dropdown-item" href="sign-in-cover.html"><i
                                        class="fs-13 me-2 bx bx-arrow-to-right"></i>Log Out</a></li>
                        </ul>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link|switcher-icon -->
                        <a aria-label="anchor" href="javascript:void(0);" class="header-link switcher-icon ms-1"
                            data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                            <i class="bx bx-cog bx-spin header-link-icon"></i>
                        </a>
                        <!-- End::header-link|switcher-icon -->
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                    <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                    <img src="../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                    <img src="../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-desktop'></i>
                                </span>
                                <span class="side-menu__label">Dashboards<span
                                        class="badge bg-warning-transparent ms-2 d-inline-block">12</span></span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Dashboards</a>
                                </li>
                                <li class="slide">
                                    <a href="index.html" class="side-menu__item">Sales</a>
                                </li>
                                <li class="slide">
                                    <a href="index-1.html" class="side-menu__item">Crypto</a>
                                </li>
                                <li class="slide">
                                    <a href="index-2.html" class="side-menu__item">Jobs</a>
                                </li>
                                <li class="slide">
                                    <a href="index-3.html" class="side-menu__item">CRM</a>
                                </li>
                                <li class="slide">
                                    <a href="index-4.html" class="side-menu__item">Ecommerce</a>
                                </li>
                                <li class="slide">
                                    <a href="index-5.html" class="side-menu__item">Analytics</a>
                                </li>
                                <li class="slide">
                                    <a href="index-6.html" class="side-menu__item">Projects</a>
                                </li>
                                <li class="slide">
                                    <a href="index-7.html" class="side-menu__item">NFT</a>
                                </li>
                                <li class="slide">
                                    <a href="index-8.html" class="side-menu__item">HRM</a>
                                </li>
                                <li class="slide">
                                    <a href="index-9.html" class="side-menu__item">Personal</a>
                                </li>
                                <li class="slide">
                                    <a href="index-10.html" class="side-menu__item">Stocks</a>
                                </li>
                                <li class="slide">
                                    <a href="index-11.html" class="side-menu__item">Course</a>
                                </li>
                            </ul>
                        </li>

                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">General</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-cube'></i>
                                </span>
                                <span class="side-menu__label">Advanced Ui</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Advanced Ui</a>
                                </li>
                                <li class="slide">
                                    <a href="accordions_collpase.html" class="side-menu__item">Accordions &
                                        Collapse</a>
                                </li>
                                <li class="slide">
                                    <a href="carousel.html" class="side-menu__item">Carousel</a>
                                </li>
                                <li class="slide">
                                    <a href="draggable-cards.html" class="side-menu__item">Draggable Cards</a>
                                </li>
                                <li class="slide">
                                    <a href="modals_closes.html" class="side-menu__item">Modals & Closes</a>
                                </li>
                                <li class="slide">
                                    <a href="navbar.html" class="side-menu__item">Navbar</a>
                                </li>
                                <li class="slide">
                                    <a href="offcanvas.html" class="side-menu__item">Offcanvas</a>
                                </li>
                                <li class="slide">
                                    <a href="placeholders.html" class="side-menu__item">Placeholders</a>
                                </li>
                                <li class="slide">
                                    <a href="ratings.html" class="side-menu__item">Ratings</a>
                                </li>
                                <li class="slide">
                                    <a href="scrollspy.html" class="side-menu__item">Scrollspy</a>
                                </li>
                                <li class="slide">
                                    <a href="swiperjs.html" class="side-menu__item">Swiper JS</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Pages</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-food-menu'></i>
                                </span>
                                <span class="side-menu__label">Pages</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Pages</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Blog
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="blog.html" class="side-menu__item">Blog</a>
                                        </li>
                                        <li class="slide">
                                            <a href="blog-details.html" class="side-menu__item">Blog Details</a>
                                        </li>
                                        <li class="slide">
                                            <a href="blog-create.html" class="side-menu__item">Create Blog</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="chat.html" class="side-menu__item">Chat</a>
                                </li>
                                <li class="slide">
                                    <a href="contacts.html" class="side-menu__item">Contacts</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Ecommerce
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="add-products.html" class="side-menu__item">Add Products</a>
                                        </li>
                                        <li class="slide">
                                            <a href="cart.html" class="side-menu__item">Cart</a>
                                        </li>
                                        <li class="slide">
                                            <a href="checkout.html" class="side-menu__item">Checkout</a>
                                        </li>
                                        <li class="slide">
                                            <a href="edit-products.html" class="side-menu__item">Edit Products</a>
                                        </li>
                                        <li class="slide">
                                            <a href="orders.html" class="side-menu__item">Orders</a>
                                        </li>
                                        <li class="slide">
                                            <a href="order-details.html" class="side-menu__item">Order Details</a>
                                        </li>
                                        <li class="slide">
                                            <a href="products.html" class="side-menu__item">Products</a>
                                        </li>
                                        <li class="slide">
                                            <a href="product-details.html" class="side-menu__item">Product
                                                Details</a>
                                        </li>
                                        <li class="slide">
                                            <a href="products-list.html" class="side-menu__item">Products List</a>
                                        </li>
                                        <li class="slide">
                                            <a href="wishlist.html" class="side-menu__item">Wishlist</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Email
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="mail.html" class="side-menu__item">Mail App</a>
                                        </li>
                                        <li class="slide">
                                            <a href="mail-chat.html" class="side-menu__item">Mail-chat</a>
                                        </li>
                                        <li class="slide">
                                            <a href="mail-settings.html" class="side-menu__item">Mail Settings</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="empty.html" class="side-menu__item">Empty</a>
                                </li>
                                <li class="slide">
                                    <a href="faq's.html" class="side-menu__item">FAQ's</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">File Manager
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="file-manager.html" class="side-menu__item">File Manager</a>
                                        </li>
                                        <li class="slide">
                                            <a href="file-details.html" class="side-menu__item">File Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Invoice
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="invoice-create.html" class="side-menu__item">Create Invoice</a>
                                        </li>
                                        <li class="slide">
                                            <a href="invoice-details.html" class="side-menu__item">Invoice
                                                Details</a>
                                        </li>
                                        <li class="slide">
                                            <a href="invoice-list.html" class="side-menu__item">Invoice List</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Timeline
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="timeline.html" class="side-menu__item">Timeline-1</a>
                                        </li>
                                        <li class="slide">
                                            <a href="timeline2.html" class="side-menu__item">Timeline-2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="landing.html" class="side-menu__item">Landing</a>
                                </li>
                                <li class="slide">
                                    <a href="notifications.html" class="side-menu__item">Notifications</a>
                                </li>
                                <li class="slide">
                                    <a href="pricing.html" class="side-menu__item">Pricing</a>
                                </li>
                                <li class="slide">
                                    <a href="profile.html" class="side-menu__item">Profile</a>
                                </li>
                                <li class="slide">
                                    <a href="reviews.html" class="side-menu__item">Reviews</a>
                                </li>
                                <li class="slide">
                                    <a href="team.html" class="side-menu__item">Team</a>
                                </li>
                                <li class="slide">
                                    <a href="terms_conditions.html" class="side-menu__item">Terms & Conditions</a>
                                </li>
                                <li class="slide">
                                    <a href="to-do-list.html" class="side-menu__item">To Do List</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-magnet'></i>
                                </span>
                                <span class="side-menu__label">Utilities</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Utilities</a>
                                </li>
                                <li class="slide">
                                    <a href="avatars.html" class="side-menu__item">Avatars</a>
                                </li>
                                <li class="slide">
                                    <a href="borders.html" class="side-menu__item">Borders</a>
                                </li>
                                <li class="slide">
                                    <a href="breakpoints.html" class="side-menu__item">Breakpoints</a>
                                </li>
                                <li class="slide">
                                    <a href="colors.html" class="side-menu__item">Colors</a>
                                </li>
                                <li class="slide">
                                    <a href="columns.html" class="side-menu__item">Columns</a>
                                </li>
                                <li class="slide">
                                    <a href="flex.html" class="side-menu__item">Flex</a>
                                </li>
                                <li class="slide">
                                    <a href="gutters.html" class="side-menu__item">Gutters</a>
                                </li>
                                <li class="slide">
                                    <a href="helpers.html" class="side-menu__item">Helpers</a>
                                </li>
                                <li class="slide">
                                    <a href="position.html" class="side-menu__item">Position</a>
                                </li>
                                <li class="slide">
                                    <a href="more.html" class="side-menu__item">Additional Content</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-lock-alt'></i>
                                </span>
                                <span class="side-menu__label">Authentication</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Authentication</a>
                                </li>
                                <li class="slide">
                                    <a href="coming-soon.html" class="side-menu__item">Coming Soon</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Create Password
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="create-password-basic.html" class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="create-password-cover.html" class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="create-password-cover2.html" class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Lock Screen
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="lockscreen-basic.html" class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="lockscreen-cover.html" class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="lockscreen-cover2.html" class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Reset Password
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="reset-password-basic.html" class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="reset-password-cover.html" class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="reset-password-cover2.html" class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Sign Up
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="sign-up-basic.html" class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="sign-up-cover.html" class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="sign-up-cover2.html" class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Sign In
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="sign-in-basic.html" class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="sign-in-cover.html" class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="sign-in-cover2.html" class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Two Step Verification
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="two-step-verification-basic.html"
                                                class="side-menu__item">Basic</a>
                                        </li>
                                        <li class="slide">
                                            <a href="two-step-verification-cover.html"
                                                class="side-menu__item">Cover</a>
                                        </li>
                                        <li class="slide">
                                            <a href="two-step-verification-cover2.html"
                                                class="side-menu__item">Cover2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="under-maintenance.html" class="side-menu__item">Under Maintenance</a>
                                </li>
                                <li class="slide">
                                    <a href="no-internet.html" class="side-menu__item">no-internet</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-error-alt'></i>
                                </span>
                                <span class="side-menu__label">Error</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Error</a>
                                </li>
                                <li class="slide">
                                    <a href="401-error.html" class="side-menu__item">401 - Error</a>
                                </li>
                                <li class="slide">
                                    <a href="404-error.html" class="side-menu__item">404 - Error</a>
                                </li>
                                <li class="slide">
                                    <a href="500-error.html" class="side-menu__item">500 - Error</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->


                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-carousel'></i>
                                </span>
                                <span class="side-menu__label">Apps</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Apps</a>
                                </li>
                                <li class="slide">
                                    <a href="full-calendar.html" class="side-menu__item">Full Calendar</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Gallery</a>
                                </li>
                                <li class="slide">
                                    <a href="sweet_alerts.html" class="side-menu__item">Sweet Alerts</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="icons.html" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-smile'></i>
                                </span>
                                <span class="side-menu__label">Icons</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="widgets.html" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-layout'></i>
                                </span>
                                <span class="side-menu__label">Widgets<span
                                        class="badge bg-danger-transparent ms-2 d-inline-block">Hot</span></span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Web Apps</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-underline'></i>
                                </span>
                                <span class="side-menu__label">Ui Elements</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Ui Elements</a>
                                </li>
                                <li class="slide">
                                    <a href="alerts.html" class="side-menu__item">Alerts</a>
                                </li>
                                <li class="slide">
                                    <a href="badge.html" class="side-menu__item">Badge</a>
                                </li>
                                <li class="slide">
                                    <a href="breadcrumb.html" class="side-menu__item">Breadcrumb</a>
                                </li>
                                <li class="slide">
                                    <a href="buttons.html" class="side-menu__item">Buttons</a>
                                </li>
                                <li class="slide">
                                    <a href="buttongroup.html" class="side-menu__item">Button Group</a>
                                </li>
                                <li class="slide">
                                    <a href="cards.html" class="side-menu__item">Cards</a>
                                </li>
                                <li class="slide">
                                    <a href="dropdowns.html" class="side-menu__item">Dropdowns</a>
                                </li>
                                <li class="slide">
                                    <a href="images_figures.html" class="side-menu__item">Images & Figures</a>
                                </li>
                                <li class="slide">
                                    <a href="listgroup.html" class="side-menu__item">List Group</a>
                                </li>
                                <li class="slide">
                                    <a href="navs_tabs.html" class="side-menu__item">Navs & Tabs</a>
                                </li>
                                <li class="slide">
                                    <a href="object-fit.html" class="side-menu__item">Object Fit</a>
                                </li>
                                <li class="slide">
                                    <a href="pagination.html" class="side-menu__item">Pagination</a>
                                </li>
                                <li class="slide">
                                    <a href="popovers.html" class="side-menu__item">Popovers</a>
                                </li>
                                <li class="slide">
                                    <a href="progress.html" class="side-menu__item">Progress</a>
                                </li>
                                <li class="slide">
                                    <a href="spinners.html" class="side-menu__item">Spinners</a>
                                </li>
                                <li class="slide">
                                    <a href="toasts.html" class="side-menu__item">Toasts</a>
                                </li>
                                <li class="slide">
                                    <a href="tooltips.html" class="side-menu__item">Tooltips</a>
                                </li>
                                <li class="slide">
                                    <a href="typography.html" class="side-menu__item">Typography</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-menu'></i>
                                </span>
                                <span class="side-menu__label">Nested Menu</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Nested Menu</a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Nested-1</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Nested-2
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="javascript:void(0);" class="side-menu__item">Nested-2-1</a>
                                        </li>
                                        <li class="slide has-sub">
                                            <a href="javascript:void(0);" class="side-menu__item">Nested-2-2
                                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                            <ul class="slide-menu child3">
                                                <li class="slide">
                                                    <a href="javascript:void(0);"
                                                        class="side-menu__item">Nested-2-2-1</a>
                                                </li>
                                                <li class="slide">
                                                    <a href="javascript:void(0);"
                                                        class="side-menu__item">Nested-2-2-2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Maps & Charts</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-map-pin'></i>
                                </span>
                                <span class="side-menu__label">Maps</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Maps</a>
                                </li>
                                <li class="slide">
                                    <a href="google-maps.html" class="side-menu__item">Google Maps</a>
                                </li>
                                <li class="slide">
                                    <a href="leaflet-maps.html" class="side-menu__item">Leaflet Maps</a>
                                </li>
                                <li class="slide">
                                    <a href="vector-maps.html" class="side-menu__item">Vector Maps</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-scatter-chart'></i>
                                </span>
                                <span class="side-menu__label">Charts</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Charts</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Apex Charts
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="apex-line-charts.html" class="side-menu__item">Line Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-area-charts.html" class="side-menu__item">Area Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-column-charts.html" class="side-menu__item">Column
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-bar-charts.html" class="side-menu__item">Bar Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-mixed-charts.html" class="side-menu__item">Mixed
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-rangearea-charts.html" class="side-menu__item">Range Area
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-timeline-charts.html" class="side-menu__item">Timeline
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-candlestick-charts.html"
                                                class="side-menu__item">CandleStick
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-boxplot-charts.html" class="side-menu__item">Boxplot
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-bubble-charts.html" class="side-menu__item">Bubble
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-scatter-charts.html" class="side-menu__item">Scatter
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-heatmap-charts.html" class="side-menu__item">Heatmap
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-treemap-charts.html" class="side-menu__item">Treemap
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-pie-charts.html" class="side-menu__item">Pie Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-radialbar-charts.html" class="side-menu__item">Radialbar
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-radar-charts.html" class="side-menu__item">Radar
                                                Charts</a>
                                        </li>
                                        <li class="slide">
                                            <a href="apex-polararea-charts.html" class="side-menu__item">Polararea
                                                Charts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="chartjs-Charts.html" class="side-menu__item">Chartjs Charts</a>
                                </li>
                                <li class="slide">
                                    <a href="echarts.html" class="side-menu__item">Echart Charts</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Forms & Tables </span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-file'></i>
                                </span>
                                <span class="side-menu__label">Forms</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Forms</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Form Elements
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="form_inputs.html" class="side-menu__item">Inputs</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_check_radios.html" class="side-menu__item">Checks &
                                                Radios</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_input_group.html" class="side-menu__item">Input Group</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_select.html" class="side-menu__item">Form Select</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_range.html" class="side-menu__item">Range Slider</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_input_masks.html" class="side-menu__item">Input Masks</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_file_uploads.html" class="side-menu__item">File
                                                Uploads</a>
                                        </li>
                                        <li class="slide">
                                            <a href="form_dateTime_pickers.html" class="side-menu__item">Date,color
                                                Picker</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="floating_labels.html" class="side-menu__item">Floating Labels</a>
                                </li>
                                <li class="slide">
                                    <a href="form_layout.html" class="side-menu__item">Form Layouts</a>
                                </li>
                                <li class="slide has-sub">
                                    <a href="javascript:void(0);" class="side-menu__item">Form Editors
                                        <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                    <ul class="slide-menu child2">
                                        <li class="slide">
                                            <a href="quill_editor.html" class="side-menu__item">Quill Editor</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="slide">
                                    <a href="form_validation.html" class="side-menu__item">Validation</a>
                                </li>
                                <li class="slide">
                                    <a href="form_select2.html" class="side-menu__item">Select2</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-table'></i>
                                </span>
                                <span class="side-menu__label">Tables<span
                                        class="badge bg-success-transparent ms-2 d-inline-block">3</span></span>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Tables</a>
                                </li>
                                <li class="slide">
                                    <a href="tables.html" class="side-menu__item">Tables</a>
                                </li>
                                <li class="slide">
                                    <a href="grid-tables.html" class="side-menu__item">Grid JS Tables</a>
                                </li>
                                <li class="slide">
                                    <a href="data-tables.html" class="side-menu__item">Data Tables</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                            </path>
                        </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->
        <!-- Page Header -->
        <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
            <h4 class="mb-0 fw-medium">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Dashboards</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sales</li>
            </ol>
        </div>
        <!-- Page Header Close -->



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                            <div class="col card-background">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <p class="mb-1 fw-medium text-muted">Total Sales</p>
                                                <h3 class="mb-0">$18,645</h3>
                                            </div>
                                            <div class="avatar avatar-md br-4 bg-primary-transparent ms-auto">
                                                <i class="bi bi-cart-check fs-20"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                            <span class="badge bg-primary-transparent rounded-pill">+24% <i
                                                    class="fe fe-arrow-down"></i></span>
                                            <a href="javascript:void(0);"
                                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card-background">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <p class="mb-1 fw-medium text-muted">Total Revenue</p>
                                                <h3 class="mb-0">$34,876</h3>
                                            </div>
                                            <div class="avatar avatar-md br-4 bg-secondary-transparent ms-auto">
                                                <i class="bi bi-archive fs-20"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                            <span class="badge bg-success-transparent rounded-pill">+0.26% <i
                                                    class="fe fe-arrow-down"></i></span>
                                            <a href="javascript:void(0);"
                                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card-background">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <p class="mb-1 fw-medium text-muted">Total Products</p>
                                                <h3 class="mb-0">26,231</h3>
                                            </div>
                                            <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                                <i class="bi bi-handbag fs-20"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                            <span class="badge bg-danger-transparent rounded-pill">+06% <i
                                                    class="fe fe-arrow-down"></i></span>
                                            <a href="javascript:void(0);"
                                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card-background">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <p class="mb-1 fw-medium text-muted">Total Expenses</p>
                                                <h3 class="mb-0">$73,579</h3>
                                            </div>
                                            <div class="avatar avatar-md br-4 bg-warning-transparent ms-auto">
                                                <i class="bi bi-currency-dollar fs-20"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                            <span class="badge bg-success-transparent rounded-pill">+10% <i
                                                    class="fe fe-arrow-up"></i></span>
                                            <a href="javascript:void(0);"
                                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col card-background">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <p class="mb-1 fw-medium text-muted">Active Subscribers</p>
                                                <h3 class="mb-0">1,468</h3>
                                            </div>
                                            <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                                <i class="bi bi-bell fs-20"></i>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex">
                                            <span class="badge bg-danger-transparent rounded-pill">+16% <i
                                                    class="fe fe-arrow-down"></i></span>
                                            <a href="javascript:void(0);"
                                                class="mt-auto text-muted fs-11 ms-auto text-decoration-underline">view
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 -->
                <div class="row">
                    <div class="col-xxl-3 col-xl-12">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-6 col-lg-6">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <div class="card-title">Recent Activity</div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="mb-0 task-list">
                                            <li class="">
                                                <div class="">
                                                    <i class="task-icon bg-primary"></i>
                                                    <h6 class="mb-0 fw-semibold">Task Finished</h6>
                                                    <div
                                                        class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <span class="fs-12 text-muted">Adam Berry finished task on
                                                                <a href="javascript:void(0)"
                                                                    class="fw-semibold text-primary"> AngularJS
                                                                    Template</a></span>
                                                        </div>
                                                        <div class="min-w-fit-content ms-2 text-end">

                                                            <p class="mb-0 text-muted fs-11">09 July 2021</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="">
                                                    <i class="task-icon bg-info"></i>
                                                    <h6 class="mb-0 fw-semibold">Task Overdue</h6>
                                                    <div
                                                        class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <span class="fs-12 text-muted">Petey Cruiser
                                                                finished</span>
                                                            <a href="javascript:void(0)"
                                                                class="fw-semibold text-info"> Integrated
                                                                management</a>
                                                        </div>
                                                        <div class="min-w-fit-content ms-2 text-end">

                                                            <p class="mb-0 text-muted fs-11">29 June 2021</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="">
                                                    <i class="task-icon bg-warning"></i>
                                                    <h6 class="mb-0 fw-semibold">Task Finished</h6>
                                                    <div
                                                        class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <span class="fs-12 text-muted">Adam Berry finished task
                                                                on</span>
                                                            <a href="javascript:void(0)"
                                                                class="fw-semibold text-warning"> AngularJS
                                                                Template</a>
                                                        </div>
                                                        <div class="min-w-fit-content ms-2 text-end">

                                                            <p class="mb-0 text-muted fs-11">09 July 2021</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="">
                                                    <i class="task-icon bg-success"></i>
                                                    <h6 class="mb-0 fw-semibold">Task Finished</h6>
                                                    <div
                                                        class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <span class="fs-12 text-muted">Adam Berry finished task
                                                                on</span>
                                                            <a href="javascript:void(0)"
                                                                class="fw-semibold text-success"> AngularJS
                                                                Template</a>
                                                        </div>
                                                        <div class="min-w-fit-content ms-2 text-end">

                                                            <p class="mb-0 text-muted fs-11">09 July 2021</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-0">
                                                <div class="">
                                                    <i class="task-icon bg-secondary"></i>
                                                    <h6 class="mb-0 fw-semibold">New Comment</h6>
                                                    <div
                                                        class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <span class="fs-12 text-muted">Adam Berry finished task
                                                                on</span>
                                                            <a href="javascript:void(0)"
                                                                class="fw-semibold text-secondary"> Project
                                                                Management</a>
                                                        </div>
                                                        <div class="min-w-fit-content ms-2 text-end">

                                                            <p class="mb-0 text-muted fs-11">25 Aug 2021</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-6 col-lg-6">
                                <div class="overflow-hidden card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Sales by Country
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-light btn-sm">View
                                                All</button>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="row" class="fw-semibold ps-4">Country</th>
                                                        <th scope="row" class="fw-semibold">Sales</th>
                                                        <th scope="row" class="fw-semibold">Bounce</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="top-selling">
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="p-2 avatar avatar-md bg-light avatar-rounded">
                                                                    <img src="../assets/images/flags/canada_flag.jpg"
                                                                        class="rounded-circle" alt="">
                                                                </span>
                                                                <div class="ms-2">
                                                                    <p class="mb-0 fw-semibold">Canada</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="fw-semibold">2500</span>
                                                        </td>
                                                        <td><span
                                                                class="badge badge-sm bg-success-transparent text-success">24.4%</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="p-2 avatar avatar-md bg-light avatar-rounded">
                                                                    <img src="../assets/images/flags/germany_flag.jpg"
                                                                        class="rounded-circle" alt="">
                                                                </span>
                                                                <div class="ms-2">
                                                                    <p class="mb-0 fw-semibold">Germany</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="fw-semibold">846</span>
                                                        </td>
                                                        <td><span
                                                                class="badge badge-sm bg-danger-transparent text-danger">22.33%</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="p-2 avatar avatar-md bg-light avatar-rounded">
                                                                    <img src="../assets/images/flags/mexico_flag.jpg"
                                                                        class="rounded-circle" alt="">
                                                                </span>
                                                                <div class="ms-2">
                                                                    <p class="mb-0 fw-semibold">Mexico</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="fw-semibold">1,024</span>
                                                        </td>
                                                        <td><span
                                                                class="badge badge-sm bg-danger-transparent text-danger">14.8%</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="p-2 avatar avatar-md bg-light avatar-rounded">
                                                                    <img src="../assets/images/flags/russia_flag.jpg"
                                                                        class="rounded-circle" alt="">
                                                                </span>
                                                                <div class="ms-2">
                                                                    <p class="mb-0 fw-semibold">Russia</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="fw-semibold">482</span>
                                                        </td>
                                                        <td><span
                                                                class="badge badge-sm bg-success-transparent text-success">05.8%</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ps-4 border-bottom-0">
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="p-2 avatar avatar-md bg-light avatar-rounded">
                                                                    <img src="../assets/images/flags/us_flag.jpg"
                                                                        class="rounded-circle" alt="">
                                                                </span>
                                                                <div class="ms-2">
                                                                    <p class="mb-0 fw-semibold">USA</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="fw-semibold">1,410</span>
                                                        </td>
                                                        <td class="border-bottom-0"><span
                                                                class="badge badge-sm bg-danger-transparent text-danger">13.08%</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-12">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">Sales Statistics</div>
                                        <div class="dropdown d-flex">
                                            <a href="javascript:void(0);"
                                                class="btn btn-sm btn-primary-light btn-wave waves-effect waves-light d-flex align-items-center me-2"><i
                                                    class="ri-filter-3-line me-1"></i>Filter</a>
                                            <a href="javascript:void(0);"
                                                class="btn dropdown-toggle btn-sm btn-wave waves-effect waves-light btn-primary d-flex align-items-center"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="ri-calendar-2-line me-1"></i>This
                                                Week</a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                        Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                        Week</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Share
                                                        Report</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="earnings"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-12">
                                <div class="overflow-hidden card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Top Selling Products
                                        </div>
                                        <div class="dropdown">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="my-1 btn btn-outline-light btn-icons btn-sm text-muted"
                                                data-bs-toggle="dropdown">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <ul class="mb-0 dropdown-menu">
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">Action</a></li>
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">Another action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something
                                                        else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="p-0 card-body">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table overflow-hidden text-nowrap table-hover rounded-3">
                                                        <thead>
                                                            <tr>
                                                                <th scope="row" class="ps-4">Product Name</th>
                                                                <th scope="row">stock</th>
                                                                <th scope="row">Price</th>
                                                                <th scope="row">Sold</th>
                                                                <th scope="row">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/6.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html">Sports Shoes
                                                                            For Men</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-success-transparent text-success">In
                                                                            Stock</span>
                                                                    </div>
                                                                </td>
                                                                <td> $73.800</td>
                                                                <td>1,534</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/5.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html">Beautiful
                                                                            flower Frame</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-info-transparent text-info">Few-left</span>
                                                                    </div>
                                                                </td>
                                                                <td> $73.800</td>
                                                                <td>4,987</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/3.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html">Small alarm
                                                                            Watch</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-danger-transparent text-danger">Out
                                                                            Of Stock</span>
                                                                    </div>
                                                                </td>
                                                                <td> $13.800</td>
                                                                <td>87,875</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/4.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html">Black colord
                                                                            lens cemara</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-success-transparent text-success">In
                                                                            Stock</span>
                                                                    </div>
                                                                </td>
                                                                <td> $14.600</td>
                                                                <td>98,876</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/1.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html">Smart Phone</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-danger-transparent text-danger">Out
                                                                            Of Stock</span>
                                                                    </div>
                                                                </td>
                                                                <td> $13.800</td>
                                                                <td>87,875</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class=" ps-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-2">
                                                                            <img src="../assets/images/ecommerce/jpg/2.jpg"
                                                                                alt="avatar" class="rounded-1">
                                                                        </div>
                                                                        <a href="product-details.html"> Black colored
                                                                            Headset</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-sm-1 d-block">
                                                                        <span
                                                                            class="badge bg-info-transparent text-info">Few-left</span>
                                                                    </div>
                                                                </td>
                                                                <td> $23.800</td>
                                                                <td>1,987</td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-primary-light btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <span class="ri-pencil-line fs-14"></span>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            class="btn btn-danger-light btn-sm ms-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <span
                                                                                class="ri-delete-bin-7-line fs-14"></span>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-12">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Sales Value
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);"
                                                class="btn-outline-light btn btn-sm text-muted"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                View All<i class="align-middle ri-arrow-down-s-line ms-1"></i>
                                            </a>
                                            <ul class="mb-0 dropdown-menu" role="menu">
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">Today</a></li>
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">This Week</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                        Week</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="">
                                            <div class=" border-bottom">
                                                <div id="avgsales"></div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="p-4 d-flex border-end">
                                                    <div class="text-center">
                                                        <p class="mb-1 text-muted"> <i
                                                                class="bx bxs-circle text-primary fs-13 me-1"></i>Sale
                                                            Items</p>
                                                        <h5 class="mb-0">186,75.00 </h5>
                                                    </div>
                                                </div>

                                                <div class="p-4 d-flex">
                                                    <div class="text-center">
                                                        <p class="mb-1 text-muted"> <i
                                                                class="text-opacity-25 bx bxs-circle text-primary fs-13 me-1"></i>Sale
                                                            Revenue</p>
                                                        <h5 class="mb-0 ">$122,39 </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-6">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Monthly Profits
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);"
                                                class="btn-outline-light btn btn-sm text-muted"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                View All<i class="align-middle ri-arrow-down-s-line ms-1"></i>
                                            </a>
                                            <ul class="mb-0 dropdown-menu" role="menu">
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">Today</a></li>
                                                <li class="border-bottom"><a class="dropdown-item"
                                                        href="javascript:void(0);">This Week</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Last
                                                        Week</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="flex-wrap px-3 py-4 d-flex border-bottom">
                                            <div>
                                                <h4 class="mb-1 text-xl">$78,344</h4>
                                                <p class="mb-0 text-muted">Total Profit Growth Of 85%</p>
                                            </div>
                                            <div class="ms-sm-auto">
                                                <div class="mt-2">
                                                    <span id="sparkline8"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 ">
                                            <ul class="mt-1 mb-0 monthly-profit">
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar avatar-md br-5 bg-warning-transparent text-warning"><i
                                                                    class="fe fe-box"></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="fw-semibold">
                                                                    Fashion
                                                                </h6>
                                                                <div>
                                                                    <p class="mb-0 fs-13 text-muted">
                                                                        <i
                                                                            class="fe fe-arrow-up-right me-1 text-success brround"></i>93.0%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                                    style="width: 90%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar avatar-md br-5 bg-primary-transparent text-primary"><i
                                                                    class="fe fe-home"></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="fw-semibold">
                                                                    Home Furniture
                                                                </h6>
                                                                <div>
                                                                    <p class="mb-0 fs-13 text-muted">
                                                                        <i
                                                                            class="fe fe-arrow-up-right me-1 text-success brround"></i>97.0%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                                    style="width: 80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar avatar-md br-5 bg-secondary-transparent text-secondary"><i
                                                                    class="fe fe-tv"></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="fw-semibold">
                                                                    Electronics
                                                                </h6>
                                                                <div>
                                                                    <p class="mb-0 fs-13 text-muted">
                                                                        <i
                                                                            class="fe fe-arrow-up-right me-1 text-success brround"></i>80.0%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                                                    style="width: 80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-3">
                                                            <span
                                                                class="avatar avatar-md br-5 bg-info-transparent text-info"><i
                                                                    class="fe fe-zap"></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="fw-semibold">
                                                                    Groceries
                                                                </h6>
                                                                <div>
                                                                    <p class="mb-0 fs-13 text-muted">
                                                                        <i
                                                                            class="fe fe-arrow-up-right me-1 text-success brround"></i>80.0%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                                                    style="width: 80%;"></div>
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
                </div>
                <!-- ROW-1 END -->
                <div class="row">
                    <div class="col-xxl-3 col-xl-5">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Transactions History
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="btn-outline-light btn btn-sm text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        View All<i class="align-middle ri-arrow-down-s-line ms-1"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">Today</a></li>
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">This Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="mb-0 sales-transaction-history-list">
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-success-transparent text-success border-success me-3"><i
                                                        class="fe fe-credit-card"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">ATM
                                                        Withdrawl</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">Just now</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-success">
                                                    $2,45,000
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-danger-transparent text-danger border-danger me-3"><i
                                                        class="fe fe-smartphone"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">Movies
                                                        Subscription</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">Yesterday</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-danger">
                                                    -$100.00
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-success-transparent text-success border-success me-3"><i
                                                        class="fe fe-arrow-down"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">Recieved
                                                        from John</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">17-04-2022</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-success">
                                                    $1,50,000
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-danger-transparent text-danger border-danger me-3"><i
                                                        class="fe fe-credit-card"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">Credit
                                                        Card</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">25-04-2022</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-danger">
                                                    -$3,000
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-success-transparent text-success border-success me-3"><i
                                                        class="fe fe-repeat"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">Transfer to
                                                        XYZ Card</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">30-04-2022</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-success">
                                                    $15,000
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"><span
                                                    class="border border-opacity-25 avatar avatar-md rounded-circle br-5 bg-danger-transparent text-danger border-danger me-3"><i
                                                        class="fe fe-repeat"></i></span></a>
                                            <div class="w-100">
                                                <a href="javascript:void(0);">
                                                    <span class="mb-1 fs-14 fw-semibold text-default me-3">Transfer to
                                                        XYZ Card</span>
                                                </a>
                                                <p class="mb-0 fs-12 text-muted me-3">30-04-2022</p>
                                            </div>
                                            <div class="my-auto ">
                                                <h6 class="mb-0 text-success">
                                                    $15,000
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-7">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div>
                                    <h5 class="mb-0 card-title">Recent Orders</h5>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0)"
                                        class="btn btn-outline-light btn-icons btn-sm text-muted"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-start">
                                        <a class="d-flex dropdown-item border-bottom" href="javascript:void(0)">
                                            <i class="ri-share-forward-line me-2"></i>Share
                                        </a>
                                        <a class="d-flex dropdown-item border-bottom" href="javascript:void(0)">
                                            <i class="ri-download-2-line me-2"></i>Download
                                        </a>
                                        <a class="d-flex dropdown-item" href="javascript:void(0)">
                                            <i class="ri-delete-bin-7-line me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table border text-nowrap table-hover table-bordered">
                                        <thead class="border-top">
                                            <tr>
                                                <th scope="row" class="text-center border-bottom-0">S.NO</th>
                                                <th scope="row" class="border-bottom-0">Customer Name</th>
                                                <th scope="row" class="border-bottom-0">Order ID</th>
                                                <th scope="row" class="border-bottom-0">Order Date</th>
                                                <th scope="row" class="border-bottom-0">Price</th>
                                                <th scope="row" class="border-bottom-0">Status</th>
                                                <th scope="row" class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td class="text-center">01</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md me-2 avatar-rounded lh-1">
                                                            <img src="../assets/images/faces/1.jpg" alt="avatar">
                                                        </div>
                                                        <div class="lh-1">
                                                            <a href="product-details.html">Patty Furniture</a>
                                                            <p class="mt-1 mb-0 text-muted fs-11">patty@spruko.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-decoration-underline text-primary">#123SP90</span>
                                                </td>
                                                <td>01 Apr 2022</td>
                                                <td> $73.800</td>
                                                <td>
                                                    <div class="mt-sm-1 d-block">
                                                        <span
                                                            class="badge bg-success-transparent text-success">Delivered</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        <a aria-label="anchor" class="btn btn-primary-light btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <span class="ri-pencil-line fs-14"></span>
                                                        </a>
                                                        <a aria-label="anchor"
                                                            class="btn btn-danger-light btn-sm ms-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <span class="ri-delete-bin-7-line fs-14"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="text-center">02</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md me-2 avatar-rounded lh-1">
                                                            <img src="../assets/images/faces/2.jpg" alt="avatar">
                                                        </div>
                                                        <div class="lh-1">
                                                            <a href="product-details.html">Allie Grate</a>
                                                            <p class="mt-1 mb-0 fs-11 text-muted">allie@spruko.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-decoration-underline text-primary">#123SP91</span>
                                                </td>
                                                <td>02 Apr 2022</td>
                                                <td> $73.800</td>
                                                <td>
                                                    <div class="mt-sm-1 d-block">
                                                        <span
                                                            class="badge bg-success-transparent text-success">Delivered</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        <a aria-label="anchor" class="btn btn-primary-light btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <span class="ri-pencil-line fs-14"></span>
                                                        </a>
                                                        <a aria-label="anchor"
                                                            class="btn btn-danger-light btn-sm ms-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <span class="ri-delete-bin-7-line fs-14"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="text-center">03</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md me-2 avatar-rounded lh-1">
                                                            <img src="../assets/images/faces/3.jpg" alt="avatar">
                                                        </div>
                                                        <div class="lh-1">
                                                            <a href="product-details.html">Peg Legge</a>
                                                            <p class="mt-1 mb-0 fs-11 text-muted">peg@spruko.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-decoration-underline text-primary">#123SP92</span>
                                                </td>
                                                <td>24 Mar 2022</td>
                                                <td> $13.800</td>
                                                <td>
                                                    <div class="mt-sm-1 d-block">
                                                        <span
                                                            class="badge bg-danger-transparent text-danger">Cancelled</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        <a aria-label="anchor" class="btn btn-primary-light btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <span class="ri-pencil-line fs-14"></span>
                                                        </a>
                                                        <a aria-label="anchor"
                                                            class="btn btn-danger-light btn-sm ms-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <span class="ri-delete-bin-7-line fs-14"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="text-center">04</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md me-2 avatar-rounded lh-1">
                                                            <img src="../assets/images/faces/4.jpg" alt="avatar">
                                                        </div>
                                                        <div class="lh-1">
                                                            <a href="product-details.html">Maureen Biologist</a>
                                                            <p class="mt-1 mb-0 fs-11 text-muted">maureen@spruko.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-decoration-underline text-primary">#123SP93</span>
                                                </td>
                                                <td>22 Mar 2022</td>
                                                <td> $14.600</td>
                                                <td>
                                                    <div class="mt-sm-1 d-block">
                                                        <span
                                                            class="badge bg-info-transparent text-info">Pending</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        <a aria-label="anchor" class="btn btn-primary-light btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <span class="ri-pencil-line fs-14"></span>
                                                        </a>
                                                        <a aria-label="anchor"
                                                            class="btn btn-danger-light btn-sm ms-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <span class="ri-delete-bin-7-line fs-14"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="text-center">05</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md me-2 avatar-rounded lh-1">
                                                            <img src="../assets/images/faces/5.jpg" alt="avatar">
                                                        </div>
                                                        <div class="lh-1">
                                                            <a href="product-details.html">Olive Yew</a>
                                                            <p class="mt-1 mb-0 text-muted fs-11">olive@spruko.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-decoration-underline text-primary">#123SP94</span>
                                                </td>
                                                <td>20 Mar 2022</td>
                                                <td> $74.965</td>
                                                <td>
                                                    <div class="mt-sm-1 d-block">
                                                        <span
                                                            class="badge bg-warning-transparent text-warning">Shipped</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        <a aria-label="anchor" class="btn btn-primary-light btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                            <span class="ri-pencil-line fs-14"></span>
                                                        </a>
                                                        <a aria-label="anchor"
                                                            class="btn btn-danger-light btn-sm ms-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <span class="ri-delete-bin-7-line fs-14"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- <tr class="border-bottom">
                                                        <td class="text-center">06</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
               <div class="avatar avatar-md me-2">
                <img src="../assets/images/faces/25.png" alt="avatar" class="rounded-1">
               </div>
               <div class="lh-1">
                                                                <a href="product-details.html">Paddy O'Furnitur</a>
                                                                <p class="mt-1 mb-0 text-muted fs-11">paddy@spruko.com</p>
                                                            </div>
              </div>
                                                        </td>
                                                        <td><span class="text-decoration-underline text-primary">#123SP95</span></td>
                                                        <td>02 Mar 2022</td>
                                                        <td> $90.965</td>
                                                        <td>
                                                            <div class="mt-sm-1 d-block">
                                                                <span
                                                                    class="badge bg-danger-transparent text-danger">Cancelled</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="g-2">
                                                                <a aria-label="anchor" class="btn btn-primary-light btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <span class="ri-pencil-line fs-14"></span>
                                                                </a>
                                                                <a aria-label="anchor" class="btn btn-danger-light btn-sm ms-2" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <span class="ri-delete-bin-7-line fs-14"></span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <span class="input-group">
                            <input type="search" class="px-2 form-control " placeholder="Search..."
                                aria-label="Username">
                            <a href="javascript:void(0);" class="text-white input-group-text bg-primary"
                                id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                        </span>
                        <div class="mt-3">
                            <div class="">
                                <p class="mb-2 fw-semibold text-muted fs-13">Recent Searches</p>
                                <div class="ps-2">
                                    <a href="javascript:void(0)" class="search-tags"><i
                                            class="fe fe-search me-2"></i>People<span></span></a>
                                    <a href="javascript:void(0)" class="search-tags"><i
                                            class="fe fe-search me-2"></i>Pages<span></span></a>
                                    <a href="javascript:void(0)" class="search-tags"><i
                                            class="fe fe-search me-2"></i>Articles<span></span></a>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="mb-2 fw-semibold text-muted fs-13">Apps and pages</p>
                                <ul class="ps-2">
                                    <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                        <a href="full-calendar.html"><span><i
                                                    class='p-2 bx bx-calendar me-2 fs-14 bg-primary-transparent rounded-circle '></i>Calendar</span></a>
                                    </li>
                                    <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                        <a href="mail.html"><span><i
                                                    class='p-2 bx bx-envelope me-2 fs-14 bg-primary-transparent rounded-circle'></i>Mail</span></a>
                                    </li>
                                    <li class="p-1 mb-2 d-flex align-items-center text-muted search-app">
                                        <a href="buttons.html"><span><i
                                                    class='p-2 bx bx-dice-1 me-2 fs-14 bg-primary-transparent rounded-circle '></i>Buttons</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-3">
                                <p class="mb-2 fw-semibold text-muted fs-13">Links</p>
                                <ul class="ps-2">
                                    <li class="p-1 mb-1 align-items-center search-app">
                                        <a href="javascript:void(0)"
                                            class="text-primary"><u>http://spruko/html/spruko.com</u></a>
                                    </li>
                                    <li class="p-1 mb-1 align-items-center search-app">
                                        <a href="javascript:void(0)"
                                            class="text-primary"><u>http://spruko/demo/spruko.com</u></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-block">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View
                                all results</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <footer class="py-3 mt-auto text-center bg-white footer">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span>
                    <a href="javascript:void(0);" class="text-dark fw-semibold">
                        {{ $setting['site_title'] ?? config('app.name') }}
                    </a>. All rights reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- Sidebar-right -->
        <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="sidebar-right">
            <div class="offcanvas-body position-relative">
                <div>
                    <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#orders-1"
                                aria-current="page"><i
                                    class="align-middle bx bx-user-plus me-1 fs-16"></i>Team</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#accepted-1"><i
                                    class="align-middle bx bx-pulse me-1 fs-16"></i>Timeline</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#declined-1"><i
                                    class="align-middle bx bx-message-square-dots me-1 fs-16"></i>Chat</button>
                        </li>
                    </ul>
                    <div class="my-auto ms-auto">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bx bx-x sidebar-btn-close"></i></button>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="orders-1" role="tabpanel">
                        <div class="p-0 card-body">
                            <input type="text" class="form-control" id="inlinecalendar"
                                placeholder="Choose date">
                        </div>
                        <div class="pt-4 pb-3 mt-3 d-flex align-items-center">
                            <div>
                                <h6 class="mb-0 fw-semibold">Team Members</h6>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="btn-outline-light btn btn-sm text-muted"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        View All<i class="align-middle ri-arrow-down-s-line ms-1"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">Today</a>
                                        </li>
                                        <li class="border-bottom"><a class="dropdown-item"
                                                href="javascript:void(0);">This
                                                Week</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="ps-0 vertical-scroll">
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/16.jpg"
                                                alt="img" class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Vanessa James</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Front-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-primary-transparent text-primary me-3">KH</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Kriti Harris</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Back-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/6.jpg"
                                                alt="img" class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Mira Henry</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">UI / UX Designer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-secondary-transparent text-secondary me-3">JK</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">James Kimberly</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Angular Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><img src="../assets/images/faces/9.jpg"
                                                alt="img" class="avatar avatar-md rounded-2 me-3"></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Marley Paul</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">Front-end Developer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="p-3 mb-2 border rounded-2">
                                    <div class="d-flex">
                                        <a href="profile.html"><span
                                                class="avatar avatar-md rounded-2 bg-success-transparent text-success me-3">MA</span></a>
                                        <div class="me-3">
                                            <a href="profile.html">
                                                <h6 class="mb-0 fw-semibold text-default">Mitrona Anna</h6>
                                            </a>
                                            <span class="clearfix"></span>
                                            <span class="fs-12 text-muted">UI / UX Designer</span>
                                        </div>
                                        <a aria-label="anchor" href="javascript:void(0);" class="my-auto ms-auto">
                                            <i class="ri-arrow-right-s-line text-muted fs-20"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="accepted-1" role="tabpanel">
                        <ul class="activity-list">
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/14.jpg"
                                                alt="img" class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Elmer Barnes
                                            <span class="mx-2 text-muted fs-11 fw-normal">Today 02:41 PM</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Added 1 attachment <strong>docfile.doc</strong>
                                    </p>
                                    <div class="mt-3 btn-group file-attach" role="group"
                                        aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-primary-light">
                                            <span class="ri-file-line me-2"></span> Image_file.jpg
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary-light"
                                            aria-label="Close">
                                            <span class="ri-download-2-line"></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-success">RN</span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Roxanne Nunez
                                            <span class="mx-2 text-muted fs-11 fw-normal">Today 11:40 AM</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Commented on <strong>Task Management</strong></p>
                                    <div class="mt-3 activity-comment">
                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-primary"><i
                                                class="text-white ri-shield-line"></i></span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Shirley Vega
                                            <span class="mx-2 text-muted fs-11 fw-normal">Today 08:43 AM</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Task Closed by <strong> Today</strong></p>
                                </div>
                            </li>
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/11.jpg"
                                                alt="img" class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Vivian Herrera
                                            <span class="mx-2 text-muted fs-11 fw-normal">Today 08:00 AM</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Assigned a new Task on <strong> UI
                                            Design</strong></p>
                                </div>
                            </li>
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <span class="avatar avatar-xs brround bg-success">TJ</span>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Tony Jarvis
                                            <span class="mx-2 text-muted fs-11 fw-normal">Yesterday 05:40 PM</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Added 3 attachments <strong>Project</strong></p>
                                    <div class="mt-3 activity-images">
                                        <a href="gallery.html"><img src="../assets/images/media/media-34.jpg"
                                                alt="thumb1"></a>
                                        <a href="gallery.html"><img src="../assets/images/media/media-35.jpg"
                                                alt="thumb1"></a>
                                        <a href="gallery.html"><img src="../assets/images/media/media-36.jpg"
                                                alt="thumb1"></a>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-4 d-flex">
                                <div>
                                    <i class="activity-icon">
                                        <a href="profile.html"><img src="../assets/images/faces/16.jpg"
                                                alt="img" class="avatar avatar-xs rounded-2 me-3"></a>
                                    </i>
                                    <a href="profile.html">
                                        <h6 class="text-default">Russell Kim
                                            <span class="mx-2 text-muted fs-11 fw-normal">17 May 2022</span>
                                        </h6>
                                    </a>
                                    <p class="mb-0 text-muted fs-12">Created a group <strong> Team Unity</strong></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="declined-1" role="tabpanel">
                        <div class="list-group list-group-flush">
                            <div class="pt-3 fw-semibold ps-2 text-muted">Today</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Leon Ray</h6>
                                        <p class="mb-0 fs-12 text-muted"> 2 mins ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-danger-transparent text-danger">DT
                                        <span class="avatar-status bg-success"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Dane Tillery</h6>
                                        <p class="mb-0 fs-12 text-muted"> 10 mins ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Zelda Perkins</h6>
                                        <p class="mb-0 fs-12 text-muted"> 3 hours ago </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="py-3 fw-semibold ps-2 text-muted">Yesterday</div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-primary-transparent text-primary">GB
                                        <span class="avatar-status bg-success"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Gaylord Barrett</h6>
                                        <p class="mb-0 fs-12 text-muted"> 12:40 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Roger Bradley</h6>
                                        <p class="mb-0 fs-12 text-muted"> 01:00 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <a href="profile.html"><img src="../assets/images/faces/16.jpg" alt="img"
                                            class="avatar avatar-md rounded-2"></a>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Magnus Haynes</h6>
                                        <p class="mb-0 fs-12 text-muted"> 03:53 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span
                                        class="avatar avatar-md rounded-2 bg-secondary-transparent text-secondary">DC
                                        <span class="avatar-status bg-gray"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Doran Chasey</h6>
                                        <p class="mb-0 fs-12 text-muted"> 06:00 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="me-2">
                                    <span class="avatar avatar-md rounded-2 bg-warning-transparent text-warning">EW
                                        <span class="avatar-status bg-danger"></span>
                                    </span>
                                </div>
                                <div class="">
                                    <a href="chat.html">
                                        <h6 class="mb-0 fw-semibold">Ellery Wolfe</h6>
                                        <p class="mb-0 fs-12 text-muted"> 08:46 pm </p>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light me-1"><i
                                            class="ri-phone-line text-success"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0);"
                                        class="btn btn-sm btn-outline-light"><i
                                            class="ri-chat-3-line text-primary"></i></a>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="javascript:void(0)"
                                    class="btn btn-sm text-primary text-decoration-underline">View
                                    all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Sidebar-right-->

        <!-- Date & Time Picker JS -->
        <script src="{{ url(config('common.path_template_admin') . 'assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ url(config('common.path_template_admin') . 'assets/js/date&time_pickers.js') }}"></script>

    </div>


    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-circle-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- jQuery -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/jquery.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/@popperjs/core/umd/popper.min.js') }}">
    </script>

    <!-- Bootstrap JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>

    <!-- Defaultmenu JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/simplebar.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/@simonwep/pickr/pickr.es5.min.js') }}">
    </script>

    <!-- JSVector Maps JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/jsvectormap/js/jsvectormap.min.js') }}">
    </script>

    <!-- JSVector Maps MapsJS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Chartjs Chart JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/chart.js/chart.min.js') }}"></script>

    <!-- Apex Charts JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- CRM-Dashboard -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/sales-dashboard.js') }}"></script>


    <!-- Custom-Switcher JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/custom-switcher.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ url(config('common.path_template_admin') . 'assets/js/custom.js') }}"></script>

</body>

</html>

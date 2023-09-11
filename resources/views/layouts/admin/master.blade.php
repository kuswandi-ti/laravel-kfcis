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

    @include('layouts.admin.partials._styles')

    <!-- Page Specific CSS File -->
    @stack('styles_vendor')

    <!-- Page Specific CSS Style -->
    @stack('styles')
</head>

<body>
    @include('layouts.admin.partials._switcher')

    <!-- Loader -->
    <div id="loader">
        <img src="{{ url(config('common.path_template_admin') . 'assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        @include('layouts.admin.partials._header')

        @include('layouts.admin.partials._sidebar')

        <!-- Page Header -->
        <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
            <h4 class="mb-0 fw-medium">
                @yield('section_header_title')
            </h4>
            <ol class="breadcrumb">
                @section('section_header_breadcrumb')
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard.index') }}" class="text-white-50">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                @show
            </ol>
        </div>
        <!-- Page Header Close -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('page_content')
            </div>
        </div>
        <!-- End::app-content -->

        @include('layouts.admin.partials._footer')
    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-circle-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    @include('layouts.admin.partials._scripts')

    <!-- Page Specific JS File -->
    @stack('scripts_vendor')

    <!-- Page Specific JS Script -->
    @stack('scripts')

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
                    title: "{{ __('Anda yakin akan logout ?') }}",
                    text: "{{ __('Setelah logout akan kembali ke halaman login') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Ya, logout !') }}",
                    cancelButtonText: "{{ __('Batal') }}",
                }).then((result) => {
                    if (result.value === true) {
                        $('#form-logout').submit()
                    }
                })
            })

            $('body').on('click', '.delete_item', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "{{ __('Anda yakin akan menghapus data ?') }}",
                    text: "{{ __('Setelah data terhapus, anda tidak dapat mengembalikannya') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Ya, hapus data !') }}",
                    cancelButtonText: "{{ __('Batal') }}",
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
    </script>
</body>

</html>

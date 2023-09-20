<!-- Start::app-sidebar -->
<aside class="app-sidebar" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('admin.dashboard.index') }}" class="header-logo">
            <img src="{{ !empty($setting_system['company_logo_dekstop']) ? url(config('common.path_storage') . $setting_system['company_logo_desktop']) : url(config('common.path_template_admin') . config('common.logo_company_desktop')) }}"
                alt="logo" class="desktop-logo" width="125" height="33">
            <img src="{{ !empty($setting_system['company_logo_toggle']) ? url(config('common.path_storage') . $setting_system['company_logo_toggle']) : url(config('common.path_template_admin') . config('common.logo_company_toggle')) }}"
                alt="logo" class="toggle-logo" width="38" height="33">
            <img src="{{ !empty($setting_system['company_logo_desktop']) ? url(config('common.path_storage') . $setting_system['company_logo_desktop']) : url(config('common.path_template_admin') . config('common.logo_company_desktop')) }}"
                alt="logo" class="desktop-dark" width="125" height="33">
            <img src="{{ !empty($setting_system['company_logo_toggle']) ? url(config('common.path_storage') . $setting_system['company_logo_toggle']) : url(config('common.path_template_admin') . config('common.logo_company_toggle')) }}"
                alt="logo" class="toggle-dark" width="38" height="33">
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
                {{-- ======================================================================================================= --}}
                {{-- DASHBOARD - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                <li class="mt-4 slide__category"><span class="category-name">{{ __('Dashboard') }}</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="side-menu__item {{ setSidebarActive(['admin.dashboard.*']) }}">
                        <span class=" side-menu__icon">
                            <i class='bx bx-desktop'></i>
                        </span>
                        <span class="side-menu__label">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End::slide -->
                {{-- ======================================================================================================= --}}
                {{-- DASHBOARD - END --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- DATA UTAMA - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess(['departemen index', 'bagian index', 'barang penjualan index', 'pengurus index', 'anggota index']))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Data Utama') }}</span></li>
                @endif
                <!-- End::slide__category -->

                <!-- Start::slide -->
                @if (canAccess(['coa index']))
                    <li class="slide {{ setSidebarActive(['admin.coa.*']) }}">
                        <a href="{{ route('admin.coa.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.coa.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-grid-alt'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Chart of Account') }}</span>
                        </a>
                    </li>
                @endif
                <!-- End::slide -->

                <!-- Start::slide -->
                @if (canAccess(['departemen index']))
                    <li class="slide {{ setSidebarActive(['admin.department.*']) }}">
                        <a href="{{ route('admin.department.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.department.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-square'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Departemen') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['bagian index']))
                    <li class="slide {{ setSidebarActive(['admin.section.*']) }}">
                        <a href="{{ route('admin.section.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.section.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-copy'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Bagian') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['barang penjualan index']))
                    <li class="slide {{ setSidebarActive(['admin.product.*']) }}">
                        <a href="{{ route('admin.product.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.product.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-archive'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Barang Penjualan') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['pengurus index', 'anggota index']))
                    <li
                        class="slide has-sub {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }} {{ setSidebarOpen(['admin.admin.*', 'admin.member.*']) }}">
                        <a href="javascript:void(0);"
                            class="side-menu__item {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <span class=" side-menu__icon">
                                <i class='bx bxs-user-plus'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Anggota Koperasi') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1 {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Anggota Koperasi') }}</a>
                            </li>
                            @if (canAccess(['pengurus index']))
                                <li class="slide {{ setSidebarActive(['admin.admin.*']) }}">
                                    <a href="{{ route('admin.admin.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.admin.*']) }}">
                                        {{ __('Pengurus') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['anggota index']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Anggota') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- End::slide -->
                {{-- ======================================================================================================= --}}
                {{-- DATA UTAMA - BEGIN --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- INPUT DATA - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess([
                        'setor tabungan index',
                        'tarik tabungan index',
                        'pinjaman reguler index',
                        'pinjaman pendanaan index',
                        'pinjaman sosial index',
                        'penjualan index',
                    ]))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Input Data') }}</span></li>
                @endif
                <!-- End::slide__category -->

                <!-- Start::slide -->
                @if (canAccess(['penjualan index']))
                    <li class="slide {{ setSidebarActive(['admin.product.*']) }}">
                        <a href="{{ route('admin.product.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.product.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-store'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Penjualan') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['setor tabungan index', 'tarik tabungan index']))
                    <li
                        class="slide has-sub {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }} {{ setSidebarOpen(['admin.admin.*', 'admin.member.*']) }}">
                        <a href="javascript:void(0);"
                            class="side-menu__item {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <span class=" side-menu__icon">
                                <i class='bx bx-wallet'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Tabungan') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1 {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Tabungan') }}</a>
                            </li>
                            @if (canAccess(['setor tabungan index']))
                                <li class="slide {{ setSidebarActive(['admin.admin.*']) }}">
                                    <a href="{{ route('admin.admin.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.admin.*']) }}">
                                        {{ __('Setor Tabungan') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['tarik tabungan index']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Tarik Tabungan') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endcan
                @if (canAccess(['pinjaman reguler index', 'pinjaman pendanaan index', 'pinjaman sosial index']))
                    <li
                        class="slide has-sub {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }} {{ setSidebarOpen(['admin.admin.*', 'admin.member.*']) }}">
                        <a href="javascript:void(0);"
                            class="side-menu__item {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <span class=" side-menu__icon">
                                <i class='bx bx-dollar-circle'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Pinjaman') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1 {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Pinjaman') }}</a>
                            </li>
                            @if (canAccess(['pinjaman reguler index']))
                                <li class="slide {{ setSidebarActive(['admin.admin.*']) }}">
                                    <a href="{{ route('admin.admin.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.admin.*']) }}">
                                        {{ __('Reguler') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['pinjaman pendanaan index']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Pendanaan') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['pinjaman sosial index']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Sosial') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- End::slide -->
                {{-- ======================================================================================================= --}}
                {{-- INPUT DATA - END --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- APPROVE DATA - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess(['anggota approve', 'setor tabungan approve']))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Approve Data') }}</span>
                    </li>
                @endif
                <!-- End::slide__category -->

                <!-- Start::slide -->
                @if (canAccess(['anggota approve']))
                    <li class="slide {{ setSidebarActive(['admin.approve.member.*']) }}">
                        <a href="{{ route('admin.approve.member.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.approve.member.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-check-square'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Anggota Baru') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['setor tabungan approve']))
                    <li class="slide {{ setSidebarActive(['admin.product.*']) }}">
                        <a href="{{ route('admin.product.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.product.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-check-square'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Setor Tabungan') }}</span>
                        </a>
                    </li>
                @endif
                @if (canAccess(['pinjaman reguler approve', 'pinjaman pendanaan approve', 'pinjaman sosial approve']))
                    <li
                        class="slide has-sub {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }} {{ setSidebarOpen(['admin.admin.*', 'admin.member.*']) }}">
                        <a href="javascript:void(0);"
                            class="side-menu__item {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <span class=" side-menu__icon">
                                <i class='bx bx-check-square'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Pinjaman') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1 {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Pinjaman') }}</a>
                            </li>
                            @if (canAccess(['pinjaman reguler approve']))
                                <li class="slide {{ setSidebarActive(['admin.admin.*']) }}">
                                    <a href="{{ route('admin.admin.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.admin.*']) }}">
                                        {{ __('Reguler') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['pinjaman pendanaan approve']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Pendanaan') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['pinjaman sosial approve']))
                                <li class="slide {{ setSidebarActive(['admin.member.*']) }}">
                                    <a href="{{ route('admin.member.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.member.*']) }}">
                                        {{ __('Sosial') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- End::slide -->
                {{-- ======================================================================================================= --}}
                {{-- APPROVE DATA - END --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- POSTING DATA - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess(['posting']))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Posting Data') }}</span>
                    </li>
                @endif
                <!-- End::slide__category -->
                {{-- ======================================================================================================= --}}
                {{-- POSTING DATA - END --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- LAPORAN - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess(['laporan']))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Laporan') }}</span>
                    </li>
                @endif
                <!-- End::slide__category -->
                {{-- ======================================================================================================= --}}
                {{-- LAPORAN - END --}}
                {{-- ======================================================================================================= --}}


                {{-- ======================================================================================================= --}}
                {{-- PENGATURAN - BEGIN --}}
                {{-- ======================================================================================================= --}}
                <!-- Start::slide__category -->
                @if (canAccess(['role index', 'permission index', 'setting system']))
                    <li class="mt-4 slide__category"><span class="category-name">{{ __('Pengaturan') }}</span>
                    </li>
                @endif
                <!-- End::slide__category -->

                <!-- Start::slide -->
                @if (canAccess(['role index', 'permission index']))
                    <li
                        class="slide has-sub {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }} {{ setSidebarOpen(['admin.permission.*', 'admin.role.*']) }}">
                        <a href="javascript:void(0);"
                            class="side-menu__item {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }}">
                            <span class=" side-menu__icon">
                                <i class='bx bxs-lock-open-alt'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Roles & Permissions') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul
                            class="slide-menu child1 {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }}">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Roles & Permissions') }}</a>
                            </li>
                            @if (canAccess(['role index']))
                                <li class="slide {{ setSidebarActive(['admin.role.*']) }}">
                                    <a href="{{ route('admin.role.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.role.*']) }}">
                                        {{ __('Roles') }}
                                    </a>
                                </li>
                            @endif
                            @if (canAccess(['permission index']))
                                <li class="slide {{ setSidebarActive(['admin.permission.*']) }}">
                                    <a href="{{ route('admin.permission.index') }}"
                                        class="side-menu__item {{ setSidebarActive(['admin.permission.*']) }}">
                                        {{ __('Permissions') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (canAccess(['periode index', 'setting system']))
                    <li class="slide {{ setSidebarActive(['admin.setting.*']) }}">
                        <a href="{{ route('admin.setting.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.setting.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-calendar'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Periode') }}</span>
                        </a>
                    </li>
                    <li class="slide {{ setSidebarActive(['admin.setting.*']) }}">
                        <a href="{{ route('admin.setting.index') }}"
                            class="side-menu__item {{ setSidebarActive(['admin.setting.*']) }}">
                            <span class="side-menu__icon">
                                <i class='bx bx-cog'></i>
                            </span>
                            <span class="side-menu__label">{{ __('Pengaturan Sistem') }}</span>
                        </a>
                    </li>
                @endif
                <!-- End::slide -->
                {{-- ======================================================================================================= --}}
                {{-- PENGATURAN - END --}}
                {{-- ======================================================================================================= --}}
        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                </path>
            </svg></div>
    </nav>
    <!-- End::nav -->

</div>
<!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->

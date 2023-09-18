@extends('layouts.admin.master')

@section('page_title')
    {{ __('Approve Anggota Koperasi Baru') }}
@endsection

@section('section_header_title')
    {{ __('Approve Anggota Koperasi Baru') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Anggota Koperasi Baru Belum Approve') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Anggota Koperasi Baru Belum Approve') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data anggota koperasi baru belum approve') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="p-0 card-body">
                    <nav class="bg-white navbar navbar-expand-xxl">
                        <div class="container-fluid">
                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar-collapse navbar-justified collapse" id="navbarSupportedContent"
                                style="">
                                <ul class="mb-2 navbar-nav me-auto mb-lg-0 align-items-xxl-center">
                                    <li class="mb-2 nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Departemen') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                @if ($departments->count() == 0)
                                                    <li>
                                                        <a class="dropdown-item">{{ __('Tidak ada data') }}</a>
                                                    </li>
                                                @else
                                                    @foreach ($departments as $department)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('/admin/member/approve/?department=' . $department->slug) }}">{{ $department->name ?? '' }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2 nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Bagian') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                @if ($sections->count() == 0)
                                                    <li>
                                                        <a class="dropdown-item">{{ __('Tidak ada data') }}</a>
                                                    </li>
                                                @else
                                                    @foreach ($sections as $section)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('/admin/member/approve/?section=' . $section->slug) }}">{{ $section->name ?? '' }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2 nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Jenis Karyawan') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?employee_group=Bulanan') }}">{{ __('Bulanan') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?employee_group=Harian') }}">{{ __('Harian') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2 nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Approve') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?approve=0') }}">{{ __('Belum Approve') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?approve=1') }}">{{ __('Sudah Approve') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?approve=2') }}">{{ __('Ditolak') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mb-2 nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Verify Email') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?verify=1') }}">{{ __('Sudah Verify Email') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?verify=0') }}">{{ __('Belum Verify Email') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item mb-xxl-0 ms-xxl-0 ms-3">
                                        <div class="btn-group d-xxl-flex d-block">
                                            <button class="btn btn-sm btn-primary-light dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('Status') }}
                                            </button>
                                            <div class="m-2">&nbsp;</div>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?status=1') }}">{{ __('Aktif') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('/admin/member/approve/?status=0') }}">{{ __('Tidak Aktif') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <form action="{{ route('admin.approve.member.index') }}" method="GET" id="form-search">
                                    <div class="mt-2 mb-2 input-group">
                                        <input type="text" class="form-control bg-light"
                                            placeholder="{{ __('Cari Data ...') }}" value="{{ old('search') }}"
                                            name="search">
                                    </div>
                                </form>
                                <a href="{{ route('admin.approve.member.index') }}"
                                    class="mt-2 mb-2 btn btn-secondary ms-2">
                                    {{ __('Refresh') }}
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if ($members->count() == 0)
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card product-card bg-danger">
                    <div class="card-body">
                        <h3 class="mt-2 text-center">
                            {{ __('Tidak ada data') }}
                        </h3>
                    </div>
                </div>
            </div>
        @else
            @foreach ($members as $member)
                <div class="col-xxl-2 col-xl-3 col-lg-3 col-sm-6">
                    <div class="text-center card custom-card">
                        <div class="card-body contact-action">
                            <div class="contact-overlay"></div>
                            <div class="align-items-top">
                                <div class="text-center">
                                    <div>
                                        <h6 class="mb-3 fw-semibold">
                                            {{ $member->name ?? '' }}
                                        </h6>
                                    </div>
                                    <img src="{{ !empty($member->image) ? url(config('common.path_storage') . $member->image) : url(config('common.path_template_admin') . config('common.image_square_200x200')) }}"
                                        class="mb-3 img-fluid rounded-pill preview-path_image_member" width="120"
                                        height="120">
                                    <div>
                                        <h6 class="mb-2 fw-semibold">
                                            <span
                                                class="badge bg-{{ $member->employee_group == 'Bulanan' ? 'success' : 'warning' }}">{{ $member->employee_group ?? '' }}</span>
                                            <span
                                                class="badge bg-primary">{{ formatDate($member->join_date) ?? '' }}</span>
                                        </h6>
                                        <p class="mb-2 fw-semibold fs-11 text-primary contact-mail text-truncate">
                                            {{ $member->email ?? '' }}
                                        </p>
                                        <p class="mb-2 text-muted contact-mail text-truncate">
                                            <span class="badge bg-primary">{{ $member->department->name ?? '' }}</span>
                                            <span class="badge bg-secondary">{{ $member->section->name ?? '' }}</span>
                                        </p>
                                        <p class="mb-0 fw-semibold fs-11">
                                            <span
                                                class="badge bg-{{ setApproveBadge($member->approved) }}">{{ setApproveText($member->approved) }}</span>
                                            <span
                                                class="badge bg-{{ setVerifyBadge(!empty($member->email_verified_at) ? 1 : 0) }}">{{ setVerifyText(!empty($member->email_verified_at) ? 1 : 0) }}</span>
                                        </p>
                                        <p class="mb-0 fw-semibold fs-11">
                                            <span
                                                class="badge bg-{{ setStatusBadge($member->status) }}">{{ setStatusText($member->status) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @can('anggota index')
                                    <a href="{{ route('admin.member.show', $member) }}"
                                        class="btn btn-sm btn-icon contact-hover-fave btn-primary btn-wave waves-effect waves-light"
                                        type="button" aria-expanded="false" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-original-title="Lihat">
                                        <i class="ri-eye-line fs-16 text-fixed-white"></i>
                                    </a>
                                @endcan
                            </div>
                            <div class="dropdown contact-hover-dropdown">
                                <button aria-label="button"
                                    class="btn btn-sm btn-icon btn-primary btn-wave waves-effect waves-light"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($member->approved == 0)
                                        @can('anggota approve')
                                            <li>
                                                <a class="dropdown-item border-bottom approve"
                                                    href="{{ route('admin.approve.member.post', $member) }}">
                                                    <i class="align-middle ri-checkbox-circle-line me-2 d-inline-block"></i>
                                                    {{ __('Menyetujui') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item border-bottom reject"
                                                    href="{{ route('admin.reject.member.post', $member) }}">
                                                    <i class="align-middle ri-close-circle-line me-2 d-inline-block"></i>
                                                    {{ __('Menolak') }}
                                                </a>
                                            </li>
                                        @endcan
                                    @else
                                        @if (empty($member->email_verified_at))
                                            <li>
                                                <a class="dropdown-item border-bottom" href="javascript:void(0);">
                                                    <i class="align-middle ri-mail-send-line me-2 d-inline-block"></i>
                                                    {{ __('Kirim Ulang Tautan Verifikasi') }}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    <li>
                                        <a class="dropdown-item border-bottom" href="javascript:void(0);">
                                            <i class="align-middle ri-chat-2-line me-2 d-inline-block"></i>
                                            {{ __('Kirim Pesan') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {!! $members->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection

<x-web-sweet-alert />

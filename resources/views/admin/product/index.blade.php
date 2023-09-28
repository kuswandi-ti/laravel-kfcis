@extends('layouts.admin.master')

@section('page_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Barang Penjualan') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Barang Penjualan') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data barang penjualan') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 d-flex mt-sm-0 align-items-center">
                        <div class="m-2 btn-group d-xxl-flex d-block">
                            <button
                                class="btn btn-sm btn-primary{{ request()->get('status') == null ? '-light' : '' }} dropdown-toggle"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    $status = request()->get('status');
                                @endphp
                                @if (isset($status))
                                    {{ $status == 0 ? __('Tidak Aktif') : __('Aktif') }}
                                @else
                                    {{ __('Status') }}
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ ($status !== null) & ($status == 1) ? 'active' : '' }}"
                                        href="/admin/product/?status=1">{{ __('Aktif') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ ($status !== null) & ($status == 0) ? 'active' : '' }}"
                                        href="/admin/product/?status=0">{{ __('Tidak Aktif') }}</a>
                                </li>
                            </ul>
                        </div>
                        <form action="{{ route('admin.product.index') }}" method="GET" id="form-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="{{ __('Cari Data ...') }}"
                                    value="{{ old('search') }}" name="search">
                            </div>
                        </form>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary ms-2">
                            {{ __('Refresh') }}
                        </a>
                        @can('barang penjualan create')
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary ms-2">
                                {{ __('Baru') }}
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
            <div class="row">
                @if ($products->count() == 0)
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
                    @foreach ($products as $product)
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card custom-card product-card">
                                <div class="card-body">
                                    <div class="mb-4 d-sm-flex align-items-center">
                                        <img src="{{ !empty($product->image) ? url(config('common.path_storage') . $product->image) : url(config('common.path_template_admin') . config('common.image_product')) }}"
                                            class="rounded img-fluid preview-path_image_company_logo_toggle" width="500"
                                            height="360">
                                    </div>
                                    <div class="d-sm-flex align-items-center">
                                        <div class="mt-2 mt-sm-0">
                                            <h6 class="mb-1 product-code fs-16 fw-semibold align-items-center text-danger">
                                                {{ truncateString($product->code ?? '', 35) }}
                                            </h6>
                                            <h6 class="mb-1 product-name fs-16 fw-semibold align-items-center">
                                                {{ truncateString($product->name ?? '', 25) }}
                                            </h6>
                                            <p class="mb-2 product-description fs-13 text-muted">
                                                {{ truncateString($product->specification ?? '', 35) }}
                                            </p>
                                            <h4 class="mb-2 fw-semibold">
                                                <span>
                                                    {{ formatAmount($product->price_sell) }}
                                                    <span class="text-muted ms-1 fs-14 op-6">
                                                        {{ formatAmount($product->price_hpp) }}
                                                    </span>
                                                </span>
                                            </h4>
                                            <p class="mb-0 badge bg-warning-transparent fs-11 rounded-1">
                                                {{ formatAmount($product->margin) }}</p>
                                            <p class="mb-0 badge bg-secondary-transparent fs-11 rounded-1">
                                                @php
                                                    $persen_margin = ($product->margin / $product->price_sell) * 100;
                                                @endphp
                                                {{ formatPercent($persen_margin ?? 0) }}%
                                            </p>
                                            <span
                                                class="badge bg-{{ setStatusBadge($product->status) }}">{{ setStatusText($product->status) }}</span>
                                            <div class="mt-4">
                                                @can('barang penjualan update')
                                                    <a href="{{ route('admin.product.edit', $product) }}"
                                                        class="btn btn-sm btn-info-light me-1" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Perbarui') }}">
                                                        <i class="bx bx-edit-alt fs-20"></i>
                                                    </a>
                                                @endcan
                                                @if ($product->status == 1)
                                                    @can('barang penjualan delete')
                                                        <a href="{{ route('admin.product.destroy', $product) }}"
                                                            class="btn btn-sm btn-danger-light me-1 delete_item"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            data-bs-original-title="{{ __('Hapus') }}">
                                                            <i class="bx bx-trash fs-20"></i>
                                                        </a>
                                                    @endcan
                                                @else
                                                    @can('barang penjualan restore')
                                                        <a href="{{ route('admin.product.restore', $product) }}"
                                                            class="btn btn-sm btn-warning-light me-1" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom"
                                                            data-bs-original-title="{{ __('Pulihkan') }}">
                                                            <i class="bx bx-sync fs-20"></i>
                                                        </a>
                                                    @endcan
                                                @endif

                                                @can('barang penjualan index')
                                                    <a href="{{ route('admin.product.show', $product) }}"
                                                        class="btn btn-sm btn-success-light" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        data-bs-original-title="{{ __('Lihat') }}">
                                                        <i class="bx bx-show fs-20"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection

<x-web-sweet-alert />

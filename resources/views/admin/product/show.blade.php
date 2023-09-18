@extends('layouts.admin.master')

@section('page_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.product.index') }}" class="text-white-50">
            {{ __('Barang Penjualan') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Rincian Data Barang Penjualan') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-xxl-4 col-xl-12">
                            <div class="row">
                                <div class="mb-3 col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-md-5">
                                    <div class="">
                                        <img src="{{ !empty($product->image) ? url(config('common.path_storage') . $product->image) : url(config('common.path_template_admin') . config('common.image_product')) }}"
                                            class="rounded img-fluid preview-path_image_barang" width="500"
                                            height="360">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-12 ">
                            <div class="p-3 border row product-scroll rounded-3">
                                <div class="mt-3 col-xl-7 mt-xxl-0">
                                    <div>
                                        <p class="mb-0 fs-18 fw-semibold text-danger">
                                            {{ $product->code ?? '' }}
                                        </p>
                                        <p class="mb-0 fs-18 fw-semibold">
                                            {{ $product->name ?? '' }}
                                        </p>
                                        <div class="mt-4 mb-4">
                                            <p class="mb-1 fs-15 fw-semibold">{{ __('Spesifikasi') }}</p>
                                            <p class="mb-0 text-muted">
                                                {{ $product->specification ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-xl-5 mt-xxl-0">
                                    <div class="p-3 mb-3 border rounded-3">
                                        <p class="mb-4 fs-16 fw-semibold">{{ __('Harga :') }}</p>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-5">
                                                        <span class="fs-14 fw-semibold">{{ __('Harga HPP') }}</span>
                                                    </div>
                                                    <div class="col-xl-7">
                                                        <p class="text-muted fs-14">
                                                            {{ formatAmount($product->price_hpp ?? 0) }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-5">
                                                        <span class="fs-14 fw-semibold">{{ __('Harga Jual') }}</span>
                                                    </div>
                                                    <div class="col-xl-7">
                                                        <p class="text-muted fs-14">
                                                            {{ formatAmount($product->price_sell ?? 0) }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-5">
                                                        <span class="fs-14 fw-semibold">{{ __('Margin') }}</span>
                                                    </div>
                                                    <div class="col-xl-7">
                                                        <p class="text-muted fs-14">
                                                            {{ formatAmount($product->margin ?? 0) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

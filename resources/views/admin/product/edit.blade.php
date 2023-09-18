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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Barang Penjualan') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.product.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Barang Penjualan') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses pembaruan data barang penjualan') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="code" class="form-label text-default">{{ __('Kode Barang') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    name="code" value="{{ old('code') ?? ($product->code ?? '') }}"
                                    placeholder="{{ __('Kode Barang') }}" required autofocus>
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Nama Barang') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? ($product->name ?? '') }}"
                                    placeholder="{{ __('Nama Barang') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xl-8">
                                <div class="mb-4 row gy-4">
                                    <div class="col-xl-12">
                                        <label for="specification"
                                            class="form-label text-default">{{ __('Spesifikasi Barang') }}
                                            <x-all-not-null /></label>
                                        <textarea class="form-control @error('specification') is-invalid @enderror" name="specification" id="specification"
                                            rows="8" placeholder="{{ __('Spesifikasi Barang') }}" required>{{ old('specification') ?? ($product->specification ?? '') }}</textarea>
                                        @error('specification')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row gy-4">
                                    <div class="col-xl-12">
                                        <label for="price_hpp" class="form-label text-default">{{ __('Harga HPP') }}
                                            <x-all-not-null /></label>
                                        <input type="number" class="form-control @error('price_hpp') is-invalid @enderror"
                                            name="price_hpp" id="price_hpp"
                                            value="{{ old('price_hpp') ?? ($product->price_hpp ?? 0) }}"
                                            placeholder="{{ __('Harga HPP') }}" required>
                                        @error('price_hpp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row gy-4">
                                    <div class="col-xl-12">
                                        <label for="price_sell" class="form-label text-default">{{ __('Harga Jual') }}
                                            <x-all-not-null /></label>
                                        <input type="number" class="form-control @error('price_sell') is-invalid @enderror"
                                            name="price_sell" id="price_sell"
                                            value="{{ old('price_sell') ?? ($product->price_sell ?? 0) }}"
                                            placeholder="{{ __('Harga Jual') }}" required>
                                        @error('price_sell')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-xl-12">
                                        <label for="margin" class="form-label text-default">{{ __('Margin') }}</label>
                                        <input type="text" class="form-control @error('margin') is-invalid @enderror"
                                            name="margin" id="margin"
                                            value="{{ old('margin') ?? ($product->margin ?? 0) }}"
                                            placeholder="{{ __('Margin') }}" readonly>
                                        @error('margin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="border shadow-none card custom-card border-dashed-primary">
                                    <div class="p-3 text-center card-body">
                                        <a href="javascript:void(0);">
                                            <div class="justify-content-between">
                                                <div class="mb-2 file-format-icon">
                                                    <div class="text-center">
                                                        <img src="{{ !empty($product->image) ? url(config('common.path_storage') . $product->image) : url(config('common.path_template_admin') . config('common.image_product')) }}"
                                                            class="rounded img-fluid preview-path_image_barang"
                                                            width="500" height="360">
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="fw-semibold">
                                                        {{ __('Gambar Barang') }}
                                                    </span>
                                                    <span class="fs-10 d-block text-muted">
                                                        (500 x 360)
                                                    </span>
                                                    <div class="mt-3">
                                                        <input class="form-control" type="file" name="image_barang"
                                                            onchange="preview('.preview-path_image_barang', this.files[0])">
                                                        <input type="hidden" name="old_image_barang"
                                                            value="{{ $product->image ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#price_hpp, #price_sell").keyup(function() {
                var price_hpp = $("#price_hpp").val();
                var price_sell = $("#price_sell").val();

                var margin = parseInt(price_sell) - parseInt(price_hpp);
                $("#margin").val(margin);

                if ($('#margin').val() === 'NaN') {
                    $('#margin').val(0);
                };
            });
        });
    </script>
@endpush

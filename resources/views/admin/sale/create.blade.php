@extends('layouts.admin.master')

@section('page_title')
    {{ __('Penjualan') }}
@endsection

@section('section_header_title')
    {{ __('Penjualan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.sale.index') }}" class="text-white-50">
            {{ __('Penjualan') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Menambah Data Penjualan') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="chk_member" type="radio" value="member"
                                            checked="">
                                        <label class="form-check-label" for="rdo_anggota">{{ __('Anggota') }}</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="chk_member" type="radio" value="nonmember">
                                        <label class="form-check-label" for="rdo_nonanggota">{{ __('Non Anggota') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('payment_type') is-invalid @enderror"
                                name="payment_type" id="payment_type" required>
                                <option value="Credit" {{ old('payment_type') == 'Credit' ? 'selected' : '' }}>
                                    {{ __('Kredit') }}
                                </option>
                                <option value="Cash" {{ old('payment_type') == 'Cash' ? 'selected' : '' }}>
                                    {{ __('Cash') }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-2 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('member') is-invalid @enderror"
                                name="member" id="member" required>
                                @foreach ($members as $key => $value)
                                    <option value="{{ $key }}" {{ old('member') == $key ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('payment_month') is-invalid @enderror"
                                name="payment_month" id="payment_month" required>
                                @for ($i = 0; $i <= 11; $i++)
                                    <option value="{{ $i + 1 }}"
                                        {{ old('payment_month') == $i + 1 ? 'selected' : '' }}>
                                        {{ formatMonth($i + 1) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-2 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <input type="text" class="form-control bg-light" name="nonmember" id="nonmember"
                                placeholder="{{ __('Nama non anggota...') }}">
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <input type="text" class="form-control bg-light number-only" name="payment_year"
                                id="payment_year" placeholder="{{ __('Tahun dibayar') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-4 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <form action="{{ route('admin.sale.create') }}" method="GET" id="form-search">
                                <div class="input-group">
                                    @php
                                        $search = request()->get('search');
                                    @endphp
                                    <input type="text" class="form-control bg-light" name="search"
                                        placeholder="{{ __('Cari data barang...') }}"
                                        value="{{ isset($search) ? $search : '' }}">
                                    <a href="{{ route('admin.sale.create') }}" class="btn btn-primary"
                                        type="button">{{ __('Refresh') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <div class="border card border-primary custom-card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <span class="avatar avatar-xxl avatar-rounded">
                                                    <img src="{{ !empty($product->image) ? url(config('common.path_storage') . $product->image) : url(config('common.path_template_admin') . config('common.image_product')) }}"
                                                        alt="">
                                                </span>
                                                <div class="mt-2 text-center">
                                                    <h6
                                                        class="mb-1 product-code fs-16 fw-semibold align-items-center text-danger">
                                                        {{ $product->code ?? '' }}
                                                    </h6>
                                                    <h6 class="mb-1 product-name fs-16 fw-semibold align-items-center">
                                                        {{ truncateString($product->name ?? '', 20) }}
                                                    </h6>
                                                    <p class="mb-2 product-description fs-13 text-muted">
                                                        {{ truncateString($product->specification ?? '', 25) }}
                                                    </p>
                                                    <h6 class="text-success fw-semibold">
                                                        <span>
                                                            {{ formatAmount($product->price_sell) ?? 0 }}
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center card-footer">
                                            <div class="btn-list">
                                                <button type="button"
                                                    class="btn btn-sm btn-primary btn-wave waves-effect waves-light btn_add"
                                                    data-id="{{ $product->id ?? 0 }}"
                                                    data-name="{{ $product->name ?? '' }}"
                                                    data-price_sell="{{ $product->price_sell ?? 0 }}">
                                                    <i class='bx bx-cart-add fs-16'></i>
                                                    {{ __('Tambahkan') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="text-center">
                                    <div class="alert alert-solid-danger alert-dismissible fade show">
                                        {{ __('Tidak ada data') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">{{ __('Keranjang Belanja') }}</div>
                </div>
                <div class="p-3 card-body">
                    <div class="accordion cart">
                        {{-- <div class="text-center">
                            <div class="alert alert-solid-danger alert-dismissible fade show empty_cart">
                                {{ __('Keranjang masih kosong') }}
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="border-bottom border-block-end-dashed">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-muted ">Sub Total</div>
                            <div class="fw-semibold fs-14">$1,299</div>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-muted ">Discount</div>
                            <div class="fw-semibold fs-14 text-success">10% - $129</div>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-muted ">Delivery Charges</div>
                            <div class="fw-semibold fs-14 text-danger">- $49</div>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div class="text-muted ">Service Tax (18%)</div>
                            <div class="fw-semibold fs-14">- $169</div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="fw-semibold fs-18 ">Total :</div>
                            <div class="fw-semibold fs-18"> $1,387</div>
                        </div>
                    </div>
                    <div class="p-2 text-center border-top"></div>
                    <div class="text-center border-top">
                        <a href="checkout.html" class="btn btn-primary d-block">
                            {{ __('Proses') }}
                        </a>
                        <div class="mt-3 flex-container">
                            <div class="d-flex">
                                <a href="checkout.html" class="p-2 me-2 flex-fill btn btn-warning d-block">
                                    {{ __('Draft') }}
                                </a>
                                <a href="checkout.html" class="p-2 ms-2 me-2 flex-fill btn btn-danger d-block">
                                    {{ __('Batal') }}
                                </a>
                                <a href="checkout.html" class="p-2 ms-2 flex-fill btn btn-info d-block">
                                    {{ __('Cetak') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        var value = 1,
            minValue = 1,
            maxValue = 1000000;
        let productMinusBtn = document.querySelectorAll(".product-quantity-minus")
        let productPlusBtn = document.querySelectorAll(".product-quantity-plus")
        productMinusBtn.forEach((element) => {
            element.onclick = () => {
                if (value > minValue) {
                    value = value - 1;
                    element.parentElement.childNodes[3].value = value;
                }
            }
        })
        productPlusBtn.forEach((element) => {
            element.onclick = () => {
                if (value < maxValue) {
                    value = value + 1;
                    element.parentElement.childNodes[3].value = value;
                }
            }
        })

        $(document).ready(function() {
            $("#nonmember").prop('disabled', true);
        })

        $('input[type=radio][name=chk_member]').on('change', function() {
            switch ($(this).val()) {
                case 'member':
                    $("#member").prop('disabled', false);
                    $("#nonmember").prop('disabled', true);
                    $("#member").focus()
                    break;
                case 'nonmember':
                    $("#member").prop('disabled', true);
                    $("#nonmember").prop('disabled', false);
                    $("#nonmember").focus()
                    break;
            }
        });

        $('#payment_type').change(function() {
            var value = $(this).val();
            if (value == 'Cash') {
                $("#payment_month").prop('disabled', true);
                $("#payment_year").prop('disabled', true);
            } else {
                $("#payment_month").prop('disabled', false);
                $("#payment_year").prop('disabled', false);
                $("#payment_year").focus()
            }
        });

        $(document).on('click', '.btn_remove', function() {
            var id = $(this).attr("id");
            $('#item_' + id).remove();
            // TODO : ajax ke cart
        });

        $(document).on('click', '.btn_add', function() {
            var product_id = $(this).attr("data-id");
            var product_name = $(this).attr("data-name");
            var product_price_sell = $(this).attr("data-price_sell");
            $(".empty_cart").remove();
            // TODO : ajax ke cart
            $('.cart').append(
                `
                    <div class="accordion-item" id="item_${product_id}">
                        <h2 class="accordion-header" id="heading_${product_id}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse_${product_id}" aria-expanded="false"
                                aria-controls="collapse_${product_id}">
                                ${product_name}
                                &nbsp;
                                <span class="badge float-end bg-success fs-12">10</span>
                                &nbsp;
                                <a class="btn btn-icon btn-sm btn-secondary-transparent rounded-pill btn-wave waves-effect waves-light btn_remove" name="remove_cart" id="${product_id}">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </button>
                        </h2>
                        <div id="collapse_${product_id}" class="accordion-collapse collapse" aria-labelledby="heading_${product_id}">
                            <div class="accordion-body">
                                <div class="accordion-body p-0">
                                    <div class="row">
                                        <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="border input-group rounded-1 flex-nowrap">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-start-0 border-top-0 border-bottom-0 border-end product-quantity-minus"><i
                                                        class="ri-subtract-line"></i></button>
                                                <input type="text"
                                                    class="text-center border-0 form-control form-control-sm w-100"
                                                    aria-label="quantity" id="product-quantity" value="1">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-end-0 border-top-0 border-bottom-0 border-start product-quantity-plus"><i
                                                        class="ri-add-line"></i></button>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text text-muted" id="basic-addon2">
                                                    <small>{{ __('Harga') }}</small>
                                                </span>
                                                <input type="text"
                                                    class="form-control number-only default-number @error('price_sell') is-invalid @enderror"
                                                    name="price_sell" id="price_sell"
                                                    value="{{ old('price_sell') ?? '' }}"
                                                    placeholder="{{ __('Harga') }}" aria-describedby="basic-addon2"
                                                    readonly>
                                                <span class="input-group-text text-danger">
                                                    <i class='bx bx-x-circle'></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text text-muted" id="basic-addon2">
                                                    <small>{{ __('Diskon') }}</small>
                                                </span>
                                                <input type="text"
                                                    class="form-control number-only default-number @error('disc') is-invalid @enderror"
                                                    name="disc" id="disc"
                                                    value="{{ old('disc') ?? '' }}"
                                                    placeholder="{{ __('Diskon') }}" aria-describedby="basic-addon2"
                                                    required>
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text text-muted">
                                                    <small>{{ __('Total') }}</small>
                                                </span>
                                                <input type="text"
                                                    class="form-control number-only default-number @error('total') is-invalid @enderror"
                                                    name="total" id="total"
                                                    value="{{ old('total') ?? '' }}"
                                                    placeholder="{{ __('Total') }}" aria-describedby="basic-addon2"
                                                    readonly>
                                                <span class="input-group-text text-danger">
                                                    <i class='bx bx-x-circle'></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <textarea class="form-control" rows="3" name="note" placeholder="{{ __('Keterangan') }}">{{ old('note') ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            )
        });
    </script>
@endpush

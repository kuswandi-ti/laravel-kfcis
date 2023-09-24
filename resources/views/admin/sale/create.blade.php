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
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="mt-2 mb-2 row">
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-primary"
                                    checked="">
                                <label class="form-check-label" for="switch-primary">Primary</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-primary"
                                    checked="">
                                <label class="form-check-label" for="switch-primary">Primary</label>
                            </div>
                        </div>
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="Search Contact"
                                    aria-describedby="search-contact-member">
                                <button aria-label="button" class="btn btn-primary" type="button"
                                    id="search-contact-member"><i class="ri-search-line"></i></button>
                            </div>
                        </div>
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="Search Contact"
                                    aria-describedby="search-contact-member">
                                <button aria-label="button" class="btn btn-primary" type="button"
                                    id="search-contact-member"><i class="ri-search-line"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <select
                                class="js-example-placeholder-single js-states form-control select2 @error('employee_group') is-invalid @enderror"
                                name="employee_group" id="employee_group" required>
                                <option value="Bulanan" {{ old('employee_group') == 'Bulanan' ? 'selected' : '' }}>
                                    {{ __('Bulanan') }}
                                </option>
                                <option value="Harian" {{ old('employee_group') == 'Harian' ? 'selected' : '' }}>
                                    {{ __('Harian') }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="Search Contact"
                                    aria-describedby="search-contact-member">
                                <button aria-label="button" class="btn btn-primary" type="button"
                                    id="search-contact-member"><i class="ri-search-line"></i></button>
                            </div>
                        </div>
                        <div class="mb-2 col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="Search Contact"
                                    aria-describedby="search-contact-member">
                                <button aria-label="button" class="btn btn-primary" type="button"
                                    id="search-contact-member"><i class="ri-search-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light"
                                                    placeholder="Search Contact" aria-describedby="search-contact-member">
                                                <button aria-label="button" class="btn btn-primary" type="button"
                                                    id="search-contact-member"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="border card border-primary custom-card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="avatar avatar-xxl avatar-rounded">
                                            <img src="{{ url(config('common.path_template_admin') . config('common.image_product')) }}"
                                                alt="">
                                        </span>
                                        <div class="mt-2">
                                            <p class="fw-semibold">
                                                {{ truncateString('112900 BONANZA 1329 HB NO-R/T SET(12)', 25) }}
                                            </p>
                                            <span class="p-2 rounded fs-15 bg-primary-transparent">
                                                Rp. <strong>10.119</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center card-footer">
                                    <div class="btn-list">
                                        <button type="button"
                                            class="btn btn-sm btn-primary btn-wave waves-effect waves-light">{{ __('Tambahkan') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="card custom-card" id="cart-container-Deletee">
                        <div class="p-0 card-body">
                            <div class="p-4 d-sm-flex align-items-start">
                                <div class="flex-wrap d-flex align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-xxl bd-gray-200">
                                            <img src="{{ url(config('common.path_template_admin') . config('common.image_product')) }}"
                                                alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <div class="mb-1">
                                            <a href="javascript:void(0);" class="fs-15 fw-bold">
                                                {{ truncateString('112900 BONANZA 1329 HB NO-R/T SET(12)', 30) }}
                                            </a>
                                        </div>
                                        <div class="">
                                            <span class="badge bg-primary-transparent fw-semibold fs-11 rounded-2">
                                                Rp. 20.000
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto align-items-center">
                                    <div class="align-items-center">
                                        <div class="text-center product-quantity-container">
                                            <div class="mb-2 border input-group rounded-1 flex-nowrap">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-start-0 border-top-0 border-bottom-0 border-end product-quantity-minus">
                                                    <i class="ri-subtract-line"></i>
                                                </button>
                                                <input type="text"
                                                    class="text-center border-0 form-control form-control-sm w-100"
                                                    aria-label="quantity" id="product-quantity" value="1">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-end-0 border-top-0 border-bottom-0 border-start product-quantity-plus">
                                                    <i class="ri-add-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control number-only default-number @error('fee_loan_regular') is-invalid @enderror"
                                                    name="fee_loan_regular" id="fee_loan_regular"
                                                    value="{{ old('fee_loan_regular') ?? '' }}"
                                                    placeholder="{{ __('Diskon') }}" aria-describedby="basic-addon2"
                                                    required>
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <input type="text"
                                                class="form-control number-only @error('price_hpp') is-invalid @enderror"
                                                name="price_hpp" id="price_hpp" value="{{ old('price_hpp') ?? '' }}"
                                                placeholder="{{ __('Total') }}" required>
                                        </div>
                                        <div class="">
                                            <textarea class="form-control @error('specification') is-invalid @enderror" name="specification" id="specification"
                                                rows="3" placeholder="{{ __('Keterangan') }}" required>{{ old('specification') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 mb-2">
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger-light fw-semibold d-block">
                                    <i class="d-inline-flex fe fe-trash me-1"></i>
                                    {{ __('Hapus') }}
                                </a>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-4 d-sm-flex align-items-start">
                                <div class="flex-wrap d-flex align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-xxl bd-gray-200">
                                            <img src="{{ url(config('common.path_template_admin') . config('common.image_product')) }}"
                                                alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <div class="mb-1">
                                            <a href="javascript:void(0);" class="fs-15 fw-bold">Colored leaf with pot</a>
                                            <span class="badge bg-primary-transparent fw-semibold fs-11 rounded-2 ms-2">20%
                                                disscount</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="me-1">Size:</span><span
                                                class="fw-semibold text-muted">Medium</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="me-1">Color:</span><span class="fw-semibold text-muted">Orange
                                                Color</span>
                                        </div>
                                        <div class="mb-1 d-flex">
                                            <h5 class="mb-1">$8,329</h5>
                                            <p class="mt-1 mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-15">
                                                2,999</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto align-items-center">
                                    <div class="align-items-center">
                                        <div class="text-center product-quantity-container ">
                                            <div class="border input-group rounded-1 flex-nowrap">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-start-0 border-top-0 border-bottom-0 border-end product-quantity-minus"><i
                                                        class="ri-subtract-line"></i></button>
                                                <input type="text"
                                                    class="text-center border-0 form-control form-control-sm w-100"
                                                    aria-label="quantity" id="product-quantity1" value="2">
                                                <button aria-label="button" type="button"
                                                    class="bg-transparent btn btn-sm input-group-text flex-fill border-end-0 border-top-0 border-bottom-0 border-start product-quantity-plus"><i
                                                        class="ri-add-line"></i></button>
                                            </div>
                                        </div>
                                        <div class="">
                                            <a href="javascript:void(0);"
                                                class="mt-2 btn btn-sm btn-danger-light fw-semibold me-1"><i
                                                    class="d-inline-flex fe fe-trash me-1"></i>Delete</a>
                                            <a href="javascript:void(0);"
                                                class="mt-2 btn btn-sm btn-info-light fw-semibold"><i
                                                    class="d-inline-flex fe fe-heart me-1"></i>Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="card custom-card">
                        <div class="p-3 card-body">
                            <div class="accordion" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Accordion Item #1
                                            &nbsp;
                                            <span class="badge float-end bg-secondary">243</span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" style="">
                                        <div class="accordion-body">
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
                                                            class="form-control number-only default-number @error('fee_loan_funding') is-invalid @enderror"
                                                            name="fee_loan_funding" id="fee_loan_funding"
                                                            value="{{ old('fee_loan_funding') ?? '' }}"
                                                            placeholder="{{ __('Harga') }}"
                                                            aria-describedby="basic-addon2">
                                                    </div>
                                                </div>
                                                <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text text-muted" id="basic-addon2">
                                                            <small>{{ __('Diskon') }}</small>
                                                        </span>
                                                        <input type="text"
                                                            class="form-control number-only default-number @error('fee_loan_funding') is-invalid @enderror"
                                                            name="fee_loan_funding" id="fee_loan_funding"
                                                            value="{{ old('fee_loan_funding') ?? '' }}"
                                                            placeholder="{{ __('Diskon') }}"
                                                            aria-describedby="basic-addon2" required>
                                                        <span class="input-group-text" id="basic-addon2">%</span>
                                                    </div>
                                                </div>
                                                <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text text-muted" id="basic-addon2">
                                                            <small>{{ __('Total') }}</small>
                                                        </span>
                                                        <input type="text"
                                                            class="form-control number-only default-number @error('fee_loan_funding') is-invalid @enderror"
                                                            name="fee_loan_funding" id="fee_loan_funding"
                                                            value="{{ old('fee_loan_funding') ?? '' }}"
                                                            placeholder="{{ __('Total') }}"
                                                            aria-describedby="basic-addon2" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <textarea class="form-control" rows="3" name="address" placeholder="{{ __('Keterangan') }}">{{ old('address') ?? '' }}</textarea>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <a href="javascript:void(0);"
                                                        class="mt-2 btn btn-sm btn-danger-light fw-semibold me-1 d-block"><i
                                                            class="d-inline-flex fe fe-trash me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <div class="p-0 card-body">
                            <div class="p-4 border-bottom border-block-end-dashed">
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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-muted ">Service Tax (18%)</div>
                                    <div class="fw-semibold fs-14">- $169</div>
                                </div>
                            </div>
                            <div class="px-4 py-3 ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold fs-18 ">Total :</div>
                                    <div class="fw-semibold fs-18"> $1,387</div>
                                </div>

                            </div>
                            <div class="p-3 text-center border-top">
                                <a href="checkout.html" class="m-1 btn btn-primary">Proceed To Checkout</a>
                                <a href="products.html" class="m-1 btn btn-light ">Countinue Shopping</a>
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
    </script>
@endpush

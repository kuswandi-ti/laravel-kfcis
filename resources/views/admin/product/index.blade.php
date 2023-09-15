@extends('layouts.admin.master')

@section('page_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_title')
    {{ __('Barang Penjualan') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Barang Penjualan') }}</li>
@endsection

@section('page_content')
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Bagian') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data bagian') }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-sm-0 mt-2 align-items-center">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light" placeholder="{{ __('Cari Data ...') }}"
                                aria-describedby="search-contact-member">
                            <button aria-label="button" class="btn btn-warning" type="button" id="search-contact-member"><i
                                    class="ri-search-line"></i></button>
                        </div>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary ms-2">
                            {{ __('Baru') }}
                        </a>
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
                                <h3 class="text-center mt-2">
                                    {{ __('Tidak ada data') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="card custom-card product-card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center mb-4">
                                        <img src="{{ !empty($product->image) ? url(config('common.path_storage') . $product->image) : url(config('common.path_template_admin') . config('common.image_product')) }}"
                                            class="img-fluid rounded preview-path_image_company_logo_toggle" width="500"
                                            height="360">
                                    </div>
                                    <div class="d-sm-flex align-items-center">
                                        <div class="mt-2 mt-sm-0">
                                            <h5 class="product-name fs-16 fw-semibold mb-1 align-items-center">
                                                {{ truncateString('RL Classic Color Pencil 36 Long Tin Case (Creative Design) (FSC) (AU)', 57) }}
                                            </h5>
                                            <p class="product-description fs-13 text-muted mb-2">
                                                {{ truncateString(
                                                    '476, 487, 430, 404, 407, 414, 416, 421, 419, 434, 443, 447, 448, 452, 459, 466, 496,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        499',
                                                    80,
                                                ) }}
                                            </p>
                                            <h4 class="mb-2 fw-semibold">
                                                <span>
                                                    26.000
                                                    <span class="text-muted ms-1  fs-14 op-6">
                                                        20.000
                                                    </span>
                                                </span>
                                            </h4>
                                            <p class="badge bg-secondary-transparent fs-11 rounded-1 mb-0">72%</p>
                                            <span class="text-muted">(212 Penjualan)</span>
                                            <p class="fs-11 text-success fw-semibold mb-0 align-items-center mt-1">
                                                Active / Inactive
                                            </p>
                                            <div class="mt-2 text-center">
                                                <a href="wishlist.html" class="btn btn-sm btn-info-light me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    data-bs-original-title="{{ __('Ubah') }}">
                                                    <i class="bx bx-edit-alt fs-20"></i>
                                                </a>
                                                <a href="cart.html" class="btn btn-sm btn-danger-light me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    data-bs-original-title="{{ __('Hapus') }}">
                                                    <i class="bx bx-trash fs-20"></i>
                                                </a>
                                                <a href="cart.html" class="btn btn-sm btn-warning-light me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    data-bs-original-title="{{ __('Pulihkan') }}">
                                                    <i class="bx bx-sync fs-20"></i>
                                                </a>
                                                <a href="product-details.html" class="btn btn-sm btn-success-light"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    data-bs-original-title="{{ __('Lihat') }}">
                                                    <i class="bx bx-show fs-20"></i>
                                                </a>
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
    <!--End::row-1 -->

    <!-- Start: pagination -->
    <div class="float-end mb-4">
        <nav aria-label="Page navigation" class="pagination-style-4">
            <ul class="pagination mb-0 gap-2">
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0);">
                        Prev
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">16</a></li>
                <li class="page-item d-none d-sm-flex"><a class="page-link" href="javascript:void(0);">17</a></li>
                <li class="page-item">
                    <a class="page-link text-primary" href="javascript:void(0);">
                        Next
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End: pagination -->
@endsection

<x-web-sweet-alert />

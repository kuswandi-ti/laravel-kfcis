@extends('layouts.admin.master')

@section('page_title')
    {{ __('Dashboard') }}
@endsection

@section('section_header_title')
    {{ __('Dashboard') }}
@endsection

@section('section_header_breadcrumb')
    @parent
@endsection

@section('page_content')
    <x-web-alert-message />

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
@endsection

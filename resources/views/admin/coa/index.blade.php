@extends('layouts.admin.master')

@section('page_title')
    {{ __('Chart of Account') }}
@endsection

@section('section_header_title')
    {{ __('Chart of Account') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">{{ __('Daftar Data Chart of Account') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                    <div class="flex-fill">
                        <div class="card-title">
                            {{ __('Daftar Data Chart of Account') }}
                            <p class="subtitle text-muted fs-12 fw-normal">
                                {{ __('Menampilkan semua data chart of account') }}
                            </p>
                        </div>
                    </div>
                    @can('coa create')
                        <div class="d-flex" role="search">
                            <a href="{{ route('admin.coa.create') }}" class="btn btn-primary">
                                {{ __('Baru') }}
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3">{{ __('Akun') }}</th>
                                            <th scope="col">{{ __('Saldo Awal') }}</th>
                                            <th scope="col">{{ __('Aksi') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parent_coa as $coa)
                                            <thead>
                                                <tr>
                                                    <th scope="row" colspan="3">
                                                        <span class="text-danger">{{ $coa->code }} -
                                                            {{ $coa->name }}</span>
                                                    </th>
                                                    <th scope="row">
                                                        <span
                                                            class="text-danger">{{ formatAmount($coa->beginning_balance) }}</span>
                                                    </th>
                                                    <th>
                                                        @can('coa update')
                                                            <div class="gap-2 hstack fs-15">
                                                                <a href="{{ route('admin.coa.edit', $coa) }}"
                                                                    class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light rounded-pill"
                                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    data-bs-original-title="{{ __('Perbarui') }}">
                                                                    <i class="ri-edit-line"></i>
                                                                </a>
                                                            </div>
                                                        @endcan
                                                    </th>
                                                </tr>
                                            </thead>
                                            @if (count($coa->subcoa))
                                                @include('admin.coa.sub_coa', [
                                                    'subcoa' => $coa->subcoa,
                                                ])
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-web-sweet-alert />

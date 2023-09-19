@extends('layouts.admin.master')

@section('page_title')
    {{ __('Chart of Account') }}
@endsection

@section('section_header_title')
    {{ __('Chart of Account') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.coa.index') }}" class="text-white-50">
            {{ __('Chart of Account') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Chart of Account') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.coa.update', $coa) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Chart of Account') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses memperbarui data chart of account') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.coa.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="code" class="form-label text-default">{{ __('Kode Akun') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    name="code" value="{{ old('code') ?? ($coa->code ?? '') }}"
                                    placeholder="{{ __('Kode Akun') }}" required autofocus>
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Nama Akun') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? ($coa->name ?? '') }}"
                                    placeholder="{{ __('Nama Akun') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="parent" class="form-label text-default">{{ __('Akun Utama') }}
                                    <x-all-not-null /></label>
                                <select
                                    class="js-example-placeholder-single js-states form-control select2 @error('section') is-invalid @enderror"
                                    name="parent" id="parent" required>
                                    @foreach ($parent_coa as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ old('parent') == $parent->id ? 'selected' : ($parent->id == $coa->parent_id ? 'selected' : '') }}>
                                            {{ $parent->name }}
                                        </option>
                                        @if (count($parent->subcoa))
                                            @foreach ($parent->subcoa as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('parent') == $item->id ? 'selected' : ($item->id == $coa->parent_id ? 'selected' : '') }}>
                                                    -- {{ $item->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                @error('parent')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="beginning_balance" class="form-label text-default">{{ __('Saldo Awal') }}
                                    <x-all-not-null /></label>
                                <input type="text"
                                    class="form-control number-only @error('beginning_balance') is-invalid @enderror"
                                    name="beginning_balance" id="beginning_balance"
                                    value="{{ old('beginning_balance') ?? ($coa->beginning_balance ?? 0) }}"
                                    placeholder="{{ __('Saldo Awal') }}" required>
                                @error('beginning_balance')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#beginning_balance").keyup(function() {
                var beginning_balance = $("#beginning_balance").val();

                if (beginning_balance.length == 0) {
                    beginning_balance = 0;
                    $("#beginning_balance").val(0);
                }
            });
        });
    </script>
@endpush

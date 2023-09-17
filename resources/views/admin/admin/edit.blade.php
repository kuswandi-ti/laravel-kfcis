@extends('layouts.admin.master')

@section('page_title')
    {{ __('Pengurus Koperasi') }}
@endsection

@section('section_header_title')
    {{ __('Pengurus Koperasi') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('admin.department.index') }}" class="text-white-50">
            {{ __('Pengurus Koperasi') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Memperbarui Data Pengurus Koperasi') }}</li>
@endsection

@section('page_content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form method="POST" action="{{ route('admin.admin.update', $admin) }}">
                @csrf
                @method('PUT')

                <div class="card custom-card">
                    <div class="flex-wrap card-header d-flex align-items-center flex-xxl-nowrap">
                        <div class="flex-fill">
                            <div class="card-title">
                                {{ __('Memperbarui Data Pengurus Koperasi') }}
                                <p class="subtitle text-muted fs-12 fw-normal">
                                    {{ __('Silahkan input data untuk proses pembaruan data pengurus koperasi') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.admin.index') }}" class="btn btn-warning">
                                {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="nik" class="form-label text-default">{{ __('NIK Anggota') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                    value="{{ old('nik') ?? ($admin->nik ?? '') }}" placeholder="{{ __('NIK Anggota') }}"
                                    required autofocus>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Nama Anggota') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? ($admin->name ?? '') }}"
                                    placeholder="{{ __('Nama Anggota') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-12">
                                <label for="email"
                                    class="form-label text-default">{{ __('Email (Sebagai identikasi saat login)') }}
                                    <x-all-not-null /></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') ?? ($admin->email ?? '') }}"
                                    placeholder="{{ __('Email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-6">
                                <label for="name" class="form-label text-default">{{ __('Jenis Karyawan') }}
                                    <x-all-not-null /></label>
                                <select
                                    class="js-example-placeholder-single js-states form-control select2 @error('employee_group') is-invalid @enderror"
                                    name="employee_group" id="employee_group" required>
                                    <option value="Bulanan"
                                        {{ old('employee_group') == 'Bulanan' ? 'selected' : ($admin->employee_group == 'Bulanan' ? 'selected' : '') }}>
                                        {{ __('Bulanan') }}
                                    </option>
                                    <option value="Harian"
                                        {{ old('employee_group') == 'Harian' ? 'selected' : ($admin->employee_group == 'Harian' ? 'selected' : '') }}>
                                        {{ __('Harian') }}
                                    </option>
                                </select>
                                @error('employee_group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="join_date" class="form-label text-default">{{ __('Tanggal Bergabung ') }}
                                    ({{ $setting_system['default_date_format'] }})
                                    <x-all-not-null /></label>
                                <div class="input-group">
                                    <div class="input-group-text text-muted">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                    <input type="text"
                                        class="form-control flatpickr @error('join_date') is-invalid @enderror"
                                        name="join_date"
                                        value="{{ old('join_date') ?? (formatDate($admin->join_date) ?? '') }}"
                                        placeholder="{{ __('Tanggal Bergabung') }}" required>
                                    @error('join_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-6">
                                <label for="department" class="form-label text-default">{{ __('Departemen') }}
                                    <x-all-not-null /></label>
                                <select
                                    class="js-example-placeholder-single js-states form-control select2 @error('department') is-invalid @enderror"
                                    name="department" id="department" required>
                                    @foreach ($departments as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('department') == $key ? 'selected' : ($admin->department_id == $key ? 'selected' : '') }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="section" class="form-label text-default">{{ __('Bagian') }}
                                    <x-all-not-null /></label>
                                <select
                                    class="js-example-placeholder-single js-states form-control select2 @error('section') is-invalid @enderror"
                                    name="section" id="section" required>
                                    @foreach ($sections as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('section') == $key ? 'selected' : ($admin->section_id == $key ? 'selected' : '') }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-6">
                                <label for="account_number" class="form-label text-default">{{ __('Nomor Rekening') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror"
                                    name="account_number"
                                    value="{{ old('account_number') ?? ($admin->account_number ?? '') }}"
                                    placeholder="{{ __('Nomor Rekening') }}" required>
                                @error('account_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="account_name" class="form-label text-default">{{ __('Nama Rekening') }}
                                    <x-all-not-null /></label>
                                <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                    name="account_name" value="{{ old('account_name') ?? ($admin->account_name ?? '') }}"
                                    placeholder="{{ __('Nama Rekening') }}" required>
                                @error('account_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row gy-4">
                            <div class="col-xl-6">
                                <label for="role" class="form-label text-default">{{ __('Role') }}
                                    <x-all-not-null /></label>
                                <select
                                    class="js-example-placeholder-single js-states form-control select2 @error('role') is-invalid @enderror"
                                    name="role" id="role" required>
                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('role') == $key ? 'selected' : ($admin->roles->pluck('id')->first() == $key ? 'selected' : '') }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label for="start_work_date"
                                    class="form-label text-default">{{ __('Tanggal Mulai Bekerja') }}
                                    <x-all-not-null /></label>
                                <div class="input-group">
                                    <div class="input-group-text text-muted">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                    <input type="text"
                                        class="form-control flatpickr @error('start_work_date') is-invalid @enderror"
                                        name="start_work_date"
                                        value="{{ old('start_work_date') ?? (formatDate($admin->start_work_date) ?? '') }}"
                                        placeholder="{{ __('Tanggal Mulai Bekerja') }}" required>
                                    @error('start_work_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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

@include('layouts.admin.includes.select2')
@include('layouts.admin.includes.flatpickr')

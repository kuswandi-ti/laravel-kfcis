@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Generate Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        {{-- <form method="POST" action="{{ route('mobile.generate_dues.post') }}">
            @csrf --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="block">{{ __('Month') }} <x-fill-field /></label>
                                <select class="form-control custom-select" name="month" id="month" required>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>
                                            {{ formatMonth($i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="year">{{ __('Year') }} <x-fill-field /></label>
                                <input type="text" class="form-control" name="year" id="year"
                                    value="{{ old('year') ?? date('Y') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-block btn_process"
                    onclick="load_modal()">{{ __('Process') }}</button>
            </div>
        </div>
        {{-- </form> --}}

        <div class="modal fade dialogbox" id="dialog_confirm" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="help-outline" role="img" class="md hydrated" aria-label="alert"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ __("You won't be able to revert this!") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </a>
                            <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal" id="btn-confirm">
                                {{ __('Yes') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.mobile.includes.toast')
    </div>
@endsection

@push('scripts')
    <script>
        function load_modal() {
            $('#btn-confirm').attr('onclick', 'confirm_generate()');
            $('#dialog_confirm').modal('show');
        }

        function confirm_generate() {
            let month = $('#month').val();
            let year = $('#year').val();

            $('.btn_process').text("{{ __('Processing...') }}");
            $('.btn_process').prepend(
                '<span class="spinner-border spinner-border-sm me-05 spinner" role="status" aria-hidden="true"></span>'
            );
            $('.btn_process').attr('disabled', 'disabled');

            $.ajax({
                url: '{{ route('mobile.generate_dues.post') }}',
                type: 'post',
                data: {
                    '_method': 'post',
                    'month': month,
                    'year': year,
                },
                success: function(data) {
                    if (data.success == true) {
                        $('#toast_message_success').text(data.message);
                        toastbox('toast_success', 5000);
                    } else {
                        $('#toast_message_error').text(data.message);
                        toastbox('toast_error');
                    }
                },
                error: function(error) {
                    $('#toast_message_error').text(error.message);
                    toastbox('toast_error');
                },
                complete: function(data) {
                    $('.btn_process').text("{{ __('Process') }}");
                    $('.btn_process').find('.spinner').remove();
                    $('.btn_process').removeAttr('disabled');
                }
            });
        }
    </script>
@endpush

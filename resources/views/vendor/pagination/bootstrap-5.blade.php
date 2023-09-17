@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        {{-- <span class="page-link">@lang('pagination.previous')</span> --}}
                        <span class="page-link">{{ __('Sebelumnya') }}</span>
                    </li>
                @else
                    <li class="page-item">
                        {{-- <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">@lang('pagination.previous')</a> --}}
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">{{ __('Sebelumnya') }}</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        {{-- <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a> --}}
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                            rel="next">{{ __('Berikutnya') }}</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        {{-- <span class="page-link">@lang('pagination.next')</span> --}}
                        <span class="page-link">{{ __('Berikutnya') }}</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {{-- {!! __('Showing') !!} --}}
                    {!! __('Menunjukkan') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {{-- {!! __('to') !!} --}}
                    {!! __('sampai') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {{-- {!! __('of') !!} --}}
                    {!! __('dari') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {{-- {!! __('results') !!} --}}
                    {!! __('hasil') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li> --}}
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('Sebelumnya') }}">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            {{-- <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a> --}}
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="{{ __('Sebelumnya') }}">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            {{-- <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a> --}}
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="{{ __('Berikutnya') }}">&rsaquo;</a>
                        </li>
                    @else
                        {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li> --}}
                        <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('Berikutnya') }}">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

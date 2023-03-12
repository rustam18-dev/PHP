{{--{{ $paginator->count() }}--}}
{{--{{ $paginator->currentPage() }}--}}
{{--{{ $paginator->firstItem() }}--}}
{{--{{ $paginator->hasMorePages() }}--}}
{{--{{ $paginator->lastItem() }}--}}
{{--{{ $paginator->lastPage() }}--}}
{{--{{ $paginator->nextPageUrl() }}--}}
{{--{{ $paginator->onFirstPage() }}--}}
{{--{{ $paginator->perPage() }}--}}

@if ($paginator->hasPages())
        <nav class="blog-pagination" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-outline-secondary rounded-pill disabled" href="#">@lang('pagination.previous')</a>
            @else
                <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <a class="btn btn-outline-secondary rounded-pill disabled" href="#" rel="next">@lang('pagination.next')</a>
            @endif
         </nav>
@endif

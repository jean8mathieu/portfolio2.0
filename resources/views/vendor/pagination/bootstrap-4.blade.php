@if ($paginator->hasPages())
    <nav class="w-100">
        <ul class="pagination justify-content-center text-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled w-25" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link bgo-dark" aria-hidden="true">
                        <i class="fas fa-arrow-left"></i> Previous
                    </span>
                </li>
            @else
                <li class="page-item w-25">
                    <a class="page-link  bgo-dark text-white" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="fas fa-arrow-left"></i> Previous
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item w-25 margin-right">
                    <a class="page-link  bgo-dark text-white" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        Next <i class="fas fa-arrow-right"></i></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled w-25 " aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link  bgo-dark" aria-hidden="true">
                        Next <i class="fas fa-arrow-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="material-icons">chevron_left</i>{{-- @lang('pagination.previous') --}}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">chevron_left</i>{{-- @lang('pagination.previous') --}}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li style="float:right"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">chevron_right</i>{{-- @lang('pagination.next') --}}</a></li>
        @else
            <li class="disabled"><span><i class="material-icons">chevron_right</i>{{-- @lang('pagination.next') --}}</span></li>
        @endif
    </ul>
@endif

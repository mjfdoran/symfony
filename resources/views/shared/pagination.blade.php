<div class="pagination">
    @if($next !== false)
        <a class="next-link" href="{{ route($routeName, ['page' => $next]) }}">NEXT</a>
    @endif

    @if($previous !== false)
        <a class="previous-link"  href="{{ route($routeName, ['page' => $previous]) }}">PREVIOUS</a>
    @endif
</div>
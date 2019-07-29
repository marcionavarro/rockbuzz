@if ($paginator->hasPages())
<nav class="flexbox mt-30">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i>Anterior</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i
            class="ti-arrow-left fs-9 mr-4"></i>Anterior</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white"> Proxímo <i
            class="ti-arrow-right fs-9 ml-4"></i></a>
    @else
    <a class="btn btn-white disabled">Proxímo <i class="ti-arrow-right fs-9 ml-4"></i> </a>
    @endif
</nav>
@endif
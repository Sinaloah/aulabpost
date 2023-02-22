@if ($paginator->lastPage() > 1)
<ul class="pagination d-flex align-items-center">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} me-2">
        <a href="{{ $paginator->url(1) }}"><i class="fa-solid fa-angles-left cstm-black-font-clr"></i></a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)

    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
        <a class="text-decoration-none cstm-black-font-clr cstm-pag-number" href="{{ $paginator->url($i) }}">{{ $i }}</a>
    </li>

     @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} ms-2">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="fa-solid fa-angles-right cstm-black-font-clr"></i></a>
    </li>
</ul>
@endif
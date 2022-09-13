@if ($paginator->hasPages())
    <ul class="pagination pagination-rounded justify-content-center">
        {{-- Previous Page Link --}}
        {{-- @if ($paginator->onFirstPage()) --}}
            <li class="{{$paginator->onFirstPage() ? 'disabled' : ''}} page-item"><a href="javascript:;" wire:click="previousPage" class="page-link">Prev</a></li>
        {{-- @else
            <li class="page-item"><a href="javascript:;" wire:click="previousPage" rel="prev" class="page-link">Prev</a></li>
        @endif --}}
        
        {{-- Page Element Here! --}}
        @foreach ($elements as $el)
            {{-- Make dots here! --}}
            @if (is_string($el))
                <li class="page-item disabled"><a class="page-link"><span>{{$el}}</span></a></li>
            @endif

            {{-- Links array here --}}
            @if (is_array($el))
                @foreach ($el as $page=>$url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link">
                            <span>{{$page}}</span>
                        </a>
                    </li>
                    @else
                        <li class="page-item"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link">{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- nextpage link --}}
        <li class="{{$paginator->hasMorePages() ? '' : 'disabled'}} page-item">
            <a href="javascript:;" wire:click="nextPage" class="page-link">Next</a>
        </li>
        {{-- @if ($paginator->hasMorePages())
            <li class="page-item"><a href="javascript:;" wire:click="nextPage" class="page-link">Next</a></li>
        @else
            <li class="page-item disabled"><a href="javascript:;" wire:click="nextPage" class="page-link">Next</a></li>
        @endif --}}
    </ul>
@endif
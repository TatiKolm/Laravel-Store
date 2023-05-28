<!-- <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
            @if($products->currentPage() != 1)
            <a href="{{ $products->previousPageUrl() }}" type="button" class="btn btn-primary "><</a>
            @endif
            @for($i=1; $i<=$products->lastPage(); $i++)
            <a href="{{ $products->url($i) }}"type="button" class="btn @if($i==$products->currentPage()) btn-primary @else btn-outline-primary @endif">{{$i}}</a>
            @endfor
            @if($products->currentPage() != $products->lastPage())
            <a href="{{ $products->nextPageUrl() }}" type="button" class="btn btn-primary">></a>
            @endif
        </div>
    </div> -->
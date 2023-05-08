@extends("app")

@section("title", "Главная")

@section("content")
    <h1 class="my-5">{{__("Products")}}</h1>
    
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card mb-3">
                <img src="{{ $product->getImage() }}" alt="" style="height:200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->getPrice() }}</p>
                    <a href="{{route('app.product', $product->slug)}}" class="btn btn-sm btn-primary">Перейти</a>
                    <a href="{{route('cart.add-product', $product)}}" class="btn btn-sm btn-success add-to-cart">В корзину</a>
                </div>
            </div>    
        </div>
        @endforeach
    </div>

    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
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
    </div>
    
@endsection
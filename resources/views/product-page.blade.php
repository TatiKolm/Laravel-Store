@extends("app")

@section("title", "Главная")

@section("content")
    <h1 class="my-5">{{__("Product")}}</h1>
    
    <div class="row">
       <div class="col-lg-6 col-12">
        <div>
            <img src="{{ $product->getImage() }}" alt="" style="height:200px">
        </div>
       </div>
       <div class="col-lg-6 col-12">
        <h1 class="mb-3">{{$product->title}}</h1>
        <div class="mb-3">{{ $product->description }}</div>
        <div class="mb-3">{!!$product->getTrademarks()!!}</div>
        <div class="mb-3">{{$product->getPrice()}}</div>
        <div class="mb-3">
            <a href="{{route('cart.add-product', $product)}}" type="button" class="btn btn-success">В корзину</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        </div>              
    </div>
    
@endsection
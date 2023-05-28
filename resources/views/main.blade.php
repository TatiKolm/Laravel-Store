@extends("app")

@section("title", "Главная")

@section("content")
    <h1 class="my-5">{{__("Products")}}</h1>

    <form action="" method="GET" class="mb-5">
        <div class="form-group ">
            <input type="text" name="search" placeholder="Введите запрос" class="form-control mb-2">
            <button class="btn btn-primary">Найти</button>
        </div>
        <a href="/">Сбросить фильтр</a> 
    </form>
   
    
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

    
    
@endsection
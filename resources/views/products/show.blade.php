@extends('app')

@section('title', 'Product')
@section('content')

    <div>
        <h1 class="my-5">{{ $product->title }}</h1>
        <div class="row">
            <div class="col-3">
                <img src="{{ $product->getImage() }}" alt="" style="height:200px">
            </div>
            <div class="col">
                <p>{{ $product->description }}</p>
                <p>
                    @foreach ($product->trademarks as $trademark)
                        {!!$trademark->name . '<br>'!!}
                    @endforeach
                </p>
            </div>
        </div>
        
        
    </div>
@endsection
@extends("app")

@section("title", "Корзина")

@section("content")
    <h1 class="my-5">{{__("Корзина")}}</h1>
    @if($cart)
    <div class="row">
       <div class="col-lg-8 col-12">
        <table class="table table-striped">
            <div class="head">
                <tr>
                    <th>Изображение</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итог</th>
                    <th>Удалить</th>
                </tr>
            </div>
            <tbody>
                @foreach($cart->items as $item)
                <tr>
                    <td><img src="{{$item->product->getImage()}}" alt="" width="100px"></td>
                    <td>{{$item->product->title}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <form action="{{ route('cart.item.qty-update', $item)}}" method="POST">
                            @csrf @method("PUT")
                            <input type="number" class="form-control change-qty" name="quantity" value="{{$item->quantity}}" min="1">
                        </form>
                    </td>
                    <td>{{$item->sub_total}}</td>
                    <td>
                        <form action="{{ route('cart.item.destroy', $item)}}" method="POST">
                            @csrf @method("DELETE")
                            <button class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
        </table>

        @if(\Session::has('message'))
            <div class="alert alert-warning">
                {!!\Session::get('message')!!}
            </div>
        @endif

        @if($cart->promocodes->first())
            @if($cart->promocodes->contains($cart->promocodes->first()->id))
                <p>Промкод применен <a href="{{ route('cart.cancel-promocode')}}">Отменить</a></p>
            @endIf
            @else
                <form action="{{ route('cart.apply-promocode')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Введите промокод</label>
                        <input type="text" class="form-control" name="promocode">
                    </div>
                    <button class="btn btn-warning">Применить</button>
                </form>
           
        @endIf
       </div>
       <div class="col-lg-4 col-12">
        <div>
            <h3 class="mb-2">Итого</h3>
            <p class="mb-2">Сумма заказа</p>
            <h4 class="mb-2">{{priceFormat($cart->getTotalPrice())}}</h4>
            <a href="{{route('app.checkout')}}" class="btn btn-primary">Оформить заказ</a>
        </div>
        </div>              
    </div>
    @else
    <div>
        <p>Ваша корзина пуста</p>
        <a href="/" class="btn btn-success">Вернуться на главную</a>
    </div>
    @endif
@endsection
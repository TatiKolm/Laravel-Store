@extends("app")

@section("title", "Корзина")

@section("content")
    <h1 class="my-5">{{__("Корзина")}}</h1>
    
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
                            <input type="number" class="form-control change-qty" name="quantity" value="{{$item->quantity}}">
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
        
       </div>
       <div class="col-lg-4 col-12">
        
        </div>              
    </div>
    
@endsection
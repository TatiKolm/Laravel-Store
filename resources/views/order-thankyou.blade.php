@extends("app")

@section("title", "Заказ")

@section("content")
    <h1 class="my-5">{{__("Спасибо за заказ!")}}</h1>

    <p class="mb-">
        Ваш заказ №{{$order->id}} успешно оформлен! 
        Статус заказа - {{ __('statuses.'.$order->status) }}
    </p>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->title  }} </td>
                        <td>{{ $item->quantity }} </td>
                        <td>{{ $item->price}} </td>
                        <td>{{ priceFormat($item->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="/" class="btn btn-success">Вернуться на главную</a>
  
@endsection
<h3>Здравствуйте, {{ $order->user_name}}</h3>

<p>Вы оформили заказ № {{ $order->id}}</p>
<h4>Ваш заказ</h4>
<table>
    <tr>
        <th>Наименование</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Сумма</th>
    </tr>
    @foreach($order->items as $item)
    <tr>
        <td>{{$item->product->title}}</td>
        <td>{{priceFormat($item->price)}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{priceFormat($item->subtotal)}}</td>
    </tr>
    @endforeach
</table>
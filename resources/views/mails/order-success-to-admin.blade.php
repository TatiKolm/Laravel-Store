<h3>Заказ № {{ $order->id}} оформлен на сайте</h3>
<p>Заказчик {{ $order->user_surname . " " . $order->user_name}}</p>
<p>Телефон {{ $order->phone}}</p>
<p>Email {{ $order->email}}</p>
<h3>Состав заказа</h3>
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
@extends('app')

@section('title', 'Заказы')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Заказы")}}</h2>
    </div>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Товар</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->getCustomerFullName() }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)
                                <li>{{ $item->product->title }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ priceFormat($order->total_sum) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

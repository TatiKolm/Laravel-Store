@extends('app')

@section('title', 'Все заказы')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Все заказы")}}</h2>
    </div>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Товар</th>
                    <th>Сумма</th>
                    <th>Статус</th>
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
                        <td>
                            <form action="{{route('order.change-status', $order)}}" method="GET">
                                <select name="status" class="change-status form-control">
                                    <option value="in_process" @if($order->status == 'in_process') selected @endif>{{__('statuses.in_process')}}</option>
                                    <option value="finished" @if($order->status == 'finished') selected @endif>{{__('statuses.finished')}}</option>
                                    <option value="canceled" @if($order->status == 'canceled') selected @endif>{{__('statuses.canceled')}}</option>
                                    <option value="paid" @if($order->status == 'paid') selected @endif>{{__('statuses.paid')}}</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
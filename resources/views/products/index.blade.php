@extends('app')

@section('title', __("Products"))
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Products")}}</h2>
        <a href="{{ route('products.create')}}" class="btn btn-primary">{{__("Add")}}</a>
    </div>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{__("Image")}}</th>
                    <th>{{__("Products")}}</th>
                    <th>{{__("Trademarks")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->getImage() }}" alt="" style="height:100px">
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->slug) }}">
                                {{ $product->title }}</a>
                        </td>
                        <td>
                            @foreach ($product->trademarks as $trademark)
                                {!!$trademark->name . '<br>'!!}
                            @endforeach
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                            {{__("Edit")}}
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="mx-3">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                {{__("Delete")}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

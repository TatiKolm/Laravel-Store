@extends('app')

@section('title', $product->title . ' (ред.)')
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>{{$product->title . ' (ред.)' }}</h2>
</div>

<div>
    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf @method("PUT")
        <div class="form-group mb-3">
            <label for="title" class="form-label">Название товара</label>
            <input type="text" id="title" name="title" class="form-control" value="{{old('title', $product->title)}}">
            @error('name')
                <small class="text-denger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Описание товара</label>
            <textarea type="text" id="description" name="description" class="form-control">{{old('description', $product->description)}}</textarea>
            @error('description')
                <small class="text-denger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
                <small class="text-denger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <span>Торговая марка</span>
            @foreach ($trademarks as $trademark)
                    <label for="{{ 'trademark_' . $trademark->id }}" class="form-label">
                        <input type="checkbox" id="{{ 'trademark_' . $trademark->id }}" name="trademarks[]" class="form-check-input"
                            value="{{ $trademark->id }}" @if ($product->trademarks->contains(old('trademark_' . $trademark->id, $trademark->id))) checked @endif>
                        {{ $trademark->name }}
                    </label>
                @endforeach
                
            </div>
        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
    </form>
</div>
@endsection
@extends('app')

@section('title', $trademark->name . ' (ред.)')
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>{{ $trademark->name . ' (ред.)' }}</h2>
</div>

<div>
    <form action="{{route('trademarks.update', $trademark->id)}}" method="POST">
        @csrf @method("PUT")
        <div class="form-group mb-3">
            <label for="name" class="form-label">Название бренда</label>
            <input type="text" id="name" name="name" value="{{$trademark->name}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
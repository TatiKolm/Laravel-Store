@extends('app')

@section('title', __('Create Trademarks'))
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>{{__('Create Trademarks')}}</h2>
</div>

<div>
    <form action="{{route('trademarks.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Название марки</label>
            <input type="text" id="name" name="name" class="form-control">
            @error('name')
                <small class="text-denger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('Add')}}</button>
    </form>
</div>
@endsection

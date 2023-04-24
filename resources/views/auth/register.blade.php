@extends('app')

@section('title', 'Регистрация')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Register")}}</h2>
    </div>

    <div>
        <form action="{{ route('auth.store-user') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">{{__("Name")}}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">{{__("Email")}}</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">{{__("Password")}}</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">{{__("Confirm password")}}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__("Register")}}</button>
        </form>
    </div>
@endsection
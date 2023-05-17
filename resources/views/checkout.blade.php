@extends("app")

@section("title", "Оформление заказа")

@section("content")
    <h1 class="my-5">{{__("Оформление заказа")}}</h1>
    <form action="{{ route('app.store-order') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group mb-3">
                    <label for="user_surname" >Фамилия</label>
                    <input type="text" id="user_surname" name="user_surname" class="form-control" value="{{ old('user_surname') }}">
                    @error('user_surname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group mb-3">
                    <label for="user_name" >Имя</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name')}}">
                    @error('user_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group mb-3">
                    <label for="user_patronymic" >Отчество</label>
                    <input type="text" id="user_patronymic" name="user_patronymic" class="form-control" value="{{ old('user_patronymic') }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="phone">Телефон</label>
                    <input type="text" id="phone" name="user_phone" class="form-control" value="{{ old('user_phone') }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="user_email">Email</label>
                    <input type="text" id="user_email" name="user_email" class="form-control" value="{{ old('user_email', auth()->user()->email)}}">
                </div>
            </div>
        </div>

        <button class="btn btn-primary">Оформить заказ</button>
    </form>
@endsection

@section('page-scripts')
<script src="{{asset('assets/js/jquery.inputmask.min.js')}}"></script>
@endsection
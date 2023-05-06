@extends('app')

@section('title', __('Пользователи'))
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{ __("Пользователи") }}</h2>
        <a href="" class="btn btn-primary">Добавить</a>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Роли</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoles() }}</td>
                        <td class="d-flex">
                            <a href="{{route("users.edit", $user)}}" class="btn btn-sm btn-warning">
                                Ред.
                            </a>
                            <form action="" method="POST" class="mx-3">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('app')

@section('title', __("Trademarks"))
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Trademarks")}}</h2>
        <a href="{{ route('trademarks.create')}}" class="btn btn-primary">{{__("Add")}}</a>
    </div>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{__("Trademark")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trademarks as $trademark)
                    <tr>
                        <td>{{ $trademark->id }}</td>
                        <td>{{ $trademark->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('trademarks.edit', $trademark) }}" class="btn btn-sm btn-warning">
                            {{__("Edit")}}
                            </a>
                            <form action="{{ route('trademarks.destroy', $trademark) }}" method="POST" class="mx-3">
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

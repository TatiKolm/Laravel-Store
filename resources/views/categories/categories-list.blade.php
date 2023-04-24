@extends('app')

@section('title', 'Категории')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("Categories")}}</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">{{__("Add")}}</a>
    </div>

    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{__("Category")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                            {{__("Edit")}}
                            </a>
                            <form action="{{ route('categories.delete', $category->id) }}" method="POST" class="mx-3">
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

@extends('app')

@section('title', 'Новости')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>{{__("News")}}</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">{{__("Add")}}</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        @if ($articles->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{__("Image")}}</th>
                        <th>{{__("Title")}}</th>
                        <th>{{__("Category")}}</th>
                        <th>{{__("Is_published")}}</th>
                        <th>{{__("Actions")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>
                                <img src="{{ $article->getImage() }}" alt="" style="height:100px">
                            </td>
                            <td>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->getPublishStatus() }}</td>
                            <td class="d-flex">
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">
                                {{__("Edit")}}
                                </a>
                                <form action="{{ route('articles.delete', $article) }}" method="POST" class="mx-3">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick='event.preventDefault();if(confirm("Запись будет удалена. Продолжить?")){this.closest("form").submit();}'>
                                        {{__("Delete")}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="my-4">{{__("app.page.empty-news")}}</p>
        @endif
    </div>
@endsection

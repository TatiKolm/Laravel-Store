@extends("app")

@section("title", "Главная")

@section("content")
    <h1 class="my-5">Новости</h1>
    
    <div class="row">
        <div class="col-sm-12 d-flex ">
        @if ($articles->count())
    
    @foreach ($articles as $article)
    <div class="card mx-3" style="width: 18rem;">
            <img src="{{ $article->getImage() }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->content }}</p>
                <a href="#" class="btn btn-primary">Узнать больше</a>
            </div>
        </div>     
         @endforeach
    @else
        <p class="my-4">Нет ни одной новости.</p>
    @endif
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')

<div class="row col-md-10 mx-auto">
@foreach($articles as $article)
<div class="col-sm-3 mb-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <ul>
                @foreach($article->categories as $category)
                <h6 class="card-subtitle mb-2 text-muted">{{$category->title}}</h6>
                @endforeach
            </ul>

            <p class="card-text">{{$article->description}}</p>
            <a href="{{route('article.show', [$article])}}" class="card-link btn btn-dark btn-sm" >Read more</a>
            <a href="{{route('article.edit', [$article])}}" class="card-link btn btn-light btn-sm">Edit article</a>
          </div>
    </div>
  </div>

@endforeach
{!! $articles->appends(Request::except('page'))->render() !!}
</div>
@endsection

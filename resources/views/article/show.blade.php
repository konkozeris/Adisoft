@extends('layouts.app')
@section('content')

<div class="jumbotron col-md-9 mx-auto">
    <h1 class="display-6">{{$article->title}}</h1>

    <p class="lead">{{$article->description}}</p>

    <ul>
        @foreach($article->categories as $category)
        <li>{{ $category->title }}</li>
        @endforeach
    </ul>

    <p> {{$article->date}}</p>

    <hr class="my-4"> {{--line break--}}

    <p>{{$article->content}}</p>

    <hr class="my-4"> {{--line break--}}

    <p class="lead">
        <a class="btn btn-light" href="{{route('article.index')}}" role="button">Go back</a>
        <a class="btn btn-light" href="{{route('article.edit', [$article])}}" role="button">Edit article</a>
    </p>


<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-12">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <div class="form-outline mb-4">

                    <p> Comments: {{$comment_count}} </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{route('comment.store')}}">
                        @csrf
                        <input type="email" name="comment_email" class="form-control" placeholder="Enter your e-mail"/>
                        <textarea type="text" name="comment_content" class="form-control" placeholder="Enter your comment"></textarea>
                        <input name="article_id" value="{{$article->id}}" hidden>
                        <button type="submit" class="btn btn-dark"> Submit </button>
                    </form>
                </div>

        @foreach($comments as $comment)

        <div class="card mb-8">
            <form method="POST" action="{{route('comment.delete', [$comment])}}">
                @csrf
                <button type="submit" class="btn btn-outline-info btn-sm"><b>X</b></button>
            </form>
            <div class="card-body">
            <p>{{$comment->content}}</p>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <p class="small mb-0 ms-2">{{$comment->email}}</p>
                        <p class="small mb-0 ms-2">{{$comment->date}}</p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

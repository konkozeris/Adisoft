@extends('layouts.app')
@section('content')
    <div class='container'>
        <table class="table table-hover">
            <thead class="thead thead-dark">
                <th> @sortablelink('id', 'ID') </th>
                <th> @sortablelink('title', 'Title')</th>
                <th> @sortablelink('content', 'Content')</th>
                <th> @sortablelink('description', 'Description')</th>
                <th> @sortablelink('category_id', 'Category')</th>
                <th> @sortablelink('date', 'Last edit date')</th>
                <th> ACTIONS</th>
            </thead>
            @foreach($articles as $article)
                <tr>
                    <td> {{$article->id}} </td>
                    <td> {{$article->title}}</td>
                    <td> {{$article->content}}</td>
                    <td> {{$article->description}}</td>
                    <td>
                        <ul>
                            @foreach($article->categories as $category)
                            <li>{{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td> {{$article->date}}</td>
                    <td>
                        <form action="{{route('article.delete', [$article])}}" method="POST">
                            <button class="btn btn-danger" type="submit"> Delete </button>
                            @csrf
                        </form>
                        <a href="{{route('article.show', [$article])}}" class="btn btn-light"> show </a>
                        <a href="{{route('article.edit', [$article])}}" class="btn btn-light"> edit </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $articles->appends(Request::except('page'))->render() !!}
    </div>
@endsection

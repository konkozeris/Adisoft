@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Create new article</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{route('article.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="article_title" class="col-md-4 col-form-label text-md-end">Title</label>
                            <div class="col-md-6">
                                <input id="article_title" type="text" class="form-control col-md-6" name="article_title">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article_description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <input id="article_description" type="article_description" class="form-control" name="article_description">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article_content" class="col-md-4 col-form-label text-md-end">Content</label>
                            <div class="col-md-6">
                                <textarea id="article_content" type="text" class="form-control" name="article_content"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article_id" class="col-md-4 col-form-label text-md-end">Category</label>
                            <div class="col-md-6">
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                            <input id="category_id" name="category_id[]" class="form-check-input" type="checkbox" value="{{$category->id}}">{{$category->title}}</>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

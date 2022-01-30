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
                                <input id="article_title" type="text" class="form-control @error('article_title') is-invalid @enderror" name="article_title">

                                @error('article_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article_description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <input id="article_description" type="article_description" class="form-control @error('article_description') is-invalid @enderror" name="article_description">

                                @error('article_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="article_content" class="col-md-4 col-form-label text-md-end">Content</label>

                            <div class="col-md-6">
                                <textarea id="article_content" type="text" class="form-control @error('article_content') is-invalid @enderror" name="article_content"></textarea>
                                @error('article_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="article_id" class="col-md-4 col-form-label text-md-end  @error('article_id') is-invalid @enderror">Category</label>

                            <div class="col-md-6">
                                {{-- <select class="form-select" name="category_id" id="category_id">
                                    <option selected> select </option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select> --}}
                                @foreach ($categories as $category)
                                <div class="form-check">
                                        <input id="category_id" name="category_id[]" class="form-check-input" type="checkbox" value="{{$category->id}}">{{$category->title}}</>
                                </div>
                                @endforeach
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

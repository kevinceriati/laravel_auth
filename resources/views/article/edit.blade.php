@extends('layout')

@section('content')
    <form action="{{route('article.update', ['article' => $article])}}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $article->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="" cols="30" rows="10"  class="form-control">{{ $article->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>

@endsection
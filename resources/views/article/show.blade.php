@extends('layout')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p class="text-muted">Auteur : {{ $article->user->name }}</p>
    <p>
        {{ $article->content }}
    </p>

    {{-- seul l'auteur de l'article doit pouvoir afficher ce bouton --}}
    <p>
        <a href="{{ route('article.edit', ['article' => $article]) }}">Editer</a>
    </p>
@endsection
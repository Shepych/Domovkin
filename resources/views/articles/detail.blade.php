@extends('layouts.main')

@section('content')
    <section class="grid">
        <section class="article__header">
            <div>
                <span>СТАТЬИ <span>&gt; {{ mb_strtoupper($article->title) }}</span></span>
                <h1 class="article__page__title">{{ $article->title }}</h1>
            </div>
        </section>

        <img style="max-width: 100%;display: block;margin: 0 auto" src="{{ $article->poster() }}" alt="">
        <div class="article__content">
            {!! Str::markdown($article->content) !!}
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection

@extends('layouts.main')

@section('content')
    <section class="grid">
        <section class="article__header">
            <div class="flex" style="flex-direction: column;width: 100%">
{{--                <span>СТАТЬИ <span>&gt; {{ mb_strtoupper($article->title) }}</span></span>--}}
                <h1 class="article__page__title">{{ $article->title }}</h1>
                <span>27 мая 2023 года в 20:32</span>
            </div>
        </section>

        <img style="max-width: 100%;display: block;margin: 0 auto;box-shadow: 0 0 5px black;border-radius: 10px" src="{{ $article->poster() }}" alt="">
        <div class="article__content">
            {!! Str::markdown($article->content) !!}
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection

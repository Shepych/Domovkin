@extends('layouts.main')

@section('content')
    <section class="grid">
        <h1 class="article__page__title">{{ $article->title }}</h1>
        <div class="flex" style="padding-left: 40px;padding-right: 40px;">
            <section class="article__header">
                <ul class="article__sub">
                    <li>27 мая 2023 года в 20:32</li>
                    <li>Просмотров 820</li>
                </ul>
                <img style="display: block;margin: 0 auto;" src="{{ $article->poster() }}">
            </section>
        </div>





        <div class="article__content">
            {!! Str::markdown($article->content) !!}
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection

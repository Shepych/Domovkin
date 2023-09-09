@extends('layouts.main')

@section('content')
    <section class="grid">
        <section class="article__header">
            <h1 class="article__page__title">{{ $article->title }}</h1>

            <ul>
                <li>27 мая 2023 года в 20:32</li>
                <li>Просмотров 820</li>
            </ul>

{{--            <div class="flex">--}}
                <img style="display: block;margin: 0 auto;" src="{{ $article->poster() }}">
{{--            </div>--}}

            {{--            <div class="flex" style="flex-direction: column;width: 100%">--}}
{{--                <h1 class="article__page__title">{{ $article->title }}</h1>--}}
{{--                <span>27 мая 2023 года в 20:32</span>--}}
{{--            </div>--}}
        </section>

        <div class="article__content">

            {!! Str::markdown($article->content) !!}
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection

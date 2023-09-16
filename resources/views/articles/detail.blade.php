@extends('layouts.main')

@section('content')
    <section style="padding-left: 0;padding-right: 0;max-width: 2200px;margin: 0 auto;margin-bottom: 40px;">
        <div class="" style="padding-left: 40px;padding-right: 40px;">
            <section class="article__header">
                <h1 class="article__page__title">{{ $article->title }}</h1>

                <ul class="article__sub">
                    <li>27 мая 2023 года в 20:32</li>
                    <li>Просмотров 820</li>
                </ul>
{{--                <img style="display: block;margin: 0 auto;max-width: 800px;height: auto;border-radius: 20px;box-shadow: 0 0 5px black" src="{{ $article->poster() }}">--}}
                <div class="article__content" style="padding-top: 20px;">
                    {!! Str::markdown($article->content) !!}
                </div>
            </section>
        </div>
    </section>

    @include('blocks.footer')
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection

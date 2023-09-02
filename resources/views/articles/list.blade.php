@extends('layouts.main')

@section('content')
    <section class="articles__list">
        @foreach($articles as $article)
            <a class="article__row" href="{{ route('articles.detail', $article->slug) }}">
                <h2>
                    {{ $article->title }}
                </h2>
                <div class="article__img__wrap">
                    <img src="{{ $article->img }}" alt="">
                </div>
                <div class="article__description">
                    <p>
                        {{ mb_strimwidth($article->description, 0, 170, " ...") }}
                    </p>
                </div>
                <div class="article__footer">
                    <span class="article__date">27 мая</span>
                    <span class="article__date" style="margin-right: 18px">Подробнее -></span>
                </div>
            </a>
        @endforeach
    </section>
@endsection

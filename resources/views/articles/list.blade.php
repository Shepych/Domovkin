@extends('layouts.main')

@section('content')
    <section class="articles__list">
        @foreach($articles as $article)
            <a class="article__row" href="{{ route('articles.detail', $article->slug) }}">
                <img src="{{ $article->img }}" alt="">
                <div class="article__description">
                    <h2>{{ $article->title }}</h2>
                    <p>
                        {{ $article->description }}
                    </p>
                </div>
            </a>
        @endforeach
    </section>
@endsection

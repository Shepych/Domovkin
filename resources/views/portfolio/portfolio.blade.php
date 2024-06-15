@extends('layouts.main')

@section('content')
<h1 class="our__service-header service__header-page" style="margin-top: 40px">Портфолио</h1>

<p class="projects__paragraph">В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли
    наглядно увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами.</p>
<section class="portfolio__list">

    @foreach($portfolio as $project)
    <div class="portfolio__card-two">
        <div class="portfolio__card-left">
            <a class="portfolio__gallery-img-wrapper" href="{{ route('portfolio.detail', $project->id) }}">
                <img class="portfolio__gallery-img" src="{{ $project->img }}">
            </a>

            <div class="gallery__card-section">
                <div class="photo__count">{{ $project->photos()->count() + 1}} <img src="/svg/photo.svg" width="36px">
                </div>
                <div class="gallery__card-description">
                    <h2>{{ $project->type() }}</h2>
                    <span
                        class="gallery__card-date-adaptive">{{ Carbon\Carbon::parse($project->completed)->diffForHumans() }}</span>

                    <p class="gallery__card-description-adaptive">
                        {{ $project->description }}
                    </p>
                </div>

                <div class="gallery__card-footer">
                    <span
                        class="gallery__card-date">{{ Carbon\Carbon::parse($project->completed)->diffForHumans() }}</span>
                    <div class="photo__count photo__count-adaptive">{{ $project->photos()->count() + 1 }} <img
                            src="/svg/photo.svg" width="36px"></div>
                    <a href="{{ route('portfolio.detail', $project->id) }}" class="more-details">Подробнее</a>
                </div>
            </div>
        </div>

        <p class="gallery__card-description-adaptive-two">
            {{ $project->description }}
        </p>
    </div>
    @endforeach
</section>

@include('blocks.footer')
@endsection

@extends('layouts.main')

@section('content')
<h1 class="our__service-header service__header-page" style="margin-top: 40px">Портфолио</h1>
{{-- <p class="portfolio__paragraph">
        В этот раздел мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть результаты и ознакомиться со всеми работами которые были выполнены нами.
    </p> --}}
<p class="projects__paragraph">В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли
    наглядно увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами.</p>
<section class="portfolio__list">
    <div class="portfolio__card-two">
        <div class="portfolio__card-left">
            <a class="portfolio__gallery-img-wrapper"
                href="{{ route('portfolio.detail', 12) }}">
                <img class="portfolio__gallery-img" src="/img/portfolio/1/Бахрушино.jpg">
            </a>

            <div class="gallery__card-section">
                <div class="photo__count">5 <img src="/svg/photo.svg" width="36px"></div>
                    <div class="gallery__card-description">
                        <h2>Ремонт</h2>
                        <span class="gallery__card-date-adaptive">20 мая 2024</span>
                        
                        <p class="gallery__card-description-adaptive">
                            В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно
                            увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами. В этом
                            разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть
                            результаты и ознакомиться со всеми объектами которые были реализованы нами.
                        </p>
                    </div>

                <div class="gallery__card-footer">
                    <span class="gallery__card-date">20 мая 2019</span>
                    <div class="photo__count photo__count-adaptive">5 <img src="/svg/photo.svg" width="36px"></div>
                    <a href="{{ route('portfolio.detail', 13) }}" class="more-details">Подробнее</a>
                </div>
            </div>
        </div>

        <p class="gallery__card-description-adaptive-two">
            В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно
            увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами. В этом
            разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть
            результаты и ознакомиться со всеми объектами которые были реализованы нами.
        </p>
    </div>

    <div class="portfolio__card-two">
        <div class="portfolio__card-left">
            <a class="portfolio__gallery-img-wrapper"
                href="{{ route('portfolio.detail', 12) }}">
                <img class="portfolio__gallery-img" src="/img/portfolio/1/Счастливцево.jpg">
            </a>

            <div class="gallery__card-section">
                <div class="photo__count">5 <img src="/svg/photo.svg" width="36px"></div>
                    <div class="gallery__card-description">
                        <h2>Стройка</h2>
                        <span class="gallery__card-date-adaptive">20 мая 2019</span>
                        
                        <p class="gallery__card-description-adaptive">
                            В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно
                            увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами. В этом
                            разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть
                            результаты и ознакомиться со всеми объектами которые были реализованы нами.
                        </p>
                    </div>

                <div class="gallery__card-footer">
                    <span class="gallery__card-date">20 мая 2019</span>
                    <div class="photo__count photo__count-adaptive">5 <img src="/svg/photo.svg" width="36px"></div>
                    <a href="{{ route('portfolio.detail', 13) }}" class="more-details">Подробнее</a>
                </div>
            </div>
        </div>

        <p class="gallery__card-description-adaptive-two">
            В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно
            увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами. В этом
            разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть
            результаты и ознакомиться со всеми объектами которые были реализованы нами.
        </p>
    </div>
</section>

@include('blocks.footer')
@endsection

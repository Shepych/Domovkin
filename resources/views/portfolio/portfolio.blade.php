@extends('layouts.main')

@section('content')
    <h1 class="our__service-header service__header-page" style="margin-top: 40px">Портфолио</h1>
    {{-- <p class="portfolio__paragraph">
        В этот раздел мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть результаты и ознакомиться со всеми работами которые были выполнены нами.
    </p> --}}
    <p class="projects__paragraph">В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами.</p>
    <section class="portfolio__list">
        <a href="{{ route('portfolio.detail', 12) }}" class="portfolio__card">
            <img class="portfolio__preview" src="/img/articles/1.webp">
            <div class="portfolie__title">Ремонт</div>
            <div class="photo__count">5 <img src="/svg/photo.svg" width="28px"></div>
        </a>

        <article class="portfolio__card">
            <img class="portfolio__preview" src="/img/articles/2.webp">
            <div class="portfolie__title">Стройка</div>
            <div class="photo__count">13 <img src="/svg/photo.svg" width="28px"></div>
        </article>

        <article class="portfolio__card">
            <img class="portfolio__preview" src="/img/articles/2.webp">
        </article>

        <article class="portfolio__card">
            <img class="portfolio__preview" src="/img/articles/3.webp">
        </article>
    </section>

    <div class="pswp-gallery pswp-gallery--single-column" id="my-gallery">
        <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" 
          data-pswp-width="1669" 
          data-pswp-height="2500" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-200.jpg" alt="" />
        </a>
        <!-- cropped thumbnail: -->
        <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-2500.jpg" 
          data-pswp-width="1875" 
          data-pswp-height="2500" 
          data-cropped="true" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-200.jpg" alt="" />
        </a>
        <!-- data-pswp-src with custom URL in href -->
        <a href="https://unsplash.com" 
          data-pswp-src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-2500.jpg"
          data-pswp-width="2500" 
          data-pswp-height="1666" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/3/img-200.jpg" alt="" />
        </a>
        <!-- Without thumbnail: -->
        <a href="http://example.com" 
          data-pswp-src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/5/img-2500.jpg"
          data-pswp-width="2500" 
          data-pswp-height="1668" 
          target="_blank">
        </a>
        <!-- wrapped with any element: -->
        <div>
          <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-2500.jpg"
            data-pswp-width="2500" 
            data-pswp-height="1667" 
            target="_blank">
            <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-200.jpg" alt="" />
          </a>
        </div>
      </div>

    @include('blocks.footer')
@endsection
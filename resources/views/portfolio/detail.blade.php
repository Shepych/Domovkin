@extends('layouts.main')

@section('content')
    {{-- <div style="text-align: center;font-size:20px">
      <span>Главная > Портфолио</span>
    </div> --}}
    <h1 class="our__service-header service__header-page" style="margin-top: 40px">Ремонт #12</h1>
    <p class="projects__paragraph">27 мая 2021</p>
    
    <div class="portfolio__gallery" id="my-gallery">
        <a class="gallery__main-photo" href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" 
          data-pswp-width="1669" 
          data-pswp-height="2500" 
          data-cropped="true"
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" alt="" />
        </a>

        <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-2500.jpg" 
          data-pswp-width="1875" 
          data-pswp-height="2500" 
          data-cropped="true" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-2500.jpg" alt="" />
        </a>
        
        <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-2500.jpg" 
          data-pswp-width="1875" 
          data-pswp-height="2500" 
          data-cropped="true" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/7/img-2500.jpg" alt="" />
        </a>
        
        <a href="http://example.com" 
          data-pswp-src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/5/img-2500.jpg"
          data-pswp-width="2500" 
          data-pswp-height="1668" 
          data-cropped="true" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/5/img-2500.jpg" alt="" />
        </a>

        <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-2500.jpg"
          data-pswp-width="2500" 
          data-pswp-height="1667" 
          data-cropped="true" 
          target="_blank">
          <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/6/img-2500.jpg" alt="" />
        </a>
      </div>

    
      <p class="projects__paragraph" style="margin-top: 40px">Описание проекта</p>
    
      @include('blocks.footer')
@endsection
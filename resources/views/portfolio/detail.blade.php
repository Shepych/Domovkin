@extends('layouts.main')

@section('content')
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
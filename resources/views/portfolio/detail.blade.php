@extends('layouts.main')

@section('content')
    <div style="position: relative">
      <a href="{{ $isFromPortfolioList ? url()->previous() : route('portfolio') }}" class="portfolio__back-button"></a>
      <h1 class="our__service-header service__header-page" style="margin-top: 40px">
        {{ $portfolio->type() }}
      </h1>
      <p class="projects__paragraph-date" style="color: #919192">{{ Carbon\Carbon::parse($portfolio->completed)->diffForHumans() }}</p>
    </div>


    <div id="my-gallery">
    <div class="portfolio__gallery">
      @php list($width, $height, $type, $attr) = getimagesize(env('APP_URL') . $portfolio->img); @endphp
        <a class="gallery__main-photo" href="{{ $portfolio->img }}"
          data-pswp-width="{{ $width }}"
          data-pswp-height="{{ $height }}"
          data-cropped="true"
          target="_blank">
          <img src="{{ $portfolio->img }}" alt="" />
        </a>

        @foreach($portfolio->photos() as $photo)
          @if($loop->iteration > 4) @break @endif
          @php
            list($width, $height, $type, $attr) = getimagesize(env('APP_URL') . $photo->src);
          @endphp

          <a href="{{ $photo->src }}"
            data-pswp-width="{{ $width }}"
            data-pswp-height="{{ $height }}"
            data-cropped="true"
            target="_blank">
            <img src="{{ $photo->src }}" alt="" />
          </a>
        @endforeach


      </div>

      <p class="projects__paragraph" style="margin-top: 40px">{{ $portfolio->description }}</p>

      @php
        $math = intval(round(($portfolio->photos()->count() - 4) / 3));
        $gridTemplateRows = '';
        for ($i = 0; $i < $math; $i++) {
          $gridTemplateRows.= '400px ';
        }
        $gridTemplateRows .= ';';
      @endphp

        @if($portfolio->photos()->count() > 4)
        <div class="portfolio__gallery" style="grid-template-columns: calc(33% - 22px) calc(33% - 22px) calc(33% - 22px);grid-template-rows: {{ $gridTemplateRows }};margin-bottom:40px">
          @foreach($portfolio->photos() as $item)
            @if($loop->iteration <= 4)
              @continue
            @endif
              @php
                list($width, $height, $type, $attr) = getimagesize(env('APP_URL') . $item->src);
              @endphp

            <a href="{{ $item->src }}"
              data-pswp-width="{{ $width }}"
              data-pswp-height="{{ $height }}"
              data-cropped="true"
              target="_blank">
              <img src="{{ $item->src }}" alt="" />
            </a>
          @endforeach
        </div>
      @endif
    </div>



      @include('blocks.footer')
@endsection

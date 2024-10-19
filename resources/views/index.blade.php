@extends('layouts.main')
@section('title', 'Home')
@section('bodyClass', 'Home')
@section('content')
<div class="first-container container-fluid">
  <div class="container">
      <div class="row">
          <div data-aos-duration="1000" data-aos="fade-right" style="z-index: 100;" class="col-lg-6 col-md-6 d-flex">
              <div>
                  <h5>Collection 2024</h5>
                  <h1>
                      MADDHA <br />
                      RYTHM EXPERT
                  </h1>
                  <p>
                      We know how large objects will act, <br />
                      but things on a small scale.
                  </p>
                  <a href="{{ route('shop') }}">SHOP NOW</a>
              </div>
          </div>
          <div data-aos-duration="1000" data-aos="fade-left" class="col-lg-6 col-md-6 img d-flex position-relative">
              <section class="slider">
                  <div class="slide one">
                      <img src="{{ asset('assets/image/hero-cover-1.png') }}" alt="" />
                  </div>
                  <div class="slide two">
                      <img src="{{ asset('assets/image/hero-cover-1.png') }}" alt="" />
                  </div>
                  <div class="slide three">
                      <img src="{{ asset('assets/image/hero-cover-1.png') }}" alt="" />
                  </div>
                  <div class="slide four">
                      <img src="{{ asset('assets/image/hero-cover-1.png') }}" alt="" />
                  </div>
                  <div class="slide four">
                      <img src="{{ asset('assets/image/hero-cover-1.png') }}" alt="" />
                  </div>
              </section>

              <img src="" alt="" />
          </div>
      </div>
  </div>
</div>

<div class="second-container category-section container my-5">
  <div class="row">
      <div data-aos-duration="1000" data-aos="fade-right" class="col-lg-5 col-sm-12 position-relative first-img">
          <div class="position-absolute">
              <h2>
                  Top Product Of <br />
                  the Week
              </h2>
              <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
          </div>
      </div>
      <div data-aos-duration="1000" data-aos="fade-left" class="col-lg-5 row">
          <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-12 position-relative second-img">
              <div class="position-absolute">
                  <h2>Top Product Of the Week</h2>
                  <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
              </div>
          </div>
          <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-12 position-relative third-img">
              <div class="position-absolute">
                  <h2>Top Product Of the Week</h2>
                  <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="third-container container">
  <h4>Featured Products</h4>
  <h2>BESTSELLER PRODUCTS</h2>
  <p>Problems trying to resolve the conflict between</p>

  <div class="row">
      @foreach ($saleproducts as $product)
      <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-2 col-md-4 col-sm-5">
        <a href="{{ route('shop.product.detail', $product->slug) }}"><img src="{{ asset('uploads/products/' . $product->featured_image ) }}" alt="{{ $product->featured_image }}" /></a>
        <h4>Music Instruments</h4>
        <a href="{{ route('shop.product.detail', $product->slug) }}">{{ $product->title }}</a>
        <h6>
          @if ($product->sale_price)
          <s>{{ $product->regular_price }}</s>
          @else
              {{ $product->regular_price }}
          @endif
          <span>
              @if ($product->sale_price)
                  {{$product->sale_price}}
              @endif
          </span>
        </h6>
    </div>
      @endforeach
  </div>
  <a data-aos-duration="1000" data-aos="zoom-in" href="{{ route('shop') }}"> View More Products</a>
</div>
<div class="forth-container container">
  <div class="row">
      <div  class="col-lg-6 row d-flex">
          <div data-aos-duration="1000"  data-aos="fade-right" class="col-lg-6 col-md-6 col-sm-6"><img src="{{ asset('assets/image/36 2.png') }}" alt="" /></div>
          <div data-aos-duration="1000"  data-aos="fade-right" class="col-lg-6 col-md-6 col-sm-6"><img src="{{ asset('assets/image/54 4.png') }}" alt="" /></div>
      </div>
      <div data-aos-duration="1000"  data-aos="fade-left" class="col-lg-6 d-flex my-3">
          <div>
              <h4>Featured Products</h4>
              <h1>We love what we do</h1>
              <p>
                  Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
              </p>
              <p>
                  Gravida rhoncus tellus amet dui nunc. Molestie viverra ultricies tellus donec nam felis massa. Amet consectetur lectus nec facilisis massa nunc sem scelerisque. Vel massa gravida sem vulputate ultrices faucibus.
              </p>
          </div>
      </div>
  </div>
</div>
<div class="fivth-container container">
  <h4>Featured Products</h4>
  <h2>BESTSELLER PRODUCTS</h2>
  <p>Problems trying to resolve the conflict between</p>
  <div class="row">
      <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-3 col-md-6 col-sm">
          <img src="{{ asset('assets/image/bx_bxs-book-reader.png') }}" alt="" />
          <h4>Easy Wins</h4>
          <p>
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra
          </p>
      </div>
      <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-3 col-md-6 col-sm">
          <img src="{{ asset('assets/image/icon cool-icon-153.svg') }}" alt="" />
          <h4>Easy Wins</h4>
          <p>
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra
          </p>
      </div>
      <div data-aos="fade-left" data-aos-duration="1000"  class="col-lg-3 col-md-6 col-sm">
          <img src="{{ asset('assets/image/uil_arrow-growth.png') }}" alt="" />
          <h4>Easy Wins</h4>
          <p>
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra
          </p>
      </div>
  </div>
</div>
<div class="payment-methods container text-center">
<h1>Easy Payment Methods</h1>
<p>Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas <br> pharetra. Morbi sit tellus elementum elementum tincidunt morbi id. </p>
<img width="100%" src="{{ asset('assets/image/row.png') }}" alt="">

</div>
<div class="sixth-container container">
  <h2>Featured Products</h2>
  <h1>Featured Posts</h1>
  <div data-aos-duration="1000" data-aos="zoom-in" class="row mt-5">
      @foreach ($topSaleProducts as $topSaleProduct)
          <div class="col-lg-6 col-md-12 my-3 row">
          <div  data-aos="fade-right" data-aos-duration="1000"   class="col-lg-4 col-md-4 position-relative">
              <a href="{{ route('shop.product.detail', $topSaleProduct->slug) }}">
              <img src="{{ asset('uploads/products/' . $topSaleProduct->featured_image )}}" alt="" />
              </a>
              <div class="sale position-absolute">Sale</div>
              <div class="icon position-absolute">
              </div>
          </div>
          <div  data-aos="fade-left" data-aos-duration="1000"    class="col-lg-8 col-md-8 d-flex">
              <div>
                  <div class="d-flex">
                      <a href="{{ route('shop.product.detail', $topSaleProduct->slug) }}">Music Instruments</a>
                      <span class="d-flex">
                          <i class="fa-regular fa-star"></i>
                          <p>4.9</p>
                      </span>
                  </div>
                  <h4>{{ $topSaleProduct->title }}</h4>
                  <p>
                      {{ $topSaleProduct->description }}
                  </p>
                  <div class="d-flex sale">
                      <i class="fa-solid fa-download"></i>
                      <p>15 Sales</p>
                  </div>

                  <h6 class="my-4">
                    @if ($product->sale_price)
                    <s>{{ $product->regular_price }}</s>
                    @else
                        {{ $product->regular_price }}
                    @endif
                    <span>
                        @if ($product->sale_price)
                            {{$product->sale_price}}
                        @endif
                    </span>
                  </h6>
                  <a class="button" href="{{ route('shop.product.detail', $topSaleProduct->slug ) }}"> View More <i class="fa-solid fa-chevron-right"></i></a>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
@endsection
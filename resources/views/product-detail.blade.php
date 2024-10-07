@extends('layouts.main')
@section('title', 'Product Detail')
@section('bodyClass', 'Product-details')
@section('content')
<div class="first-container container">
    <div class="d-flex">
        <a href="" class="active">Home </a>
        <i class="fa-solid fa-angle-right"></i> <a href=""> Shop</a>
    </div>
    <div class="row">
    <div class="col-lg-5 col-md-6 product-slider">
    <!-- <div class="main-img">
        <img src="{{ asset('uploads/products/' . $product->featured_image ) }}" id="main-image" width="100%">
    </div>
    <div class="d-flex gap-2 thumbnails">
        @php
            $images = explode(',', $product->images);
        @endphp

        @foreach ($images as $key => $image)
            <img src="{{ asset('uploads/products/') . '/' .  $image }}" class="thumbnail" id="thumb-{{ $key }}" width="100%" style="cursor: pointer;">
        @endforeach
    </div> -->
    <div class = "card-wrapper">
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "2">
            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "3">
            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "4">
            <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">
          </a>
        </div>
      </div>
    </div>
    <!-- card right -->
 
  </div>
</div>
</div>
        
          
        <div class="col-lg-7 col-md-6">
            <h3>{{ $product->title }}</h3>
            <div id="reviews" class="d-flex">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                <h6>10 Reviews</h6>
            </div>
            <h1 id="price" class="price">
                @if ($product->sale_price)
                <s>${{ $product->regular_price }}</s> {{ $product->sale_price }}
                @else
                    {{ $product->regular_price }}
                @endif
            </h1>
            <h6 class="d-flex">Availability : <span>{{ $product->stock_status == 'instock' ? 'In stock' : 'Out of Stock' }}</span></h6>
            
            <div class="buy-now d-flex">
                <button>Buy Now</button>
               
            </div>
            <h4>About To Products</h4>
            <p class="aboutToProduct">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</div>

<div class="third-container container">
    <h3>BESTSELLER PRODUCTS</h3>
    <hr />
    <div class="row">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="col-lg-2 col-md-4 ">
               <a href="{{ route('shop.product.detail', $relatedProduct->slug) }}"> <img src="{{ asset('uploads/products/' . $relatedProduct->featured_image) }}" alt="{{ $relatedProduct->featured_image }}" /></a>
                    <h5>Music Instruments</h5>
                <a href="{{ route('shop.product.detail', $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a>
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
</div>
<div class="container-fluid">
    <img src="{{ asset('assets/image/desktop-clients-1.png') }}" alt="" />
</div>
 <script>
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
  </script>
@endsection
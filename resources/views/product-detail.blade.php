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
    <div class = "card-wrapper">
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          @php
              // Explode the images string into an array of image paths
              $images = explode(',', $products->images);
          @endphp
          @foreach ($images as $image)
            <img src = "{{ asset('uploads/products/' . $image) }}" alt = "{{ asset($image) }}">
          @endforeach
        </div>
      </div>
      <div class = "img-select">
        @foreach ($images as $index => $image)
        <div class = "img-item">
          <a href = "#" data-id="{{ $index + 1 }}">
            <img src = "{{ asset('uploads/products/' . $image) }}" alt = "{{ asset($image) }}" style="width: 75px; height:70px">
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <!-- card right -->
 
  </div>
</div>
</div>
        
          
        <div class="col-lg-7 col-md-6">
            <h3>{{ $products->title }}</h3>
            <div id="reviews" class="d-flex">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                <h6>10 Reviews</h6>
            </div>
            <h1 id="price" class="price">
                @if ($products->sale_price)
                <s>${{ $products->regular_price }}</s> {{ $products->sale_price }}
                @else
                    {{ $products->regular_price }}
                @endif
            </h1>
            <h6 class="d-flex">Availability : <span>{{ $products->stock_status == 'instock' ? 'In stock' : 'Out of Stock' }}</span></h6>
            
            <div class="buy-now d-flex">
                <button>Buy Now</button>
               
            </div>
            <h4>About To Products</h4>
            <p class="aboutToProduct">{{ $products->description }}</p>
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
                    @if ($relatedProduct->sale_price)
                    <s>{{ $relatedProduct->regular_price }}</s>
                    @else
                        {{ $relatedProduct->regular_price }}
                    @endif
                    <span>
                        @if ($relatedProduct->sale_price)
                            {{$relatedProduct->sale_price}}
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
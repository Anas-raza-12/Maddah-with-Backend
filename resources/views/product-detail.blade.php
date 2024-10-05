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
            <div class="main-img">
                <img src="{{ asset('uploads/products/' . $product->featured_image ) }}" id="main-image" width="100%">
            </div>
            <div class="d-flex gap-2 thumbnails">
                @php
                    $images = explode(',', $product->images);
                @endphp

                @foreach ($images as $image)
                    <img src="{{ asset('uploads/products/') . '/' .  $image }}" class="thumbnail" id="thumbnail" width="100%">
                @endforeach
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
<!-- <div class="second-container container">
    {{-- <div class="d-flex">
        <h4><a href="/">Description </a></h4>
        <h4><a href="/">Additional Information</a></h4>
        <h4>
            <a href="/">Reviews <span id="review">(0) </span> </a>
        </h4>
    </div> --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 "><img src="{{ asset('uploads/products/' . $product->featured_image) }}" alt="" style="width:500px; height:500px;"/></div>
        <div class="col-lg-6 col-md-6 d-flex">
            <div>
                <h3>About the Product</h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        {{-- <div class="col-lg-4 col-md-6 d-flex">
            <div>
                <h3>Features</h3>

                <p id="Feature"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Feature"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Feature"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Feature"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <h3>Quality</h3>
                <p id="Quality"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Quality"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Quality"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
                <p id="Quality"><i class="fa-solid fa-angle-right"></i>the quick fox jumps over the lazy dog</p>
            </div>
        </div> --}}
    </div>
</div> -->
<div class="third-container container">
    <h3>BESTSELLER PRODUCTS</h3>
    <hr />
    <div class="row">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="col-lg-2 col-md-4 ">
                <img src="{{ asset('uploads/products/' . $relatedProduct->featured_image) }}" alt="{{ $relatedProduct->featured_image }}" />
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
{{-- <script>
    const a0 = '../image/carousel-inner.png'; 
  const a1 = '../image/carousel-inner.png'; 
        const a2 = '../image/20 1.png'; 
        const a3 = '../image/16 1.png'; 
        const a4 = '../image/2 1.png'; 

      
        const image = document.getElementById("main-image");
        const thumbnail = document.getElementById("thumbnail");

        const thumbnail1 = document.getElementById("thumbnail1");
        const thumbnail2 = document.getElementById("thumbnail2");
        const thumbnail3 = document.getElementById("thumbnail3");

        image.src = a0; 

        thumbnail.src = a1; 
        thumbnail1.src = a2; 
        thumbnail2.src = a3; 
        thumbnail3.src = a4; 
        
        thumbnail.addEventListener('click', () => {
            image.src = a1;
        });
        thumbnail1.addEventListener('click', () => {
            image.src = a2;
        });
        thumbnail2.addEventListener('click', () => {
            image.src = a3;
        });
        thumbnail3.addEventListener('click', () => {
            image.src = a4;
        });
</script> --}}
@endsection
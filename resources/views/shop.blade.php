@extends('layouts.main')
@section('title', 'Shop')
@section('bodyClass', 'Shop')
@section('content')


<div class="first-container container">
    <div class="d-flex my-4">
        <h1>Shop</h1>
        <div class="d-flex">
            <a href="{{ route('home') }}" class="active">Home </a>
            <i class="fa-solid fa-angle-right"></i> <a href="{{ route('shop') }}"> Shop</a>
        </div>
    </div>
    <div  class="row categories-main ">
        @foreach ($categories as $category)
           
               <div data-aos="zoom-in" data-aos-duration="1000" class="col-lg-2  col-md-3 col-sm-4 bd">
                
            <div style="background-Image:url('{{ asset('uploads/categories/' . $category->image ) }}');" class="categories">

          <div>
          <a href="" class="position-absolute">
                    <h6>{{ $category->name }}</h6>
                    <p>
                        @if ($category->products_count > 0)
                            {{ $category->products_count }} item
                        @else
                            0 item
                        @endif
                    </p>
                </a>

          </div>
            </div>
               </div> 
        @endforeach
    </div>
</div>
<div class="second-container container text-center">
    <h5>
        Featured Products
    </h5>
    <h3>ALL PRODUCTS</h3>
    <p>Browse our complete range of products</p>
    <div class="row mt-5">
        @foreach ($products as $product)
            <div data-aos="zoom-in" data-aos-duration="1000" class="col-lg-2 col-md-4 col-sm-5">
                <a href="{{ route('shop.product.detail', $product->slug) }}">
                    <img src="{{ asset('uploads/products/' . $product->featured_image )}}" alt="{{ $product->featured_image }}" />
                <h4>Music Instruments</h4>
                <a href="{{ route('shop.product.detail', $product->slug) }}">{{ $product->title }}
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
                </a>
            </div>
        @endforeach
    </div>
        {{ $products->links('pagination::bootstrap-5') }}
</div>
<div data-aos="zoom-in" data-aos-duration="1000" class="container-fluid">
  <img src="{{ asset('assets/image/desktop-clients-1.png') }}" alt="">
</div>



@endsection
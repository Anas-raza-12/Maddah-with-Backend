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
                      MADDAH <br />
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
      <div class="col-lg-5 col-sm-12 position-relative first-img">
          <div class="position-absolute">
              <h2>
                  Top Product Of <br />
                  the Week
              </h2>
              <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
          </div>
      </div>
      <div class="col-lg-5 row">
          <div class="col-lg-12 position-relative second-img">
              <div class="position-absolute">
                  <h2>Top Product Of the Week</h2>
                  <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
              </div>
          </div>
          <div class="col-lg-12 position-relative third-img">
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

  <div class="row item mb-4 ">
    @foreach ($saleproducts as $product)
        <div class="col-lg-2 col-md-3 p-0">
            <div style="border-radius: 5px; overflow: hidden;" class="position-relative rounded p-0">
                <a href="{{ route('shop.product.detail', $product->slug) }}">
                    <img
                        width="100%" height="300px"
                        src="{{ asset('uploads/products/' . $product->featured_image ) }}"
                        alt="{{ $product->featured_image }}"
                    />
                </a>
        
                @php
                    $cart = Session::get('cart', []);
                    $discountPercentage = null;
        
                    if ($product->sale_price) {
                        $discountPercentage = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
                    }
                @endphp
                
                <form class="addCart-btn" id="addToCartForm">
                    @if (array_key_exists($product->id, $cart))
                        <a href="{{ route('cart.view') }}" class="addToCart"><i class="fa-regular fa-eye"></i> View Cart</a>
                    @else
                        <button type="button" id="addToCart" class="addToCart" data-id="{{ $product->id }}" data-name="{{ $product->title }}" data-price="@if ($product->sale_price) {{$product->sale_price}} @else {{$product->regular_price}} @endif" data-regular-price="{{ $product->regular_price }}" data-sale-price="{{ $product->sale_price }}" data-image="{{ $product->featured_image }}">
                            <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                        </button>
                    @endif
                </form>
        
                <!-- Show Discount Percentage if applicable -->
                <div style="position: absolute;">
                    @if($discountPercentage)
                        <p class="rounded" style="background: #319441; color: #fff;">-{{ $discountPercentage }}%</p>
                    @else
                        <p class="rounded" style="background: #db4444; color: #fff;">-0%</p>
                    @endif
                    @if (Auth::check())
                    <a href="javascript:void(0);" class="wishlist-btn {{ $product->is_in_wishlist ? 'added' : '' }}" data-id="{{ $product->id }}">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="wishlist-btn">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    @endif                  
                </div>
            </div>
            <div class="title">{{ $product->title }}</div>
            <div class="prices">
                @if ($product->sale_price)
                    <span>
                        <s>${{ $product->regular_price }}</s>
                    </span>
                @else
                    <span>
                        ${{ $product->regular_price }}
                    </span>
                @endif
                @if ($product->sale_price)
                    ${{$product->sale_price}}
                @endif
            </div>
            <div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
        </div>
    @endforeach
  </div>
  <a class="mt-5" href="{{ route('shop') }}"> View More Products</a>
</div>
<div class="forth-container container">
  <div class="row">
      <div  class="col-lg-6 row d-flex">
          <div class="col-lg-6 col-md-6 col-sm-6"><img src="{{ asset('assets/image/36 2.png') }}" alt="" /></div>
          <div class="col-lg-6 col-md-6 col-sm-6"><img src="{{ asset('assets/image/54 4.png') }}" alt="" /></div>
      </div>
      <div class="col-lg-6 d-flex my-3">
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
      <div class="col-lg-3 col-md-6 col-sm">
          <img src="{{ asset('assets/image/bx_bxs-book-reader.png') }}" alt="" />
          <h4>Easy Wins</h4>
          <p>
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra
          </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm">
          <img src="{{ asset('assets/image/icon cool-icon-153.svg') }}" alt="" />
          <h4>Easy Wins</h4>
          <p>
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra
          </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm">
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
  <div class="row mt-5">
      @foreach ($topSaleProducts as $topSaleProduct)
          <div class="col-lg-6 col-md-12 my-3 row">
          <div class="col-lg-4 col-md-4 position-relative">
              <a href="{{ route('shop.product.detail', $topSaleProduct->slug) }}">
              <img width="100%" height="350px" src="{{ asset('uploads/products/' . $topSaleProduct->featured_image )}}" alt="" />
              </a>
              <div class="sale position-absolute">Sale</div>
              <div class="icon position-absolute">
              </div>
          </div>
          <div class="col-lg-8 col-md-8 d-flex">
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
                  <div style="width: 80px !important;" class="d-flex sale">
                      <i class="fa-solid fa-download"></i>
                      <p>15 Sales</p>
                  </div>

                  <h6 class="my-4">
                    @if ($product->sale_price)
                    <s>${{ $product->regular_price }}</s>
                    @else
                        ${{ $product->regular_price }}
                    @endif
                    <span>
                        @if ($product->sale_price)
                            ${{$product->sale_price}}
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.querySelectorAll('#addToCart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            const productRegularPrice = this.getAttribute('data-regular-price');
            const productSalePrice = this.getAttribute('data-sale-price');
            const productImage = this.getAttribute('data-image');

            axios.post('/cart/add', {
                id: productId,
                name: productName,
                price: productPrice,
                regularPrice: productRegularPrice,
                salePrice: productSalePrice,
                image: productImage
            }).then(response => {
                alert('Product added to cart!');
                // Optionally, reload the page to reflect the cart status
                location.reload(); // Uncomment if you want to refresh the page
            }).catch(error => {
                console.error('Error adding product to cart:', error);
            });
        });
    });

    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function() {
            const productId = this.dataset.id;
            const newQuantity = this.value;

            axios.post('/cart/update', { id: productId, quantity: newQuantity })
                .then(response => updateCartAndFinalPrice());
        });
    });
</script>
<script>
    document.querySelectorAll('.wishlist-btn').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const isAdded = this.classList.contains('added');  // Check if it's already added

        // Determine the action (add or remove from wishlist)
        const url = isAdded ? '/wishlist/remove' : '/wishlist/add';
        const method = isAdded ? 'DELETE' : 'POST';  // DELETE for removal, POST for adding

        axios({
            method: method,
            url: url,
            data: { product_id: productId }
        })
        .then(response => {
            // Toggle the button class based on the action
            this.classList.toggle('added');
            alert(response.data.message);

            // Update the wishlist count dynamically
            document.getElementById('wishlistCountNumber').textContent = response.data.newWishlistCount;
        })
        .catch(error => {
            if (error.response && error.response.status === 401) {
                alert('Please log in to add/remove items from your wishlist.');
            } else {
                console.error('Error toggling wishlist:', error);
            }
        });
    });
});

</script>
@endsection
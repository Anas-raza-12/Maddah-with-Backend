@extends('layouts.main')
@section('title', 'Shop')
@section('bodyClass', 'Shop')
@section('content')


<div class="first-container container">
    <div class="container d-flex my-4">
        <h1>Shop</h1>
        <div class="d-flex">
            <a href="{{ route('home') }}" class="active">Home </a>
            <i class="fa-solid fa-angle-right"></i> <a href="{{ route('shop') }}"> Shop</a>
            <i class="fa-solid fa-angle-right"></i>
            
        </div>
    </div>
    <div  class="row categories-main  category-section-2 my-5 ">
        @foreach ($categories as $category)
           
               <div class="col-lg-2  col-md-3 col-sm-4 bd">
                
            <div style="background-Image:url('{{ asset('uploads/categories/' . $category->image ) }}');" class="categories">

          <div>
          <a href="{{ route('category.filter', $category->slug) }}" class="position-absolute">
                    <h6>{{ $category->name }}</h6>
                    <p style="font-family: Montserrat">
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
    <a class="view-more" style="border: 2px solid #8B4513; margin:2vh auto;" href="{{ route('category') }}" class="m-4">View More Categories <i class="fa-solid fa-arrow-right mx-2 my-0 p-0"></i></a>
</div>
<div class="second-container container text-center">
   
    <h4>
        Featured Products
    </h4>
    <h2>ALL PRODUCTS</h2>
    <p>Browse our complete range of products</p>
    <div class="row mt-5 item ">
        @foreach ($products as $product)
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
         
                <div style="position: absolute;">
                    @if($discountPercentage)
                        <p class="rounded" style="background: #319441; color: #fff;">-{{ $discountPercentage }}%</p>
                    @else
                        <p class="rounded" style="background: #db4444; color: #fff;">-0%</p>
                    @endif
                    <a href="javascript:void(0);" class="wishlist-btn {{ $product->is_in_wishlist ? 'added' : '' }}" data-id="{{ $product->id }}">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="title">{{ $product->title }}</div>
            <div class="prices">
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
            </div>
            <div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
        </div>
        @endforeach
    </div>
        {{ $products->links('pagination::bootstrap-5') }}
</div>
{{-- <div class="container mb-5">
  <img width="100%" src="{{ asset('assets/image/row.png') }}" alt="">
</div> --}}
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

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
							<img  src = "{{ asset('uploads/products/' . $image) }}" alt = "{{ asset($image) }}">
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
		<div>
			<h3>{{ $products->title }}</h3>
			<div id="reviews" class="d-flex">
				<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
				<h6>10 Reviews</h6>
			</div>
			<h1 id="price" class="price">
				@if ($products->sale_price)
				<s>${{ $products->regular_price }}</s> ${{ $products->sale_price }}
				@else
				${{ $products->regular_price }}
				@endif
			</h1>
			<h6 class="d-flex">Availability : <span>{{ $products->stock_status == 'instock' ? 'In stock' : 'Out of Stock' }}</span></h6>
			
			<h4>About To Products</h4>
			<p style="font-family:Montserrat;" class="aboutToProduct">{{ $products->description }}</p>
      <hr>
      <div class="buy-now d-flex justify-content-start">
				<form class="d-flex justify-content-between" action="">
          {{-- < button>Add To Cart</> --}}
           <a href>View cart</a>
            </form> 
        
        <a hraf="" class=" "><i class="fa-regular fa-heart"></i></a>
       
			</div>
		</div>
	</div>
</div>
</div>  
<div class="third-container container">
	<h3>BESTSELLER PRODUCTS</h3>
	<hr />
	<div class="row">
		@foreach ($relatedProducts as $relatedProduct)
		<div style="position: relative" class="col-lg-2 col-md-4 ">
			<a href="{{ route('shop.product.detail', $relatedProduct->slug) }}"> <img width="100%" src="{{ asset('uploads/products/' . $relatedProduct->featured_image) }}" alt="{{ $relatedProduct->featured_image }}" /></a>
			
			<a class="mt-3" href="{{ route('shop.product.detail', $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a>
			<h6>
				@if ($relatedProduct->sale_price)
				<s>${{ $relatedProduct->regular_price }}</s>
				@else
				${{ $relatedProduct->regular_price }}
				@endif
				<span>
				@if ($relatedProduct->sale_price)
				${{$relatedProduct->sale_price}}
				@endif
				</span>
			</h6>
			@php
				$cart = Session::get('cart', []);
				$discountPercentage = null;
	
				if ($relatedProduct->sale_price) {
					$discountPercentage = round((($relatedProduct->regular_price - $relatedProduct->sale_price) / $relatedProduct->regular_price) * 100);
				}
			@endphp
			<form class="addCart-btn" id="addToCartForm">
				@if (array_key_exists($relatedProduct->id, $cart))
					<a  href="{{ route('cart.view') }}" class="addToCart"><i class="fa-regular fa-eye"></i> View Cart</a>
				@else
					<button type="button" id="addToCart" class="addToCart" data-id="{{ $relatedProduct->id }}" data-name="{{ $relatedProduct->title }}" data-price="@if ($relatedProduct->sale_price) {{$relatedProduct->sale_price}} @else {{$relatedProduct->regular_price}} @endif" data-regular-price="{{ $relatedProduct->regular_price }}" data-sale-price="{{ $relatedProduct->sale_price }}" data-image="{{ $relatedProduct->featured_image }}">
						<i class="fa-solid fa-cart-shopping"></i> Add To Cart
					</button>
				@endif
			</form>

      <div  style="position: absolute; margin:5px; ">
        @if($discountPercentage)
            <p class="rounded" style="background: #319441; color: #fff;">-{{$discountPercentage}}%</p>
        @else
            <p class="rounded" style="background: #db4444; color: #fff;">0%</p>
        @endif
        <a href="javascript:void(0);" class="wishlist-btn {{ $relatedProduct->is_in_wishlist ? 'added' : '' }}" data-id="{{ $relatedProduct->id }}">
            <i class="fa-regular fa-heart"></i>
        </a>                   
    </div>
	<div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
		</div>
		@endforeach
	</div>
</div>
<div class="container">
	<img width="100%" src="{{ asset('assets/image/row.png') }}" alt="" />
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
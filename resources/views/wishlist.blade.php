@extends('layouts.main') @section('title', 'Wishlist') @section('bodyClass', 'wishlist m-0') @section('content')
<div class="first-container container my-4">
    <div class="d-flex wishlist">
        <h2>Wishlist <span>({{ $wishlistCount }})</span></h2>
        {{-- <a href="javascript:void(0);" id="moveAllToCart">Move All To Bag</a> --}}
    </div>

    <div class="row item mb-4">
        @if($wishlistItems->isEmpty())
        <div style="width:100vw;  " class="alert alert-warning ">
            No items found in your wishlist.
        </div>
        @else @foreach ($wishlistItems as $item)
        <div class="col-lg-2 col-md-3 p-0 text-center">
            <div style="border-radius: 5px; overflow: hidden;" class="position-relative rounded p-0">
                <a href="{{ route('shop.product.detail', $item->product->slug) }}">
                    <img width="100%" height="300px" src="{{ asset('uploads/products/' . $item->product->featured_image ) }}" alt="{{ $item->product->featured_image }}" />
                </a>

                @php $cart = Session::get('cart', []); $discountPercentage = null; if ($item->product->sale_price) { $discountPercentage = round((($item->product->regular_price - $item->product->sale_price) / $item->product->regular_price)
                * 100); } @endphp

                <form class="addCart-btn" id="addToCartForm">
                    @if (array_key_exists($item->product->id, $cart))
                    <a href="{{ route('cart.view') }}" class="addToCart"><i class="fa-regular fa-eye"></i> View Cart</a>
                    @else
                    <button
                        type="button"
                        id="addToCart"
                        class="addToCart"
                        data-id="{{ $item->product->id }}"
                        data-name="{{ $item->product->title }}"
                        data-price="@if ($item->product->sale_price) {{$item->product->sale_price}} @else {{$item->product->regular_price}} @endif"
                        data-regular-price="{{ $item->product->regular_price }}"
                        data-sale-price="{{ $item->product->sale_price }}"
                        data-image="{{ $item->product->featured_image }}"
                    >
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
                    <a href="javascript:void(0);" class="wishlist-btn {{ $item->product->is_in_wishlist ? 'added' : '' }}" data-id="{{ $item->product->id }}">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="title">{{ $item->product->title }}</div>
            <div class="prices">
                @if ($item->product->sale_price)
                <s>{{ $item->product->regular_price }}</s>
                @else {{ $item->product->regular_price }} @endif
                <span>
                    @if ($item->product->sale_price) {{$item->product->sale_price}} @endif
                </span>
            </div>
            <div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
        </div>
        @endforeach @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelectorAll("#addToCart").forEach((button) => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");
                const productName = this.getAttribute("data-name");
                const productPrice = this.getAttribute("data-price");
                const productRegularPrice = this.getAttribute("data-regular-price");
                const productSalePrice = this.getAttribute("data-sale-price");
                const productImage = this.getAttribute("data-image");

                axios
                    .post("/cart/add", {
                        id: productId,
                        name: productName,
                        price: productPrice,
                        regularPrice: productRegularPrice,
                        salePrice: productSalePrice,
                        image: productImage,
                    })
                    .then((response) => {
                        alert("Product added to cart!");
                        // Optionally, reload the page to reflect the cart status
                        location.reload(); // Uncomment if you want to refresh the page
                    })
                    .catch((error) => {
                        console.error("Error adding product to cart:", error);
                    });
            });
        });

        document.querySelectorAll(".quantity").forEach((input) => {
            input.addEventListener("input", function () {
                const productId = this.dataset.id;
                const newQuantity = this.value;

                axios.post("/cart/update", { id: productId, quantity: newQuantity }).then((response) => updateCartAndFinalPrice());
            });
        });
    </script>
    <script>
        document.querySelectorAll(".wishlist-btn").forEach((button) => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");
                const isAdded = this.classList.contains("added"); // Check if it's already added

                // Determine the action (add or remove from wishlist)
                const url = isAdded ? "/wishlist/remove" : "/wishlist/add";
                const method = isAdded ? "DELETE" : "POST"; // DELETE for removal, POST for adding

                axios({
                    method: method,
                    url: url,
                    data: { product_id: productId },
                })
                    .then((response) => {
                        // Toggle the button class based on the action
                        this.classList.toggle("added");
                        alert(isAdded ? "Product removed from wishlist!" : "Product added to wishlist!");
                    })
                    .catch((error) => {
                        if (error.response && error.response.status === 401) {
                            alert("Please log in to add/remove items from your wishlist.");
                        } else {
                            console.error("Error toggling wishlist:", error);
                        }
                    });
            });
        });

        document.getElementById("moveAllToCart").addEventListener("click", function () {
            // Confirm if the user wants to move all items to the cart
            if (confirm("Are you sure you want to move all items to your cart?")) {
                axios
                    .post("/wishlist/move-to-cart")
                    .then((response) => {
                        // You can refresh the page or update the UI to show that the items are moved to cart
                        alert("All items have been moved to your cart!");
                        location.reload(); // Or update the cart UI without reloading
                    })
                    .catch((error) => {
                        console.error("Error moving items to cart:", error);
                    });
            }
        });
    </script>
   
</div>
@endsection

@extends('layouts.main')
@section('title', 'Cart')
@section('bodyClass', 'cart')
@section('content')

<div class="links container d-flex">
    <a class="disable" href="">Home</a> /
    <a class="Active" href="">Cart View</a>
</div>
<form action="{{ route('checkout') }}" method="POST" id="checkout-form">
@csrf
<div class="first-container container">
    <div class="row">
        <div class="col-lg-3"><h3>Product</h3></div>
        <div class="col-lg-3"><h3>Price</h3></div>
        <div class="col-lg-3"><h3>Quantity</h3></div>
        <div class="col-lg-3"><h3>Total</h3></div>
    </div>

    @if(empty($cart))
    <div class="alert alert-warning">
        Your cart is empty. Please add items to your cart.
    </div>
    @else
        @foreach($cart as $item)
            <div class="row product-item position-relative">
                <div class="col-lg-3"><img src="{{ asset('uploads/products'). '/' . $item['image'] }}" alt="{{ $item['image'] }}" /></div>
                <div class="col-lg-3"><p class="price">${{ $item['price'] }}</p></div>
                <div class="col-lg-3">
                    <input type="number" name="quantity[{{ $item['id'] }}]" class="quantity" data-id="{{ $item['id'] }}" value="{{ $item['quantity'] }}" min="1" />
                </div>
                <div class="col-lg-3">
                    <p class="total-price">${{ $item['price'] * $item['quantity'] }}</p>
                </div>
                <div class="close position-absolute" data-id="{{ $item['id'] }}">Remove</div>
            </div>
        @endforeach
    @endif
    <div class="d-flex"><a href="{{ route('shop') }}">Return To Shop</a></div>
</div>

<div class="second-container container my-4">   
    <input type="hidden" name="total_quantity" id="total-quantity-input" value="0">
    <input type="hidden" name="subtotal" id="subtotal-input" value="0">
    <div class="row">
        <div class="col-lg-7 col-md-7">
        </div>
        <div class="col-lg-5 col-md-5 cart-total my-5">
            <h4>Cart Total</h4>
            <div class="d-flex"><h6>Subtotal:</h6> <h6 class="card-total-price">0</h6></div>
            <hr />
            <div class="d-flex"><h6>Shipping:</h6> <h6 class="Shipment">0</h6></div>
            <hr />
            <div class="d-flex mb-3"><h6>Total:</h6> <h6 class="final-price">$0</h6></div>
            @if (Auth::check())
                <button type="button" id="checkout-button">Proceed to checkout</button>
            @else
                <a href="{{ route('login') }}">Login to checkout</a>
            @endif
        </div>
    </div>   
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const productItems = document.querySelectorAll(".product-item");
    const cartTotalPriceElement = document.querySelector(".card-total-price");
    const finalPriceElement = document.querySelector(".final-price");
    const shipmentElement = document.querySelector(".Shipment");
    const subtotalInput = document.getElementById("subtotal-input");
    const totalQuantityInput = document.getElementById("total-quantity-input");
    const checkoutButton = document.getElementById("checkout-button");

    function calculateCartTotal() {
        let cartTotal = 0;

        productItems.forEach((item) => {
            let priceElement = item.querySelector(".price");
            let totalPriceElement = item.querySelector(".total-price");
            let quantityInput = item.querySelector(".quantity");

            let priceText = priceElement.textContent;
            let price = parseFloat(priceText.replace("$", ""));
            let quantity = parseInt(quantityInput.value);

            let total = price * quantity;
            totalPriceElement.textContent = `$${total.toFixed(2)}`;
            cartTotal += total;
        });

        return cartTotal;
    }

    function calculateTotalQuantity() {
        let totalQuantity = 0;

        productItems.forEach((item) => {
            let quantityInput = item.querySelector(".quantity");
            let quantity = parseInt(quantityInput.value) || 0;
            totalQuantity += quantity;
        });

        totalQuantityInput.value = totalQuantity;
    }

    function updateCartAndFinalPrice() {
        let cartTotal = calculateCartTotal();
        calculateTotalQuantity();
        let shipmentPrice = parseFloat(shipmentElement.textContent);

        if (productItems.length > 0) {
            cartTotalPriceElement.textContent = `$${cartTotal.toFixed(2)}`;
            finalPriceElement.textContent = `$${(cartTotal + shipmentPrice).toFixed(2)}`;
        } else {
            cartTotalPriceElement.textContent = `$0.00`;
            finalPriceElement.textContent = `$0.00`;
        }

        subtotalInput.value = cartTotal.toFixed(2);
    }

    productItems.forEach((item) => {
        let quantityInput = item.querySelector(".quantity");

        quantityInput.addEventListener("input", function () {
            let quantity = parseInt(quantityInput.value);
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                quantityInput.value = 1;
            }

            updateCartAndFinalPrice();
        });

        let removeButton = item.querySelector(".close");
        removeButton.addEventListener("click", function () {
            const productId = this.getAttribute('data-id');

            axios.post('/cart/remove', { id: productId })
                .then(response => {
                    alert('Product removed from cart!');
                    item.remove();
                    location.reload();
                    updateCartAndFinalPrice();
                })
                .catch(error => {
                    console.error('Error removing product from cart:', error);
                });
        });
    });

    // Check if checkoutButton exists before adding the event listener
    if (checkoutButton) {
        checkoutButton.addEventListener("click", function () {
            document.getElementById("checkout-form").submit();
        });
    }

    updateCartAndFinalPrice();
});
</script>
@endsection
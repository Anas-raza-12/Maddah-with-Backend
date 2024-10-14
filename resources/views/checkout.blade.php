@extends('layouts.main') @section('title', 'Cart') @section('bodyClass', 'cart') @section('content')

<div class="links container d-flex">
    <a class="disable" href="">Home</a> /
    <a class="Active" href="">Cart View</a>
</div>

<div class="first-container container">
    <div class="row">
        <div class="col-lg-3"><h3>Product</h3></div>
        <div class="col-lg-3"><h3>Price</h3></div>
        <div class="col-lg-3"><h3>Quantity</h3></div>
        <div class="col-lg-3">
            <h3>Total</h3>
        </div>
    </div>

    <div class="row product-item position-relative">
        <div class="col-lg-3"><img src="https://i0.wp.com/picjumbo.com/wp-content/uploads/silhouette-of-a-guy-with-a-cap-at-red-sky-sunset-free-image.jpeg?h=800&quality=80" alt="product image" /></div>
        <div class="col-lg-3"><p class="price">$60</p></div>
        <div class="col-lg-3"><input type="number" placeholder="01" class="quantity" value="1" min="1" /></div>
        <div class="col-lg-3"><p class="total-price">$60</p></div>
        <div class="close position-absolute">Remove </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const productItems = document.querySelectorAll(".product-item");

    productItems.forEach((item) => {
        let priceElement = item.querySelector(".price");
        let quantityInput = item.querySelector(".quantity");
        let totalPriceElement = item.querySelector(".total-price");

        let priceText = priceElement.textContent;
        let price = parseFloat(priceText.replace("$", ""));

        quantityInput.addEventListener("input", function () {
            let quantity = parseInt(quantityInput.value);
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
            }

            let total = price * quantity;
            totalPriceElement.textContent = ` $${total.toFixed(2)}`;
        });
    });
</script>

@endsection

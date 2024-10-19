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
        <div class="col-lg-3"><p class="total-price">$0</p></div>
        <div class="close position-absolute">Remove</div>
    </div>
    <div class="row product-item position-relative">
        <div class="col-lg-3"><img src="https://i0.wp.com/picjumbo.com/wp-content/uploads/silhouette-of-a-guy-with-a-cap-at-red-sky-sunset-free-image.jpeg?h=800&quality=80" alt="product image" /></div>
        <div class="col-lg-3"><p class="price">$60</p></div>
        <div class="col-lg-3"><input type="number" placeholder="01" class="quantity" value="1" min="1" /></div>
        <div class="col-lg-3"><p class="total-price">$0</p></div>
        <div class="close position-absolute">Remove</div>
    </div>
    <div class="d-flex"><button>Return To Shop</button> <button>Update Cart</button></div>
</div>
<div class="second-container container my-4">
    <div class="row">
        <div class="col-lg-7 col-md-7">
            <input type="text" name="" id="" placeholder="Coupon Code" />
            <button>Apply Coupon</button>
        </div>
        <div class="col-lg-5 col-md-5 cart-total">
            <h4>Cart Total</h4>
            <div class="d-flex"><h6>Subtotal:</h6  > <h6 class="card-total-price"></h6></div>
            <hr />
            <div class="d-flex"><h6>Shipping:</h6>  <h6 class="Shipment"> 000</h6></div>
            <hr />
            <div class="d-flex"><h6>Total:</h6>  <h6 class="final-price">$1750</h6></div>
            <button>Procees to checkout</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const productItems = document.querySelectorAll(".product-item");
    const cartTotalPriceElement = document.querySelector(".card-total-price"); 
    const finalPriceElement = document.querySelector(".final-price");
    const shipmentElement = document.querySelector(".Shipment");

   
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

    
    function updateCartAndFinalPrice() {
        let cartTotal = calculateCartTotal();
        let shipmentPrice = parseFloat(shipmentElement.textContent);

        cartTotalPriceElement.textContent = `$${cartTotal.toFixed(2)}`;         
        finalPriceElement.textContent = `$${(cartTotal + shipmentPrice).toFixed(2)}`; 
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
    });

   
    updateCartAndFinalPrice();
</script>



@endsection

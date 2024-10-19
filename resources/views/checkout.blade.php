@extends('layouts.main') @section('title', 'checkOut') @section('bodyClass', 'checkOut') @section('content')

<div class="links container d-flex">
    <a class="disable" href="">Account</a> / <a class="disable" href="">My Account </a> / <a class="disable" href="">Product </a> / <a class="disable" href="">View Cart </a> /
    <a class="Active" href="">CheckOut </a>
</div>
<div class="first-container container">
    <h1>Billing Details</h1>
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <form action="">
                <label require for="name">First name </label> <br />
                <input type="text" id="name" /> <br />
                <label for="company-name">Company Nmae </label> <br />
                <input type="text " id="Comany-name" /> <br />
                <label for="address">Street Address</label> <br />
                <input type="text" name="address" id=" address" />
                <br />
                <label for="">Apartment, floor, etc. (optional)</label> <br />
                <input type="text" /><br />
                <label for="">Town/City</label> <br />
                <input type="text" />
                <br />
                <label for="">Phone Number</label> <br />
                <input type="number" /> <br />
                <label for="Email">Email</label><br />
                <input type="email" />
                <br />
                <div><input type="checkbox" checked="checked" /><span>Save this information for faster check-out next time</span></div>
            </form>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5 col-md-5">
            <div class="d-flex justify-content-between items">
                <div class="d-flex justify-content-between gap-5">
                    <img
                        src="https://s3-alpha-sig.figma.com/img/9f96/b228/6b9fbc941951ddb73c8acc74e97026ad?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=SgsqWsvXhn2XCwiieP2RF6opYxY4Dw7q8TO7UFaVi99Lnz8GYT-7AsFcC99qUoyifaYDxd9cje89YtbA8BK2~0FShSKZaxn3LtzFJ0cy6TStiN7VW~zX1VqQ2z18acCvmL6dBypsvmk3xcJFpv78mHhW~hvwzRrtYm~~oZw3MOcuLEhDCuwcsQtEBqPDoSvGEAlf2ebX6NPXP8zvmCBo0A3IFOHgT0sPx~1JnjyN4VuQyCtuBvR7syHCa1tiuP9Hk4vUTBvf8WZtqHWVCDB5QCJzDkfXWm7MwqR2bBsA739j9qsmRXK35gDTGTUELemS1D5qoM2p7PRLmbeUJW08HA__"
                        alt="2"
                    />
                    <h5>Drum music</h5>
                </div>
                <div class="price">$650</div>
            </div>
            <div class="d-flex justify-content-between items">
                <div class="d-flex justify-content-between gap-5">
                    <img
                        src="https://s3-alpha-sig.figma.com/img/9f96/b228/6b9fbc941951ddb73c8acc74e97026ad?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=SgsqWsvXhn2XCwiieP2RF6opYxY4Dw7q8TO7UFaVi99Lnz8GYT-7AsFcC99qUoyifaYDxd9cje89YtbA8BK2~0FShSKZaxn3LtzFJ0cy6TStiN7VW~zX1VqQ2z18acCvmL6dBypsvmk3xcJFpv78mHhW~hvwzRrtYm~~oZw3MOcuLEhDCuwcsQtEBqPDoSvGEAlf2ebX6NPXP8zvmCBo0A3IFOHgT0sPx~1JnjyN4VuQyCtuBvR7syHCa1tiuP9Hk4vUTBvf8WZtqHWVCDB5QCJzDkfXWm7MwqR2bBsA739j9qsmRXK35gDTGTUELemS1D5qoM2p7PRLmbeUJW08HA__"
                        alt="2"
                    />
                    <h5>Drum music</h5>
                </div>
                <div class="price">$750</div>
            </div>
            <div class="payment-section">
                <div class="d-flex justify-content-between">
                    <p>Subtotal:</p>
                    <div class="Sub-price">$0</div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <p>Shipping:</p>
                    <div class="shipping">$100</div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <p>Total:</p>
                    <div class="Final-price">$0</div>
                </div>
            </div>
            <form class="payment-method">
                <div class="d-flex">
                    <div class="d-flex">
                        <input type="radio" id="payment-method1" name="payment-method" />
                        <p>Bank</p>
                    </div>
                    <div class="image">
                        <img
                            src="https://s3-alpha-sig.figma.com/img/cfb0/a6ee/01b240273b40dab07f8246ef98aed88a?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=IJGMujuZrchE8D51Wl6Mtfm6zD8duj-6dYvSvqjK691fssSxGm8eUZEYJWZxWJR-4MUg85oZJr1MBQuoZrBuq6MH6uFRli5ygrhlx~9Lr538lshrAlMN3o~26WcG6OZTrPIykpbkLKupsH6YG4BUTrSdr61j5PWhvzqZDiO2lZoqy1iwVUrNZtZExlnE3yDxD38j~q4hm5~i8fnXuFUk9~uTEYlkbRQ7sOdovwFQ2qbsofme6gLwn5ZlPVhZ61A8TtInp8EacJwdaksfzQcsUPhPk4g4aCN--LdEZDASDyR4ZnFVyeH9kRhsrO5NvlVQOqamLQ1B6NxgtADSqC33jw__"
                            alt=""
                        />
                        <img
                            src="https://s3-alpha-sig.figma.com/img/6eef/b61d/27c754abac218d25d8ea4360de61f8e8?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=atlmvDnQpz6A6PyQS1PZQmL3vBgYyYNF2M9J6vNktTwGWoz0rn1LfLvn2NaMfw-pC22h34O3AJEwVDzOlecrjH-F2Jm2qECC9BqxPcbqwTgOk4w4AYatjUw-qLx8CLhz9WSQRfZ00ulaQBe1icdGHq7HEauM4QVUHzvOHmoSfAjKa6gSyZWn391JCk0o1d9VYRNSFBK39ci2blyosZnDPao5q7RfooBlHYda0tUim5JqOhYHK4-dnjHfkEXTKjIlFiSKJVmKDgVEDd4EhqTIA-dBHjxrGSZNF4AdpIvT116CwBtygV5iH4U6rcgPrRg5Kji9Vn-wenMu2bjFC4iEuw__"
                            alt=""
                        />
                    </div>
                </div>
                <hr />
                <div class="d-flex">
                    <div class="d-flex">
                        <input type="radio" id="payment-method2" name="payment-method" />
                        <p>Cash on delivery</p>
                    </div>
                </div>
            </form>
            <form action="" class="Coupen-Code d-flex">
                <input type="text " placeholder="Coupen Code" > <button type="submite">Apply Coupon</button> <br>
         
            </form>
            <button class="Place-Order">Place Order</button>

        </div>
    </div>
</div>
<script>
    function calculateTotal() {
        let prices = document.querySelectorAll(".price");
        let subTotal = 0;

        prices.forEach(function (price) {
            let priceValue = parseFloat(price.innerText.replace("$", ""));
            subTotal += priceValue;
        });

        document.querySelector(".Sub-price").innerText = `$${subTotal}`;

        let shippingValue = parseFloat(document.querySelector(".shipping").innerText.replace("$", ""));

        let finalTotal = subTotal + shippingValue;

        document.querySelector(".Final-price").innerText = `$${finalTotal}`;
    }

    window.onload = calculateTotal;
</script>
@endsection

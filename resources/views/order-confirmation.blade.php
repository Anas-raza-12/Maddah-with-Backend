@extends('layouts.main')
@section('title', 'order-confirmation')
@section('bodyClass', 'orderConfirmation')

@section('content')
<div class="container first-container">
    <div data-aos="zoom-in" class="check-icon">
        <i class="fa-solid fa-circle-check"></i>
    </div>
    <h1 data-aos="zoom-in" data-aos-duration="1000">Your Order Is Completed!</h1>
    <h5 data-aos="zoom-in" data-aos-duration="1500">Thank You. Your order has been received.</h5>
</div>

<div  data-aos="zoom-in" data-aos-duration="2000" class="second-container container">
    <div class="row">
        <div class="col-lg-3">
            <div>
                <h5>Order Number</h5>
                <p>{{ $orderNumber ?? '13119' }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Date</h5>
                <p>{{ $orderDate ?? '2024-10-24' }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Total</h5>
                <p>{{ $orderTotal ?? '13119' }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Payment Method</h5>
                <p>{{ $paymentMethod ?? 'Direct' }}</p>
            </div>
        </div>
    </div>
</div>

<div  data-aos="zoom-in" data-aos-duration="2000" class="third-container container">
    <h3>Order Details</h3>

    <!-- <div class="table-responsive my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col-6">Product</th>
                    <th scope="col-6">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Otto</td>
                    <td>@mdo</td>
                    
                </tr>
                <td>n</td>
                <td>new</td>
            </tbody>
        </table>
    </div> -->
    <div class="d-flex mt-5">
    <h5>Product</h5>
    <h5>SubTotal</h5>
    </div>
    <hr>
    <div class="d-flex mb-5">
        <p>maddah </p>
        <p>23</p>
    </div>
    <div class="d-flex">
        <h5>SubTotal :</h5>
        <p>$67</p>
    </div>
    <hr>
    <div class="d-flex">
        <h5>Shipping :</h5>
        <p>$67</p>
    </div>
    <hr>

    <div class="d-flex">
        <h5>VAT :</h5>
        <p>$67</p>
    </div>
    <hr>
    <div class="d-flex">
        <h5>Total :</h5>
        <p>$67</p>
    </div>
</div>
@endsection

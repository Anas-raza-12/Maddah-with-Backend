@extends('layouts.main')
@section('title', 'order-confirmation')
@section('bodyClass', 'orderConfirmation')

@section('content')
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif
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
                <p>{{ $order->id }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Date</h5>
                <p>{{ $order->created_at->format('d-m-Y') }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Total</h5>
                <p>${{ number_format($order->total, 2) }}</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <h5>Payment Method</h5>
                <p>
                    @if ( $transaction->mode == 'online_payment')
                        Online Payment    
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<div data-aos="zoom-in" data-aos-duration="2000" class="third-container container">
    <h3>Order Details</h3>

    <div class="d-flex mt-5">
        <h5>SubTotal:</h5>
        <p>${{ number_format($order->subtotal, 2) }}</p>
    </div>
    <hr>
    <div class="d-flex">
        <h5>Shipping:</h5>
        <p>${{ number_format(0, 2) }}</p> <!-- Adjust this based on your shipping logic -->
    </div>
    <hr>
    <div class="d-flex">
        <h5>VAT:</h5>
        <p>${{ number_format(0, 2) }}</p> <!-- Adjust based on your VAT logic -->
    </div>
    <hr>
    <div class="d-flex">
        <h5>Total:</h5>
        <p>${{ number_format($order->total, 2) }}</p>
    </div>
</div>
@endsection

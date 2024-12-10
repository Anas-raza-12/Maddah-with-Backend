@extends('layouts.main')
@section('title', 'Checkout')
@section('bodyClass', 'checkOut')
@section('content')
@php
    $cart = Session::get('cart', []);
@endphp
<style>
    .error-input {
        border: 1px solid red !important;
        background-color: #ffdddd !important;
    }
    .error-message {
        color: red;
        font-size: 12px;
        margin: 0px;
    }
</style>

<div class="links container d-flex">
    <a class="disable" href="{{ route('user.dashboard') }}">My Account</a> /
    <a class="disable" href="{{ route('cart.view') }}">View Cart</a> /
    <a class="Active" href="">Checkout</a>
</div>

<div class="first-container container">
    <h1>Billing Details</h1>
    <form class="row" action="{{ route('order.place') }}" method="POST">
        @csrf
        <div class="col-lg-5 col-md-5">
            <input type="hidden" name="subtotal" class="subtotal" value="{{ $subtotal }}">
            <input type="hidden" name="total" class="total" value="{{ $subtotal }}">
            
            <label for="name">Username</label><br/>
            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->username) }}" class="{{ $errors->has('name') ? 'error-input' : '' }}"/> 
            @if($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
            @endif
            <br/>
        
            <label for="address">Street Address</label><br/>
            <input type="text" name="street_address" value="{{ old('street_address', $street_address) }}" id="address" class="{{ $errors->has('street_address') ? 'error-input' : '' }}" />
            @if($errors->has('street_address'))
                <p class="error-message">{{ $errors->first('street_address') }}</p>
            @endif
            <br/>
        
            <label for="">Apartment, floor, etc. (optional)</label><br/>
            <input type="text" name="appartment_floor" value="{{ old('appartment_floor', $appartment_floor) }}" class="{{ $errors->has('appartment_floor') ? 'error-input' : '' }}"/>
            @if($errors->has('appartment_floor'))
                <p class="error-message">{{ $errors->first('appartment_floor') }}</p>
            @endif
            <br/>
        
            <label for="">State/City</label><br/>
            <input type="text" name="state_city" value="{{ old('state_city', $state_city) }}" class="{{ $errors->has('state_city') ? 'error-input' : '' }}"/>
            @if($errors->has('state_city'))
                <p class="error-message">{{ $errors->first('state_city') }}</p>
            @endif
            <br/>
        
            <label for="">Mobile No.</label><br/>
            <input type="number" name="mobile" value="{{ old('mobile', Auth::user()->mobile) }}" class="{{ $errors->has('mobile') ? 'error-input' : '' }}"/> 
            @if($errors->has('mobile'))
                <p class="error-message">{{ $errors->first('mobile') }}</p>
            @endif
            <br/>
        
            <label for="Email">Email</label><br/>
            <input type="email" disabled value="{{ Auth::user()->email }}"/>
            @if($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
            <br/>
        
            <div>
                <input type="checkbox" checked="checked" /><span>Save this information for faster check-out next time</span>
            </div>
        </div>        

        <div class="col-lg-2"></div>

        <div class="col-lg-5 col-md-5 payment-card">
            @foreach ($cart as $item)
                <div class="d-flex justify-content-between items">
                    <div class="d-flex justify-content-between gap-5">
                        <img src="{{ asset('uploads/products') . '/' . $item['image'] }}" alt="{{ $item['image'] }}" />
                        <h5>{{ $item['name'] }}</h5>
                    </div>
                    <div class="price">${{ $item['price'] }}</div>
                    
                    <!-- Hidden input for each item's ID -->
                    <input type="hidden" name="item_ids[]" value="{{ $item['id'] }}">
                    <!-- Hidden input for each item's quantity -->
                    <input type="hidden" name="quantity[{{ $item['id'] }}]" value="{{ $item['quantity'] }}">
                </div>
                <hr>
            @endforeach
            
            <div class="payment-section">
                <div class="d-flex justify-content-between">
                    <p>Subtotal:</p>
                    <div class="Sub-price">${{ $subtotal }}</div>
                </div>
                <hr/>
                <div class="d-flex justify-content-between">
                    <p>Total:</p>
                    <div class="Final-price">${{ $subtotal }}</div>
                </div>
            </div>
            <button type="submit" class="Place-Order">Place Order</button>
        </div>
    </form>
</div>

@endsection

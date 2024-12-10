@extends('layouts.main')
@section('title', 'Bank Accounts')
@section('bodyClass', 'bank-accounts')
@section('content')
<div class="links container d-flex">
    <a class="disable" href="{{ route('home') }}">Home</a>
     /
    <a class="disable" href="{{ route('user.dashboard') }}">My Account</a>
     /
     <a class="disable" href="{{ route('user.dashboard') }}">Product</a>
     /
     <a class="disable" href="{{ route('user.dashboard') }}">View Cart</a>
     /
     <a class="disable" href="{{ route('user.dashboard') }}">Check Out</a>
     /
      <a class="Active" href="{{ route('user.dashboard') }}">Bank Accounts</a>
</div>
<div class="container">
    <h1>Bank Accounts</h1>
    <p>These are our bank accounts where you can make payments. Please select one of the available accounts to proceed with your payment.</p>

    <div class="row">
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'meezan']) }}">
                <img src="{{ asset('assets/image/meezan-bank-logo-04 2.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'jazz-cash']) }}">
                <img src="{{ asset('assets/image/Jazz-cash-logo-vector-scaled 1.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'easypaisa']) }}">
                <img src="{{ asset('assets/image/unnamed 1.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'allied-bank']) }}">
                <img src="{{ asset('assets/image/Allied-Bank 1.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'nayapay']) }}">
                <img src="{{ asset('assets/image/images 2.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'nbp-bank']) }}">
                <img src="{{ asset('assets/image/images 1.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-2"> 
            <a href="{{ route('bank.details', ['bank' => 'habib-bank']) }}">
                <img src="{{ asset('assets/image/4b30e1eb-aa82-403b-b0d3-a356f89b5e91 1.png') }}" alt="">
            </a>
        </div>
    </div>
</div>
@endsection

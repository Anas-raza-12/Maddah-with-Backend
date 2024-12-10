@extends('layouts.main')
@section('title', 'Bank Details')
@section('bodyClass', 'bank-details')
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
      <a class="Active" href="{{ route('user.dashboard') }}">Bank Details</a>
</div>
<div class="container first-container my-4">
    <div>
        <h3>Bank Details</h3>
        <p>{{ $bankDetails['title'] }}</p>
    </div>
    <div class="image">
        <img src="{{ asset('assets/image/' . $bankDetails['logo']) }}" alt="">
    </div>
</div>
<div class="container second-container">
    <h5>Account Title:</h5>
    <p>{{ $bankDetails['account_title'] }}</p>
    <h5>Account Number:</h5>
    <p>{{ $bankDetails['account_number'] }}</p>
    <h5>IBA Number:</h5>
    <p>{{ $bankDetails['iba_number'] }}</p>
    <h5>Branch Name:</h5>
    <p>{{ $bankDetails['branch_name'] }}</p>
</div>
<div class="container third-container">
    <form action="{{ route('confirm.payment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="bank_name" value="{{ $bankDetails['title'] }}">
        <div>
            <div>
                <img src="{{ asset('assets/image/' . $bankDetails['logo']) }}" alt="">
            </div>
            <div>
                <p>Please upload a screenshot of the payment transferred</p>
                <input type="file" name="payment_screenshot" id="payment_screenshot" required>
            </div>
        </div>
        <div style="justify-content: end;" class="my-4">
            <button type="submit">Confirm Payment</button>
        </div>
    </form>    
</div>
@endsection
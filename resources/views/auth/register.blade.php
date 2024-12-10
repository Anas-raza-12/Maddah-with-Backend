


@extends('layouts.main')
@section('title', 'Register ')
@section('bodyClass', 'Register')
@section('content')
<style>
    .error-border {
    border: 1px solid red !important;
}

.error-message {
    color: red;
    font-size: 0.9em;
}
</style>
<div class="container">
<h1>REGISTER </h1>
<form action="{{ route('register.user') }}" class="mt-10" id="registerForm" method="POST">
    @csrf
    <input type="text" value="{{ old('username') }}" class="{{ $errors->has('username') ? 'error-border' : '' }}" name="username" placeholder="Enter Username" >
    @if($errors->has('username'))
        <p class="error-message my-2">{{ $errors->first('username') }}</p>
    @endif 

    <input type="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'error-border' : '' }}" name="email" placeholder="Enter Email Address">
    @if($errors->has('email'))
        <p class="error-message my-2">{{ $errors->first('email') }}</p>
    @endif

    <input type="text" value="{{ old('mobile') }}" class="{{ $errors->has('mobile') ? 'error-border' : '' }}" name="mobile" placeholder="Enter Mobile No">
    @if($errors->has('mobile'))
        <p class="error-message my-2">{{ $errors->first('mobile') }}</p>
    @endif

    <input type="password" class="{{ $errors->has('password') ? 'error-border' : '' }}" name="password" placeholder="Password">
    @if($errors->has('password'))
        <p class="error-message my-2">{{ $errors->first('password') }}</p>
    @endif

    <input type="password" class="{{ $errors->has('password') ? 'error-border' : '' }}" name="password_confirmation" placeholder="Confirm password">

    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
    
    <button type="submit">REGISTER</button>
    <p>Have an account ? <a href="{{ route('login') }}"> Login in Your Account</a></p>
</form>
</div>
@endsection
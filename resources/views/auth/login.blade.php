@extends('layouts.main')
@section('title', 'Log In')
@section('bodyClass', 'Sign-In')
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
    <h1>LOGIN</h1>
    <form action="{{ route('login.user') }}" method="POST">
        @csrf
        <!-- Email Input Field -->
        <div class="form-group">
            <input type="email" name="email" placeholder="Enter your Email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'error-border' : '' }}">
            @if($errors->has('email'))
                <p class="error-message my-2">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <!-- Password Input Field -->
        <div class="form-group">
            <input type="password" name="password" placeholder="Enter Your Password" class="{{ $errors->has('password') ? 'error-border' : '' }}">
            @if($errors->has('password'))
                <p class="error-message my-2">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <button type="submit">LOGIN</button>
    </form>
    <p>No account yet? <a href="{{ route('register') }}">Create Account</a></p>
</div>

@endsection

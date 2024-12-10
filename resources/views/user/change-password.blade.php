@extends('layouts.main') 
@section('title', 'My Account') 
@section('bodyClass', 'change-password') 

@section('content')
<div class="links container d-flex">
    <a class="disable" href="{{ route('home') }}">Home</a> /
    <a class="disable" href="{{ route('user.dashboard') }}">My Account</a> /
    <a class="Active" href="{{ route('myaccount.password.change') }}">Change Password</a>
</div>

<div class="first-container container">
    <h1>Change My Password</h1>
    <div class="row">
        @include('user.include.sidebar')

        <div class="col-lg-10 change-pass">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('myaccount.password.update') }}" method="POST">
                @csrf

                <!-- Old Password -->
                <label for="current_password">Old Password</label><br>
                <input type="password" name="current_password" id="current_password" 
                    placeholder="Enter your current password" 
                    class="{{ $errors->has('current_password') ? 'error-input' : '' }}"
                >
                @if ($errors->has('current_password'))
                    <div class="error-message">{{ $errors->first('current_password') }}</div>
                @endif

                <!-- New Password -->
                <label for="new_password">New Password</label><br>
                <input type="password" name="new_password" id="new_password" 
                    placeholder="Enter your new password" 
                    class="{{ $errors->has('new_password') ? 'error-input' : '' }}"
                >
                @if ($errors->has('new_password'))
                    <div class="error-message">{{ $errors->first('new_password') }}</div>
                @endif

                <!-- Confirm New Password -->
                <label for="new_password_confirmation">Confirm Password</label><br>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                    placeholder="Confirm your new password" 
                    class="{{ $errors->has('new_password_confirmation') ? 'error-input' : '' }}"
                >
                @if ($errors->has('new_password_confirmation'))
                    <div class="error-message">{{ $errors->first('new_password_confirmation') }}</div>
                @endif

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<style>
    .active-link {
        color: #8b4513;
    }
    .error-input {
        border: 1px solid red;
        background-color: #ffe6e6;
    }
    .error-message {
        color: red;
        font-size: 0.9em;
        margin-bottom: 10px;
    }
    .alert-success {
        color: green;
        background-color: #e6ffe6;
        padding: 10px;
        border: 1px solid green;
        margin-bottom: 10px;
    }
</style>
@endsection

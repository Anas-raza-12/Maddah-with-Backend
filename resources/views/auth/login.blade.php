

@extends('layouts.main')
@section('title', 'Log In ')
@section('bodyClass', 'Sign-In')

@section('content')

<div class="container">
    <H1>LOG     IN </H1>
    <form action="">
        <input type="email" placeholder="Enter your  Email">
        <input type="text" placeholder="Enter Your Password"> 
        <button>LOG IN</button>
    </form>
    <p>no account yet? <a href=""> Create Account</a> | <a href=""> MY Account</a></p>
</div>
@endsection

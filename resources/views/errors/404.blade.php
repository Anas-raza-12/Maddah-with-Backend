@extends('layouts.main')
@section('title', '404 error')
@section('bodyClass', 'Error-404')
@section('content')


<div class="links container d-flex">
    <a class="disable" href="">Home</a> /
    <a class="Active" href="">404 Error </a>
</div>

<div class="container first-conrtainer">
    <h1>404 Not Found</h1>
    <p class="mt-3 mb-5">Your visited page not found. You may go home page.</p>
    <a href="{{ route('home') }}">Back to home page</a>
</div>

@endsection
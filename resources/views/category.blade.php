@extends('layouts.main')
@section('title', 'Category')
@section('bodyClass', 'category')
@section('content')
<div class="first-container ">
   <div class="container">
<h1>Category</h1>
    <div>
        <a href="">Home</a>
        &gt;
        <a href="">Shop</a>
    </div>
    </div>
</div>
<div class="second-container container">
  <div class="row">
      <div data-aos-duration="1000" data-aos="fade-right" class="col-lg-5 col-sm-12 position-relative first-img">
          <div class="position-absolute">
              <h2>
                  Top Product Of <br />
                  the Week
              </h2>
              <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
          </div>
      </div>
      <div data-aos-duration="1000" data-aos="fade-left" class="col-lg-5 row">
          <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-12 position-relative second-img">
              <div class="position-absolute">
                  <h2>Top Product Of the Week</h2>
                  <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
              </div>
          </div>
          <div data-aos-duration="1000" data-aos="zoom-in" class="col-lg-12 position-relative third-img">
              <div class="position-absolute">
                  <h2>Top Product Of the Week</h2>
                  <a href="{{ route('shop') }}">EXPLORE ITEMS</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
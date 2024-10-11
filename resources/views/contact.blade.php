@extends('layouts.main')
@section('title', 'Contact')
@section('bodyClass', 'Contact')
@section('content')
<div class="first-container container">
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-start">
        <div>
          <h5>Contact Us</h5>
          <h1>Get in touch today!</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est
            venenatis egestas pharetra. Morbi sit tellus elementum elementum
            tincidunt morbi id.
          </p>
          <h4>Phone : <a href="tel:+923410819871"> +92 341 0819871</a></h4>
          <h4>E mail : <a href="emailto:info@maddahrhythmexpert.com"> info@maddahrhythmexpert.com</a></h4>
          <div class="d-flex justify-content-around">
            <a href="/"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="/"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="/"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="/"><i class="fa-brands fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-flex justify-content-end">
        <img src="{{ asset('assets/image/hero-cover-2.png') }}" alt="" />
      </div>
    </div>
  </div>
  <div class="second-container container text-center">
    <h5>VISIT OUR OFFICE</h5>
    <h1>
        We Help Small Businesses <br />
        With Big Ideas
    </h1>
    <div class="row">
      <div class="col-lg-3 col-md-6">
          <div>
            <i class="fa-solid fa-phone"></i>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h5>Get Support</h5>
          <a href="/">Submit Request</a>
          </div>
      </div>
      <div style="background-color: #8b4513; color: #fff;" class="col-lg-3 col-md-6 braon-bg">
         <div> <i class="fa-solid fa-location-dot"></i>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h5>Get Support</h5>
          <a href="/">Submit Request</a>

        </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div>
          <i class="fa-solid fa-envelope"></i>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h6><a href="/">Maddah.expert@example.com</a></h6>
          <h5>Get Support</h5>
          <a href="/">Submit Request</a>

         </div>
      </div>
  </div>
  
</div>
<div class="third-container container text-center">
  <img src="../image/Arrow 2.png" alt="">
  <h5>WE Can't WAIT TO MEET YOU</h5>
  <h1>Let’s Talk</h1>
  <a href="/">Try it free now</a>
</div>
@endsection
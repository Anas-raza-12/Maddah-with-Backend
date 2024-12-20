@extends('layouts.main') @section('title', 'Contact') @section('bodyClass', 'Contact') @section('content')
<div class="first-container container">
      <div class="row">
            <div class="col-lg-6 d-flex justify-content-start">
                  <div data-aos="fade-right"  data-aos-duration="1000">
                        <h5>Contact Us</h5>
                        <h1>Get in touch today!</h1>
                        <p>
                              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
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
            <div data-aos="fade-left"  data-aos-duration="1000" class="col-lg-6 d-flex justify-content-end">
                  <img src="{{ asset('assets/image/hero-cover-2.webp') }}" alt="" />
            </div>
      </div>
</div>
<div class="second-container container text-center">
      <h5 class="h4">VISIT OUR OFFICE</h5>
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
                  <div>
                        <i class="fa-solid fa-location-dot"></i>
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
      <div class="links container d-flex">
            <a class="disable" href="">Home</a> /
            <a class="Active" href="">Cantact </a>
      </div>

      <div class="row">
            <div class="col-lg-3 py-4 px-4">
                  <div>
                        <div class="d-flex align-items-center">
                              <span> <i class="fa-solid fa-phone"></i></span>
                              <h6>Call To Us</h6>
                        </div>
                        <p>We are available 24/7, 7 days a week.</p>
                        <p>Phone : <a href="tel:+92 341 0819871">+92 341 0819871</a></p>
                         <hr>
                         <div class="d-flex align-items-center">
                              <span> <i class="fa-solid fa-envelope"></i></span>
                              <h6>Write To US</h6>
                             
                        </div> 
                        <p class="my-1">Fill out our form and we will contact you within 24 hours.</p>
                        <p class="my-1">Emails : <a href="mailto:info@maddahrhythmexpert.com">info@maddahrhythmexpert.com</a></p>
                  </div>
            </div>
            <div class="col-lg-8">
                  <form action="">
                    <input type="text" name="" id="" placeholder="Your Name ">
                    <input type="email" name="" id=""  placeholder="Your Email ">
                    <input type="number" name="" id=""  placeholder="Your Phone   ">
                    <textarea name="" id=""  placeholder="Your Massage" rows="8"></textarea>
                    <button>Send Massage</button>
                  </form>
            </div>
      </div>
</div>
@endsection

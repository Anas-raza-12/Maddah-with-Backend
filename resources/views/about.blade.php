@extends('layouts.main')
@section('title', 'About')
@section('bodyClass', 'About')
@section('content')
<div class="first-container container">
    <div class="row">
        <div class="col-lg-6 col-md-6 d-flex">
            <div>
                <div>
                    <h5>ABOUT COMPANY</h5>
                    <h1>ABOUT US</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
                    </p>
                    <a href="{{ route('shop') }}">SHOP NOW</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 d-flex">
            <img src="{{ asset('assets/image/hero-cover-2.png') }}" alt="" />
        </div>
    </div>
</div>
<div class="second-container container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <h5>Problems trying</h5>
            <h4>
                Met minim Mollie non desert <br />
                Alamo est sit cliquey dolor do <br />
                met sent.
            </h4>
        </div>
        <div class="col-lg-6 col-md-6">
            <p>
                Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
            </p>
        </div>
    </div>
</div>
<div class="third-container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex">
            <div>
                <h2><div id="numberWang1"></div></h2>
                <h6>Happy Customers</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex">
            <div>
                <h2><div id="numberWang2"></div></h2>
                <h6>Monthly Visitors</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex">
            <div>
                <h2><div id="numberWang3"></div></h2>
                <h6>Countries Worldwide</h6>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex">
            <div>
                <h2><div id="numberWang4"></div></h2>
                <h6>Top Partners</h6>
            </div>
        </div>
    </div>
</div>
<div class="forth-container container d-flex justify-content-center position-relative">
    <video controls src="{{ asset('assets/image/WhatsApp Video 2024-09-16 at 14.58.29_5ecfe558.mp4') }}"></video>
</div>
<div class="fivth-container text-center container">
    <h1>Meet Our Team</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas <br />
        pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
    </p>
    <div class="row">
        @foreach ($members as $member)
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('uploads/members/' . $member->image ) }}" alt="" />
                <h4>{{ $member->name }}</h4>
                <p>{{ $member->profession }}</p>
                <div class="icons">
                    <a href="{{ $member->facebook == '' ? '#' : $member->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="{{ $member->instagram == '' ? '#' : $member->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $member->twitter == '' ? '#' : $member->twitter }}" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="sixth-container container text-center">
    <h1>Big Companies Are Here</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est venenatis egestas <br />
        pharetra. Morbi sit tellus elementum elementum tincidunt morbi id.
    </p>
    <img src="{{ asset('assets/image/row.png') }}" alt="" />
</div>
<div class="seventh-container container-fluid p-0 m-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex">
                <div>
                    <h6>WORK WITH US</h6>
                    <h1>Now Let’s grow Yours</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est <br />
                        venenatis egestas pharetra. Morbi sit tellus elementum <br />
                        elementum tincidunt morbi id.
                    </p>
                    <a href="/">Join Us </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex img"><img src="{{ asset('assets/image/2.png')}} " alt="" /> <img src="{{ asset('assets/image/9.png')}} " alt="" /></div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main') @section('title', 'My Account') @section('bodyClass', 'my-Account') @section('content')

<div class="links container d-flex">
    <a class="disable" href="{{ route('home') }}">Home</a> /
    <a class="Active" href="{{ route('user.dashboard') }}">My Account</a>
</div>

<div class="first-container container">
    <h1>Manage My Account</h1>
    <div class="row">
        @include('user.include.sidebar')

        <div class="col-lg-10">
            <div id="My-Profile-section" class="section-content row my-4">
                <h2>Edit Your Profile</h2>
                @if (session('success'))
                    <script>
                        alert("{{ session('success') }}");
                    </script>
                    {{ session()->forget('success') }}
                @endif

                @if (session('info'))
                    <script>
                        alert("{{ session('info') }}");
                    </script>
                    {{ session()->forget('info') }}
                @endif
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="col-lg-12">
                        <label for="username">Username</label> <br />
                        <input type="text" name="username" id="username" placeholder="Enter Your Username" value="{{ Auth::user()->username }}" required/>
                    </div>
                
                    <div class="col-lg-12">
                        <label for="mobile">Mobile No.</label> <br />
                        <input type="text" name="mobile" id="mobile" placeholder="Enter Your Mobile Number" value="{{ Auth::user()->mobile }}" required/>
                    </div>
                
                    <div class="col-lg-12">
                        <label for="email">Email</label> <br />
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" disabled value="{{ Auth::user()->email }}"/>
                        <p class="small"><strong>Note:</strong> You cannot change your email address.</p>
                    </div>
                
                    <button type="submit">Edit Profile</button>
                </form>                
            </div>
        </div>
    </div>
</div>

<style>
    .active-link {
        color: #8b4513;
    }
</style>

@endsection

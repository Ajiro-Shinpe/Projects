@extends('frontend.layout.main')

@section('main-container')

<center><h1 class="mt-5">Feedback</h1></center>
<div class="container mt-5">


    <form method="post" action="{{ url('/Feedback') }}">
        @csrf
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input name="name" type="text" class="form-control" id="fullName" placeholder="Enter your full name">
        </div>
        <span class="text-danger">@error('name') {{$message}} @enderror</span>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span>

        <div class="form-group">
            <label for="feedback">Enter Your Feedback</label>
            <textarea class="form-control" name="feedback" id="feedback" rows="5" placeholder="Your feedback"></textarea>
        </div>
        <span class="text-danger">@error('feedback') {{$message}} @enderror</span>

        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
    </form>
</div>

@endsection

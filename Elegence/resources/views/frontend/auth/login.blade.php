@extends('frontend.layout.main')

@section('title', 'Login')

@section('main-container')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <center><h2 class="mt-5">Login</h2></center>
    <div class="container mt-5">
        <form method="post" action="{{ url('/login') }}">
            @csrf
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter your email">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>

            <!-- Submit -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <a href="{{route('signup.form')}}"> Don't have an account ? Signup</a>

    </div>
@endsection

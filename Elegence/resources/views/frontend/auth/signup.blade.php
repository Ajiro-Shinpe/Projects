@extends('frontend.layout.main')

@section('main-container')
    <center><h2 class="mt-5">Create Your Account</h2></center>
    <div class="container mt-5">
        <form method="post" action="{{ url('/SignUp') }}">
            @csrf
            <!-- First Name -->
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input name="first_name" type="text" class="form-control" id="firstName" value="{{ old('first_name') }}" placeholder="Enter your first name">
                <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
            </div>
            
            <!-- Last Name -->
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input name="last_name" type="text" class="form-control" id="lastName" value="{{ old('last_name') }}" placeholder="Enter your last name">
                <span class="text-danger">@error('last_name') {{ $message }} @enderror</span>
            </div>
            
            <!-- Gender -->
            <label>Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="M" {{ old('gender') == 'M' ? 'checked' : '' }}>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="F" {{ old('gender') == 'F' ? 'checked' : '' }}>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="O" {{ old('gender') == 'O' ? 'checked' : '' }}>
                <label class="form-check-label" for="other">Other</label>
            </div>
            <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
            
            <!-- Contact Number -->
            <div class="form-group">
                <label for="contactNo">Contact Number</label>
                <input type="tel" name="contactNo" class="form-control" id="contactNo" value="{{ old('contactNo') }}" placeholder="Enter your contact number">
                <span class="text-danger">@error('contactNo') {{ $message }} @enderror</span>
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" class="form-control" id="DateOfBirth" value="{{ old('DateOfBirth') }}">
                <span class="text-danger">@error('DateOfBirth') {{ $message }} @enderror</span>
            </div>

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
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
 
        </form>

        <a href="{{route('login.form')}}"> Already have an account ? Login</a>
    </div>
@endsection

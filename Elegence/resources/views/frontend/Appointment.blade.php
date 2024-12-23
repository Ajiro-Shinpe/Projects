@extends('frontend.layout.main')
@section('main-container')

<center><h2 class="mt-5">Book Appointments Or Reservation</h2></center>

<div class="container mt-5">
    
    <h4 class="text-center">Select Category That You Want To Book Appointment</h4>
    <form method="post" action="{{ url('/Appointment') }}">
        @csrf
    
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input name="name" type="text" class="form-control" id="fullName" placeholder="Enter your full name" value="{{ old('name') }}">
            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email') }}">
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phoneNo" class="form-control" id="phone" placeholder="Enter your phone number" value="{{ old('phoneNo') }}">
            <span class="text-danger">@error('phoneNo') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label for="appointmentDate">Appointment Date</label>
            <input type="date" name="AppDate" class="form-control" id="appointmentDate" value="{{ old('AppDate') }}">
            <span class="text-danger">@error('AppDate') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label for="appointmentTime">Appointment Time</label>
            <input type="time" name="AppTime" class="form-control" id="appointmentTime" value="{{ old('AppTime') }}">
            <span class="text-danger">@error('AppTime') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label for="stylist">Preferred Stylist (optional)</label>
            <select class="form-control" name="stylist" id="stylist">
                <option value="" disabled {{ old('stylist') ? '' : 'selected' }}>Select your stylist</option>
                <option value="stylist1" {{ old('stylist') == 'stylist1' ? 'selected' : '' }}>Stylist 1</option>
                <option value="stylist2" {{ old('stylist') == 'stylist2' ? 'selected' : '' }}>Stylist 2</option>
                <option value="stylist3" {{ old('stylist') == 'stylist3' ? 'selected' : '' }}>Stylist 3</option>
            </select>
            <span class="text-danger">@error('stylist') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="service">Select Services</label>
            <select multiple class="form-control" name="service[]" id="services">
                <option value="cut">Haircut</option>
                <option value="facial">Facial</option>
                <option value="manicure">Manicure</option>
                <option value="pedicure">Pedicure</option>
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small>
        </div>
         
        <div class="form-group">
            <label for="message">Additional Notes (optional)</label>
            <textarea class="form-control" id="message" rows="4" name="message" placeholder="Any special requests or notes">{{ old('message') }}</textarea>
            <span class="text-danger">@error('message') {{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </div>
    </form>
    
</div>


@endsection
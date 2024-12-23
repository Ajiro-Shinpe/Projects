@extends('frontend.layout.main')

@section('main-container')
<h1 class="text-center mt-2 mb-4">Admin Panel</h1>

<div>
    <h3 class="text-center mt-2 mb-4">All Appointments</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Stylist</th>
                <th scope="col">Service</th>
                <th scope="col">Message</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            @php
                $servicesArray = explode(', ', $appointment->service);    
            @endphp
            <tr>
                <td>{{ $appointment->App_Id }}</td>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phoneNo }}</td>
                <td>{{ $appointment->AppDate }}</td>
                <td>{{ $appointment->AppTime }}</td>
                <td>{{ $appointment->stylist }}</td>
                <td>
                    <ul>
                        @foreach($servicesArray as $service)
                            <li>{{ $service }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $appointment->message }}</td>
                <td>{{ $appointment->created_at }}</td>
                <td>{{ $appointment->updated_at }}</td>
                <td>
                    <form action="{{ route('appointments.destroy', $appointment->App_Id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('frontend.layout.main')

@section('main-container')
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

<h1 class="text-center mt-2 mb-4">Admin Panel</h1>

<div class="container d-flex">
  <a href="{{ url('/Fetch_Appointments') }}" class="btn btn-lg m-1 btn-primary">Appointments</a>
  <a href="{{ url('/Fetch_Contact') }}" class="btn btn-lg m-1 btn-primary">Contact/Queries</a>
  <a href="{{ url('/Fetch_Feedback') }}" class="btn btn-lg m-1 btn-primary">Feedbacks</a>
</div>

<div>
  <h3 class="text-center mt-2 mb-4">All Users</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Gender</th>
        <th scope="col">Contact No</th>
        <th scope="col">Date Of Birth</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->gender }}</td>
        <td>{{ $user->contactNo }}</td>
        <td>{{ $user->DateOfBirth }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
          <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
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

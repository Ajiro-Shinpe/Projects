@extends('frontend.layout.main')

@section('main-container')
<h1 class="text-center mt-2 mb-4">Admin Panel</h1>

<div>
    <h3 class="text-center mt-2 mb-4">All Feedbacks</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Feedback</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->feedback }}</td>
                <td>{{ $feedback->created_at }}</td>
                <td>{{ $feedback->updated_at }}</td>
                <td>
                    <form action="{{ route('feedback.delete', $feedback->id) }}" method="POST" style="display:inline;">
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

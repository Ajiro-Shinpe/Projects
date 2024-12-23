@extends('frontend.layout.main')

@section('main-container')
<h1 class="text-center mt-2 mb-4">Admin Panel</h1>

<div>
    <h3 class="text-center mt-2 mb-4">All Queries</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Queries/Contact</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->updated_at }}</td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
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

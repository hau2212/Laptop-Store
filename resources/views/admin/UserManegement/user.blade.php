@extends('layouts.admin')
@section('title', 'User Management')

@section('content')
<div class="container mt-4">
    <h1>User Management</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('admin.users.userStatus', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm {{ $user->status === 'active' ? 'btn-success' : 'btn-secondary' }}">
                            {{ ucfirst($user->status) }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

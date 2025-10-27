@extends('layouts.admin')
@section('title', 'Add User')

@section('content')
<div class="container mt-4">
    <h2>Add New User</h2>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success">Create</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

@extends('layouts.admin')
@section('title', 'Add Category')
@section('content')
<h1> Add New Category</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description:</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success mt-3">Save</button>
</form>
@endsection

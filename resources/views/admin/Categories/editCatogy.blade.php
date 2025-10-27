@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
<h1>✏️ Edit Category</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description:</label>
        <textarea name="description" class="form-control">{{ $category->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection

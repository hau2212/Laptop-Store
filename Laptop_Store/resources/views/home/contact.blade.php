@extends('layouts.index')
@section('style')
    <link rel='stylesheet' href="{{ asset('css/home_main/content_container.css') }}">
@endsection
@section('title', $viewData['title'])

@section('content')
 <div class="home_container">
   <div class="container mt-5">
    <h1>Contact Us</h1>
    <p>Have any questions? Fill out the form below, and we'll get back to you soon.</p>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Hiển thị lỗi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form liên hệ --}}
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                    <input class="form-control" type="file" name="image">
                </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
 </div>
@endsection
@section('footer' , $viewData['footer'])
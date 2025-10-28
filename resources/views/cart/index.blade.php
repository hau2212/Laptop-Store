@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="home_container">
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>${{ $product->getPrice() }}</td>
                    <td>

                        <form action="{{ route('cart.update', ['id' => $product->getId()]) }}" method="POST" class="d-flex justify-content-center">
                            @csrf
                            <input type="number" name="quantity" value="{{ session('products')[$product->getId()] }}" min="1"
                                   class="form-control text-center" style="width: 80px;">
                            <button type="submit" class="btn btn-sm btn-success ms-2">Update</button>
                        </form>
                        
                    </td>
                    <td>
                        <form action="{{ route('cart.update', ['id' => $product->getId()]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="0">
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if (count($viewData["products"])>0)
                    <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                    <a href="{{ route('cart.delete') }}" class="btn btn-danger mb-2">Remove all</a>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection

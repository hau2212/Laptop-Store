@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<<<<<<< HEAD
<div class="home_container">
=======
>>>>>>> origin/nguyen-main
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
<<<<<<< HEAD
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
=======
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
>>>>>>> origin/nguyen-main
                </tr>
            </thead>
            <tbody>
            @foreach ($viewData["products"] as $product)
<<<<<<< HEAD
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

=======
            <tr>
                <td>{{ $product->getId() }}</td>
                <td>{{ $product->getName() }}</td>
                <td>{{ $product->getPrice() }}</td>
                <td>{{ session('products')[$product->getId()] }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
>>>>>>> origin/nguyen-main
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if (count($viewData["products"])>0)
<<<<<<< HEAD
                    <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                    <a href="{{ route('cart.delete') }}" class="btn btn-danger mb-2">Remove all</a>
=======
                <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Remove all products from Cart
                    </button>
                </a>
>>>>>>> origin/nguyen-main
                @endif
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
</div>
@endsection
=======
@endsection
>>>>>>> origin/nguyen-main

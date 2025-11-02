@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="home_container">
@forelse ($viewData["orders"] as $order)

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5>Order #{{ $order->getId() }}</h5>
    </div>
    <div class="card-body">
        <p><b>Date:</b> {{ $order->getCreatedAt() }}</p>
        <p><b>Địa chỉ giao hàng:</b> {{ $order->address }}</p>
        <p><b>Số điện thoại:</b> {{ $order->phone }}</p>
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @php $orderTotal = 0; @endphp
                @foreach ($order->getItems() as $item)
                    @php 
                        $itemTotal = $item->getPrice() * $item->getQuantity();
                        $orderTotal += $itemTotal;
                    @endphp
                    <tr>
                        <td>{{ $item->getId() }}</td>
                        <td>
                            <a class="link-success" href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">
                                {{ $item->getProduct()->getName() }}
                            </a>
                        </td>
                        <td>${{ number_format($item->getPrice(), 2) }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        <td>${{ number_format($itemTotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-secondary">
                    <th colspan="4" class="text-end">Order Total:</th>
                    <th>${{ number_format($orderTotal, 2) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@empty
<div class="alert alert-warning" role="alert">
    You have not purchased anything in our store yet.
</div>
@endforelse
</div>
@endsection

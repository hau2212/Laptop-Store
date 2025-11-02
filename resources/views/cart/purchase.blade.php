@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông tin khách hàng</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cart.purchase') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Danh xưng</label>
                    <select class="form-select" name="gender" required>
                        <option value="">-- Chọn --</option>
                        <option value="Anh">Anh</option>
                        <option value="Chị">Chị</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Nguyễn Văn A" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="0901234567" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Số nhà, đường, phường, quận..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ghi chú / yêu cầu khác (không bắt buộc)</label>
                    <textarea name="note" class="form-control" rows="3" placeholder="Ví dụ: Giao buổi sáng..."></textarea>
                </div>

                <hr>

                <h5 class="mb-3">Tóm tắt đơn hàng</h5>
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($viewData["products"] as $product)
                            @php
                                $quantity = $viewData["productsInSession"][$product->getId()];
                                $itemTotal = $product->getPrice() * $quantity;
                                $total += $itemTotal;
                            @endphp
                            <tr>
                                <td>{{ $product->getName() }}</td>
                                <td>{{ $quantity }}</td>
                                <td>${{ number_format($product->getPrice(), 2) }}</td>
                                <td>${{ number_format($itemTotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-secondary">
                            <th colspan="3" class="text-end">Tổng cộng:</th>
                            <th>${{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-5 py-2">
                        Đặt hàng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

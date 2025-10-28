@extends('layouts.admin')
@section('title', 'Admin Dashboard - Products')
@section('styles')
    <link href="{{ asset('public/css/admin/product/product_show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Quản lý sản phẩm</h2>

    {{-- Form tạo sản phẩm mới --}}
    <div class="card mb-5">
        <div class="card-header">
            <strong>Thêm sản phẩm mới</strong>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="discounted_price" class="form-label">Giá khuyến mãi</label>
                        <input type="number" name="discounted_price" id="discounted_price" class="form-control" value="{{ old('discounted_price') }}">
                        @error('discounted_price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="stock" class="form-label">Số lượng</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', 0) }}">
                        @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">-- Chọn danh mục --</option>

                            @foreach($viewData['category'] as $category)
                                <option value="{{ $category -> id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
        </div>
    </div>

    {{-- Bảng hiển thị sản phẩm --}}
    <div class="card">
        <div class="card-header">
            <strong>Danh sách sản phẩm</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewData['product'] as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ $product->discounted_price ? number_format($product->discounted_price) : '-' }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category?->name ?? '-' }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="60">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

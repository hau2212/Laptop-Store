@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Admin Dashboard</h2>

    {{-- Thống kê tổng quát --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-center bg-light border-success">
                <div class="card-body">
                    <h5 class="card-title">Tổng số sản phẩm</h5>
                    <h2>{{ $viewData['total_products'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center bg-light border-primary">
                <div class="card-body">
                    <h5 class="card-title">Tổng số người dùng</h5>
                    <h2>{{ $viewData['total_users'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Sản phẩm mới nhất --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <strong>Sản phẩm mới nhất</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewData['latest_products'] as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ number_format($p->price) }} đ</td>
                        <td>{{ $p->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Người dùng mới nhất --}}
    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>Người dùng mới đăng ký</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewData['latest_users'] as $index => $u)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

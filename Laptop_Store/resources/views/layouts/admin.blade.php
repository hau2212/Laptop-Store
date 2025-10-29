{{-- resources/views/admin/layouts/admin.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Bootstrap + Icons (giữ nguyên UI) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- CSS tuỳ biến (đảm bảo đúng asset path) --}}
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />

    {{-- Tiêu đề có thể override từ view con --}}
    <title>@yield('title', 'Admin - Online Store')</title>

    {{-- Cho view con “đẩy” thêm CSS khi cần --}}
    @stack('styles')
</head>

<body>
    <div class="admin-wrapper">

        {{-- Sidebar --}}
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <h2>ADMIN PANEL</h2>
            </div>

            <ul class="admin-menu">
                <li><a href="{{ route('admin.dashbroad') }}">📊 Dashboard</a></li>
                <li><a href="{{ route('admin.product.store') }}">👤 Users</a></li>
                <li><a href="{{ route('admin.products') }}">🛒 Products</a></li>
                <li><a href="{{ route('admin.product.store') }}">📦 Orders</a></li>
                <li><a href="{{ route('admin.product.store') }}">🚪 Logout</a></li>
            </ul>
        </aside>
        <!-- /sidebar -->

        {{-- Khu vực nội dung chính --}}
        <div class="col content-grey">
            {{-- Thanh top (tên + avatar/logo) --}}
            <nav class="p-3 shadow d-flex justify-content-end align-items-center gap-2">
                <img class="img-logo-small" src="{{ asset('img/logo.png') }}" alt="Admin logo">
                <span class="profile-font fw-bold fs-5 text-dark me-2">Admin</span>
            </nav>
            {{-- Nội dung động của từng trang con --}}
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright -
                <a class="text-reset fw-bold text-decoration-none" target="_blank" rel="noopener"
                   href="https://twitter.com/danielgarax">
                    Daniel Correa
                </a>
            </small>
        </div>
    </div>
    <!-- /footer -->

    {{-- Bootstrap JS bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    {{-- Cho view con “đẩy” thêm JS khi cần --}}
    @stack('scripts')
</body>
</html>

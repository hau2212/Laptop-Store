<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home_layout/nav_bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_layout/search_bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_layout/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_layout/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_layout/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_main/content_container.css') }}">

    @yield('style')
</head>
    @php
        $hideSidebar = request()->routeIs(
            'home.blog',        // Blog
            'home.about',       // About
            'home.contact',     // Contact
            'cart.index',       // Cart
            'myaccount.orders', // My Orders
            'login',            // Login
            'register'          // Register
        );
    @endphp
<body class="d-flex flex-column min-vh-100 background {{ $hideSidebar ? 'no-sidebar' : '' }}">

    <!-- ===== HEADER / NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg  sticky-top shadow-sm custom_navbar header">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ Route('home.main') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="55" class="me-2">
            </a>
            
                <div class="flex-grow-1 mx-3">
                <input class="form-control w-100" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    <option value="WorkStation">
                    <option value="Office">
                    <option value="Gaming">
                    <option value="Computer">
                </datalist>
                </div>

                
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse d-flex" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            
                <!-- Public links -->
                <li class="nav-item">
                <a class="nav-link hover_link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home.main') }}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link hover_link {{ request()->is('blog*') ? 'active' : '' }}"
                    href="{{ route('home.blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                <a class="nav-link hover_link {{ request()->is('about*') ? 'active' : '' }}"
                    href="{{ route('home.about') }}">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link hover_link {{ request()->is('contact*') ? 'active' : '' }}"
                    href="{{ route('home.contact') }}">Contact</a>
                </li>

                @guest
                <!-- Guest only -->
                {{-- Login --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                    href="{{ route('login') }}" title="Login">
                        <i class="fa-solid fa-right-to-bracket"></i> {{-- Icon đăng nhập --}}
                    </a>
                </li>
                @else
                <!-- Authenticated only -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('myaccount.orders') ? 'active' : '' }}"
                    href="{{ route('myaccount.orders') }}">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover_link {{ request()->routeIs('cart.index') ? 'active' : '' }}"
                    href="{{ route('cart.index') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                {{-- Logout --}}
                <li class="nav-item">
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <a role="button" class="nav-link" onclick="document.getElementById('logout').submit();" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i> {{-- Icon đăng xuất --}}
                        </a>
                    </form>
                </li>
                @endguest
            </ul>
            </div>
            
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
     <!-- ===== MAIN CONTENT WITH SIDEBAR ===== -->
     @yield('sidebar')
        <main class="flex-grow-1 py-4">
        <div class="container-fluid">
            <div class="row">

            {{-- Sidebar: chỉ hiển thị khi KHÔNG thuộc các trang ẩn --}}
            @unless($hideSidebar)
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar p-3 border-end">
                {{-- ... sidebar của bạn ... --}}
                @include('partials.sidebar') {{-- hoặc dán nguyên sidebar hiện có --}}
                </nav>
            @endunless

            {{-- Cột nội dung: full-width nếu ẩn sidebar --}}
            {{-- <div class="{{ $hideSidebar ? 'col-12 px-4' : 'col-md-9 col-lg-10 px-4' }}">
                @yield('content')
            </div> --}}
            <div class='col-md-5col-lg-10 px-4'>
                @yield('content')
            </div>
        </div>
        </main>

    <!-- ===== FOOTER ===== -->
       <footer class="text-black py-4 footer">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Cột bên trái -->
                    <div class="col-md-6 text-md-start text-center ">
                        <!-- 
                            col-md-6 : chia deu 50% 
                            text-md-start : canh chữ về bên trái (start = left). 
                            text-center : canh giữa toàn bộ nội dung
    
                        -->
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="40" width="40" class="mb-2 d-block mx-md-0 mx-auto">
                        <h3 class="generic"> LaptopShop</h3>
                        <p class="generic">Your one-stop shop for all laptop needs.</p>
                        <p class="mb-0">
                            @yield('footer', '© 2024 My Website. All rights reserved.')
                        </p>

                    </div>

                    <!-- Cột bên phải -->
                    <div class="col-md-6 text-md-end text-center">
                        <!-- 
                            col-md-6 : chia deu 50% 
                            text-md-start : canh chữ về bên trái (start = left). 
                            text-center : canh giữa toàn bộ nội dung
    
                        -->
                        <h5>Contact Us</h5>
                        <p class="mb-1">Email: <a href="mailto:info@mywebsite.com" class="text-warning text-decoration-none">info@mywebsite.com</a></p>
                        <div class="mt-2">
                            <a href="#" class="text-white me-3"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="text-white me-3"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="text-white"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    <!-- ===== JS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
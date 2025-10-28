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
<body class="d-flex flex-column min-vh-100 background">

    <!-- ===== HEADER / NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg  sticky-top shadow-sm custom_navbar header">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ Route('home.main') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="55" class="me-2">
            </a>

                <div> 
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                        <option value="WorkStation">
                        <option value="office">
                        <option value="gaming">
                        <option value="computer">
                        
                    </datalist>        
                </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link hover_link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home.main') }}">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link hover_link {{ request()->is('blog*') ? 'active' : '' }}"
                        href="{{ route('home.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover_link {{ request()->is('contact*') ? 'active' : '' }}"
                        href="{{ route('home.contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover_link {{ request()->is('contact*') ? 'active' : '' }}"
                        href="{{ route('cart.index') }}">Cart</a>
                    </li>
                    </ul>

                    <ul class="navbar-nav ms-lg-3">
                    <li class="nav-item">
                    @guest

                        <a class="nav-link active" href="{{ route('login') }}">Login</a> 
                        <a class="nav-link active" href="{{ route('register') }}">Register</a> 
                        @else

                        <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
                        
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                        </form>
                    @endguest
                    </li>
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
                <!-- Sidebar -->
                    <!-- Sidebar cố định bên trái, full chiều cao -->
                        <nav id="sidebarMenu" 
                            class="col-md-3 col-lg-2 d-md-block  sidebar p-3 border-end">
                       
                            <!-- Tiêu đề menu -->
                            <h5 class="text-dark mb-3"><i class="fa-solid fa-bars me-2"></i>Menu</h5>

                            <!-- Các mục menu -->
                            <ul class="nav flex-column">
                                
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">
                                        Laptop
                                    </a>
                                    <ul class="dropdown-menu submenu">
                                        <li><a class="dropdown-item" href="#">MSI</a></li>
                                        <li><a class="dropdown-item" href="#">ACER</a></li>
                                        <li><a class="dropdown-item" href="#">ASUS</a></li>
                                        <li><a class="dropdown-item" href="#">DELL</a></li>
                                        <li><a class="dropdown-item" href="#">HP</a></li>
                                        <li><a class="dropdown-item" href="#">LENOVO</a></li>
                                        <li><a class="dropdown-item" href="#">MACBOOK</a></li>
                                        <li><a class="dropdown-item" href="#">LG</a></li>
                                        <li><a class="dropdown-item" href="#">GIGABYTE</a></li>
                                        <li><a class="dropdown-item" href="#">MASSTEL</a></li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">
                                        Thiết bị ngoại vi
                                    </a>
                                    <ul class="dropdown-menu submenu">
                                       <li><a class="dropdown-item" href="#">Màn hình</a></li>
                                        <li><a class="dropdown-item" href="#">Bàn phím</a></li>
                                        <li><a class="dropdown-item" href="#">Chuột</a></li>
                                        <li><a class="dropdown-item" href="#">Tai nghe</a></li>
                                        <li><a class="dropdown-item" href="#">Loa</a></li>
                                        <li><a class="dropdown-item" href="#">Webcam</a></li>
                                        <li><a class="dropdown-item" href="#">Ổ cứng/SSD gắn ngoài</a></li>
                                        <li><a class="dropdown-item" href="#">USB Hub / Dock</a></li>
                                        <li><a class="dropdown-item" href="#">Cáp & Chuyển đổi</a></li>
                                    </ul>
                                </li>


                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-network-wired me-2"></i> Phụ kiện</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i>Thông tin</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i>Địa chỉ</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i>Số điện thoại</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-gear me-2"></i>Đánh giá</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i>Hỗ trợ</a>
                                </li>
                            </ul>
                        </nav>

                <!-- Nội dung phải dịch sang phải bằng padding hoặc margin-left -->
                <div class="col-md-5col-lg-10 px-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
        <footer class=" text-black mt-auto py-4 footer">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Cột bên trái -->
                    <div class="col-md-6 text-md-start text-center ">
                        <!-- 
                            col-md-6 : chia deu 50% 
                            text-md-start : canh chữ về bên trái (start = left). 
                            text-center : canh giữa toàn bộ nội dung
    
                        -->
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="40" class="mb-2 d-block mx-md-0 mx-auto">
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
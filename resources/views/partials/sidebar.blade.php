@php
use App\Models\Category;

$categories = Category::all(); // Lấy tất cả category
@endphp
{{-- resources/views/partials/sidebar.blade.php --}}
<h5 class="text-dark mb-3"><i class="fa-solid fa-bars me-2"></i>Menu</h5>

<ul class="nav flex-column">
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
      Laptop
    </a>
    
    <ul class="dropdown-menu submenu">
        @foreach ($categories as $category)
            
                <li>
                    <a class="dropdown-item" href="#category-{{ $category->id }}">
                        {{ $category->name }}
                    </a>
                </li>
          
        @endforeach
    </ul>
</li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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
    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i> Thông tin</a>
  </li>
  <li class="nav-item mb-2">
    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i> Địa chỉ</a>
  </li>
  <li class="nav-item mb-2">
    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i> Số điện thoại</a>
  </li>
  <li class="nav-item mb-2">
    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-gear me-2"></i> Đánh giá</a>
  </li>
  <li class="nav-item mb-2">
    <a class="nav-link text-dark" href="#"><i class="fa-solid fa-bug me-2"></i> Hỗ trợ</a>
  </li>
</ul>
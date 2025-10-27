@extends('layouts.index')  {{-- Kế thừa layout chung --}}

@section('style')
  {{-- Nạp CSS riêng cho trang chi tiết sản phẩm --}}
  <link rel="stylesheet" href="{{ asset('css/product/product_show.css') }}">
@endsection

@section('title', $viewData['title']) {{-- Set <title> động từ controller --}}

@section('content')
<div class="product_show">                {{-- Khung tổng: nền trắng, viền đỏ, chừa sidebar trái --}}
  <div class="product_wrap">              {{-- Căn giữa theo max-width giống Home --}}

    <div class="content_product"><p>Detail Product</p></div>
    <div class="product_divider"></div>

    <!-- Bố cục 2 cột: TRÁI (ảnh + nội dung) | PHẢI (cấu hình & info khác) -->
    <div class="container_product grid-2">
      
      <!-- ========== CỘT TRÁI: Ảnh + Thông tin cơ bản ========== -->
      <section class="left_main">
        <div class="left_product">
          <img class="img_product"
               src="{{ asset('storage/' . $viewData['products']->image) }}"
               alt="{{ $viewData['products']->name }}">
        </div>

        <article class="main_info card_box">
          <h2 class="prod_title">{{ $viewData['products']->name }}</h2>

          {{-- Giá: có giảm thì gạch giá cũ + tô đỏ giá mới --}}
          <p class="price">
            @if($viewData['products']->discount_price)
              <span class="price--old">{{ number_format($viewData['products']->price, 0, ',', '.') }} VNĐ</span>
              <span class="price--sale">{{ number_format($viewData['products']->discount_price, 0, ',', '.') }} VNĐ</span>
            @else
              <span class="price--now">{{ number_format($viewData['products']->price, 0, ',', '.') }} VNĐ</span>
            @endif
          </p>

          <p class="desc">
            <strong>Description:</strong> {{ $viewData['products']->description }}
          </p>

          <div class="meta_inline">
            <span><strong>Stock:</strong> {{ $viewData['products']->stock }}</span>
            <span><strong>Category:</strong> {{ $viewData['products']->category }}</span>
          </div>
        </article>
      </section>

      <!-- ========== CỘT PHẢI: CẤU HÌNH & THÔNG TIN KHÁC (SIDEBAR) ========== -->
      <aside class="right_aside">
        <div class="card_box sticky_aside">
          <h4 class="box_title">Cấu hình</h4>
          <ul class="spec_list">
            <li><span>CPU</span><strong>{{ $viewData['products']->cpu ?? '—' }}</strong></li>
            <li><span>GPU</span><strong>{{ $viewData['products']->gpu ?? '—' }}</strong></li>
            <li><span>RAM</span><strong>{{ $viewData['products']->ram ?? '—' }}</strong></li>
            <li><span>Storage</span><strong>{{ $viewData['products']->storage ?? '—' }}</strong></li>
            <li><span>Display</span><strong>{{ $viewData['products']->display ?? '—' }}</strong></li>
            <li><span>Weight</span><strong>{{ $viewData['products']->weight ?? '—' }}</strong></li>
          </ul>

          <h4 class="box_title mt-3">Thông tin khác</h4>
          <ul class="spec_list">
            <li><span>Bảo hành</span><strong>{{ $viewData['products']->warranty ?? '12 tháng' }}</strong></li>
            <li><span>Xuất xứ</span><strong>{{ $viewData['products']->origin ?? '—' }}</strong></li>
            <li><span>Màu sắc</span><strong>{{ $viewData['products']->color ?? '—' }}</strong></li>
          </ul>
        </div>
      </aside>

    </div>
    <!-- /container_product -->

  </div>
</div>
@endsection

@section('footer', $viewData['footer'])  {{-- Nội dung dòng bản quyền/ghi chú ở footer --}}

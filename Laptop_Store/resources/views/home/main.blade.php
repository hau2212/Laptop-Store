@extends('layouts.index')  {{-- Kế thừa layout chung --}}

@section('style')
  {{-- Nạp CSS riêng cho trang Home (lưới sản phẩm, màu đỏ–trắng, căn giữa) --}}
  <link rel="stylesheet" href="{{ asset('css/home_main/content_container.css') }}">
@endsection

@section('title', $viewData['title']) {{-- Set <title> động từ controller --}}

@section('content')
<div class="home_container">  {{-- Khung tổng của trang Home: viền đỏ, nền trắng, chừa chỗ sidebar --}}

  <div class="border_full"></div>  {{-- Dải phân cách đỏ phía trên --}}

  <div class="products_wrap">  {{-- Giới hạn bề ngang & căn giữa toàn bộ cụm sản phẩm --}}
    <div class="row_banner">   {{-- Hàng sản phẩm: flex-wrap + justify-center --}}
      @foreach ($viewData['products'] as $product)
        <div class="box_banner">   {{-- Mỗi “ô” sản phẩm: width cố định để căn giữa đẹp --}}
          <a href="{{ route('product.show', ['id' => $product->id]) }}" class="card"> {{-- Card có thể click toàn khối --}}
            <img class="img_banner"
                 src="{{ asset('storage/' . $product->image) }}"     {{-- Ảnh sản phẩm (yêu cầu storage:link) --}}
                 alt="{{ $product->name }}">                         {{-- Alt để SEO + truy cập --}}

            <div class="card-body">  {{-- Vùng text của card --}}
              <h2 class="size_text_banner">{{ $product->name }}</h2>

              {{-- Hiển thị giá: nếu có giảm giá thì gạch giá cũ + tô đỏ giá mới --}}
              <p class="size_text_banner">
                @if ($product->discount_price)
                  <span style="text-decoration:line-through;opacity:.7">
                    {{ number_format($product->price, 0, ',', '.') }} VNĐ
                  </span>
                  &nbsp;
                  <span class="discount_tag">
                    {{ number_format($product->discount_price, 0, ',', '.') }} VNĐ
                  </span>
                @else
                  {{ number_format($product->price, 0, ',', '.') }} VNĐ
                @endif
              </p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

  <div class="border_full"></div>  {{-- Dải phân cách đỏ giữa hai hàng --}}

  {{-- Hàng thứ 2: demo nền tối (tuỳ chọn). Có thể bỏ nếu không cần --}}
  <div class="products_wrap">
    <div class="row_banner">
      @foreach ($viewData['products'] as $product)
        <div class="box_banner">
          <a href="{{ route('product.show', ['id' => $product->id]) }}" class="card bg-dark text-white"> {{-- Card nền tối --}}
            <img class="img_banner"
                 src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}">

            <div class="card-img-overlay"> {{-- Overlay chữ trên ảnh khi dùng bg-dark --}}
              <h2 class="size_text_banner">{{ $product->name }}</h2>

              {{-- Giá với điều kiện giảm giá giống khối trên --}}
              <p class="size_text_banner">
                @if ($product->discount_price)
                  <span style="text-decoration:line-through;opacity:.7">
                    {{ number_format($product->price, 0, ',', '.') }} VNĐ
                  </span>
                  &nbsp;
                  <span class="discount_tag">
                    {{ number_format($product->discount_price, 0, ',', '.') }} VNĐ
                  </span>
                @else
                  {{ number_format($product->price, 0, ',', '.') }} VNĐ
                @endif
              </p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

</div>
@endsection

@section('footer', $viewData['footer']) {{-- Nội dung dòng bản quyền/ghi chú hiển thị ở footer --}}

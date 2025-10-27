  

<?php $__env->startSection('style'); ?>
  
  <link rel="stylesheet" href="<?php echo e(asset('css/product/product_show.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $viewData['title']); ?> 

<?php $__env->startSection('content'); ?>
<div class="product_show">                
  <div class="product_wrap">              

    <div class="content_product"><p>Detail Product</p></div>
    <div class="product_divider"></div>

    <!-- Bố cục 2 cột: TRÁI (ảnh + nội dung) | PHẢI (cấu hình & info khác) -->
    <div class="container_product grid-2">
      
      <!-- ========== CỘT TRÁI: Ảnh + Thông tin cơ bản ========== -->
      <section class="left_main">
        <div class="left_product">
          <img class="img_product"
               src="<?php echo e(asset('storage/' . $viewData['products']->image)); ?>"
               alt="<?php echo e($viewData['products']->name); ?>">
        </div>

        <article class="main_info card_box">
          <h2 class="prod_title"><?php echo e($viewData['products']->name); ?></h2>

          
          <p class="price">
            <?php if($viewData['products']->discount_price): ?>
              <span class="price--old"><?php echo e(number_format($viewData['products']->price, 0, ',', '.')); ?> VNĐ</span>
              <span class="price--sale"><?php echo e(number_format($viewData['products']->discount_price, 0, ',', '.')); ?> VNĐ</span>
            <?php else: ?>
              <span class="price--now"><?php echo e(number_format($viewData['products']->price, 0, ',', '.')); ?> VNĐ</span>
            <?php endif; ?>
          </p>

          <p class="desc">
            <strong>Description:</strong> <?php echo e($viewData['products']->description); ?>

          </p>

          <div class="meta_inline">
            <span><strong>Stock:</strong> <?php echo e($viewData['products']->stock); ?></span>
            <span><strong>Category:</strong> <?php echo e($viewData['products']->category); ?></span>
          </div>
        </article>
      </section>

      <!-- ========== CỘT PHẢI: CẤU HÌNH & THÔNG TIN KHÁC (SIDEBAR) ========== -->
      <aside class="right_aside">
        <div class="card_box sticky_aside">
          <h4 class="box_title">Cấu hình</h4>
          <ul class="spec_list">
            <li><span>CPU</span><strong><?php echo e($viewData['products']->cpu ?? '—'); ?></strong></li>
            <li><span>GPU</span><strong><?php echo e($viewData['products']->gpu ?? '—'); ?></strong></li>
            <li><span>RAM</span><strong><?php echo e($viewData['products']->ram ?? '—'); ?></strong></li>
            <li><span>Storage</span><strong><?php echo e($viewData['products']->storage ?? '—'); ?></strong></li>
            <li><span>Display</span><strong><?php echo e($viewData['products']->display ?? '—'); ?></strong></li>
            <li><span>Weight</span><strong><?php echo e($viewData['products']->weight ?? '—'); ?></strong></li>
          </ul>

          <h4 class="box_title mt-3">Thông tin khác</h4>
          <ul class="spec_list">
            <li><span>Bảo hành</span><strong><?php echo e($viewData['products']->warranty ?? '12 tháng'); ?></strong></li>
            <li><span>Xuất xứ</span><strong><?php echo e($viewData['products']->origin ?? '—'); ?></strong></li>
            <li><span>Màu sắc</span><strong><?php echo e($viewData['products']->color ?? '—'); ?></strong></li>
          </ul>
        </div>
      </aside>

    </div>
    <!-- /container_product -->

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer', $viewData['footer']); ?>  

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\Laptop_Store\resources\views/products/show.blade.php ENDPATH**/ ?>
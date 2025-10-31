  

<?php $__env->startSection('style'); ?>
  
  <link rel="stylesheet" href="<?php echo e(asset('css/home_main/content_container.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $viewData['title']); ?> 

<?php $__env->startSection('content'); ?>
<div class="home_container">  

  <div class="border_full"></div>  

  <div class="products_wrap">  
    <div class="row_banner">   
      <?php $__currentLoopData = $viewData['discount_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($product->discount_price): ?>
         <div class="box_banner">   
          <a href="<?php echo e(route('product.show', ['id' => $product->id])); ?>" class="card"> 
            <img class="img_banner"
                 src="<?php echo e(asset('storage/products/' . $product->image)); ?>"     
                 alt="<?php echo e($product->name); ?>">                         

            <div class="card-body">  
              <h2 class="size_text_banner"><?php echo e($product->name); ?></h2>

              
              <p class="size_text_banner">
                <?php if($product->discount_price): ?>
                  <span style="text-decoration:line-through;opacity:.7">
                    <?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ
                  </span>
                  &nbsp;
                  <span class="discount_tag">
                    <?php echo e(number_format($product->discount_price, 0, ',', '.')); ?> VNĐ
                  </span>
                <?php else: ?>
                  <?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ
                <?php endif; ?>
              </p>
            </div>
          </a>
        </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>

  

  
<div class="products_wrap">
  
  <?php $__currentLoopData = $viewData['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h4 id="category-<?php echo e($category->id); ?>" class="text-primary mt-4 mb-3"></h4>

   <div class="border_full"></div>
    
    <h4 class="text-primary mt-4 mb-3">🏷 <?php echo e($category->name); ?></h4>

   

    <div class="row_banner">
      <?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if(!($product->discount_price)): ?>  
          <div class="box_banner">   
            <a href="<?php echo e(route('product.show', ['id' => $product->id])); ?>" class="card"> 
              <img class="img_banner"
                   src="<?php echo e(asset('storage/products/' . $product->image)); ?>"     
                   alt="<?php echo e($product->name); ?>">                         
              
              <div class="card-body">  
                <h2 class="size_text_banner"><?php echo e($product->name); ?></h2>

                
                <p class="size_text_banner">
                  <?php if($product->discount_price): ?>
                    <span style="text-decoration:line-through;opacity:.7">
                      <?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ
                    </span>
                    &nbsp;
                    <span class="discount_tag">
                      <?php echo e(number_format($product->discount_price, 0, ',', '.')); ?> VNĐ
                    </span>
                  <?php else: ?>
                    <?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ
                  <?php endif; ?>
                </p>
              </div>
            </a>
          </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted ms-3">Không có sản phẩm nào trong danh mục này.</p>
      <?php endif; ?>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  © 2024 LaptopShop. All rights reserved.
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Khang\Desktop\Doan_Laptopstrore\Doan\Laptop-Store\resources\views/home/main.blade.php ENDPATH**/ ?>
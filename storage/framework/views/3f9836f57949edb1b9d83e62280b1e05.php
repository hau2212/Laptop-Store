 
<?php $__env->startSection('title', $viewData["title"]); ?>    
<?php $__env->startSection('subtitle', $viewData["subtitle"]); ?> 

<?php $__env->startSection('content'); ?>
<div class="home_container"> 

<?php $__empty_1 = true; $__currentLoopData = $viewData["orders"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 

<div class="card mb-4 shadow-sm"> 
    <div class="card-header bg-primary text-white">
        <h5>Order #<?php echo e($order->getId()); ?></h5> 
    </div>

    <div class="card-body">
        <p><b>Date:</b> <?php echo e($order->getCreatedAt()); ?></p> 
        <p><b>Địa chỉ giao hàng:</b> <?php echo e($order->address); ?></p> 
        <p><b>Số điện thoại:</b> <?php echo e($order->phone); ?></p> 

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $orderTotal = 0; ?> 

                <?php $__currentLoopData = $order->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php 
                        $itemTotal = $item->getPrice() * $item->getQuantity();  // Thành tiền của dòng
                        $orderTotal += $itemTotal;                               // Cộng dồn vào tổng đơn
                    ?>
                    <tr>
                        <td><?php echo e($item->getId()); ?></td> 
                        <td>
                            
                            <a class="link-success" href="<?php echo e(route('product.show', ['id' => $item->getProduct()->getId()])); ?>">
                                <?php echo e($item->getProduct()->getName()); ?>

                            </a>
                        </td>
                        <td>$<?php echo e(number_format($item->getPrice(), 2)); ?></td>   
                        <td><?php echo e($item->getQuantity()); ?></td>                    
                        <td>$<?php echo e(number_format($itemTotal, 2)); ?></td>           
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="table-secondary">
                    <th colspan="4" class="text-end">Order Total:</th>
                    <th>$<?php echo e(number_format($orderTotal, 2)); ?></th> 
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<div class="alert alert-warning" role="alert">
    You have not purchased anything in our store yet.
</div>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/myaccount/orders.blade.php ENDPATH**/ ?>
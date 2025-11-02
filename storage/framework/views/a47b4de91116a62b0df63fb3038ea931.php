<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('subtitle', $viewData["subtitle"]); ?>

<?php $__env->startSection('content'); ?>
<div class="home_container">
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">🛒 Products in Cart</h5>
    </div>
    <div class="card-body bg-light">

        
        <?php if(session('success')): ?>
            <div class="alert alert-success text-center fw-bold"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <?php if(count($viewData["products"]) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center bg-white">
                <thead class="table-primary">
                    <tr>                    
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $cartTotal = 0; ?>
                <?php $__currentLoopData = $viewData["products"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $qty = session('products')[$product->getId()];
                        $totalPrice = $product->getPrice() * $qty;
                        $cartTotal += $totalPrice;
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(asset('storage/products/' . $product->getImage())); ?>" 
                                 alt="<?php echo e($product->getName()); ?>" 
                                 class="img-thumbnail rounded" 
                                 style="width: 80px; height: 80px; object-fit: cover;">
                        </td>
                        <td><?php echo e($product->getId()); ?></td>
                        <td class="fw-semibold"><?php echo e($product->getName()); ?></td>
                        <td>$<?php echo e(number_format($product->getPrice(), 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.update', ['id' => $product->getId()])); ?>" method="POST" class="d-flex justify-content-center align-items-center">
                                <?php echo csrf_field(); ?>
                                <input type="number" 
                                       name="quantity" 
                                       value="<?php echo e($qty); ?>" 
                                       min="1"
                                       class="form-control text-center" 
                                       style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-success ms-2">
                                    <i class="bi bi-arrow-repeat"></i> Update
                                </button>
                            </form>
                        </td>
                        <td class="fw-bold">$<?php echo e(number_format($totalPrice, 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', ['id' => $product->getId()])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th colspan="5" class="text-end text-uppercase">Total to Pay:</th>
                        <th colspan="2" class="text-danger fw-bold">$<?php echo e(number_format($cartTotal, 2)); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        
        <div class="text-end mt-3">
            <a href="<?php echo e(route('cart.purchase')); ?>" class="btn btn-success me-2">
                <i class="bi bi-credit-card"></i> Purchase
            </a>
            <a href="<?php echo e(route('cart.delete')); ?>" class="btn btn-outline-danger">
                <i class="bi bi-x-circle"></i> Remove All
            </a>
        </div>

        <?php else: ?>
            <div class="alert alert-warning text-center">
                🛍️ Your cart is empty.
            </div>
        <?php endif; ?>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/cart/index.blade.php ENDPATH**/ ?>
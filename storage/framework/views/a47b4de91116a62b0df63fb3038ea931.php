<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('subtitle', $viewData["subtitle"]); ?>
<?php $__env->startSection('content'); ?>
<div class="home_container">
<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $viewData["products"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->getId()); ?></td>
                    <td><?php echo e($product->getName()); ?></td>
                    <td>$<?php echo e($product->getPrice()); ?></td>
                    <td>

                        <form action="<?php echo e(route('cart.update', ['id' => $product->getId()])); ?>" method="POST" class="d-flex justify-content-center">
                            <?php echo csrf_field(); ?>
                            <input type="number" name="quantity" value="<?php echo e(session('products')[$product->getId()]); ?>" min="1"
                                   class="form-control text-center" style="width: 80px;">
                            <button type="submit" class="btn btn-sm btn-success ms-2">Update</button>
                        </form>
                        
                    </td>
                    <td>
                        <form action="<?php echo e(route('cart.remove', ['id' => $product->getId()])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="quantity" value="0">
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> $<?php echo e($viewData["total"]); ?></a>
                <?php if(count($viewData["products"])>0): ?>
                    <a href="<?php echo e(route('cart.purchase')); ?>" class="btn bg-primary text-white mb-2">Purchase</a>
                    <a href="<?php echo e(route('cart.delete')); ?>" class="btn btn-danger mb-2">Remove all</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/cart/index.blade.php ENDPATH**/ ?>
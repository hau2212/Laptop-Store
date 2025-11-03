<?php $__env->startSection('title', $viewData['title']); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">📊 Admin Dashboard</h2>

    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-center bg-light border-success">
                <div class="card-body">
                    <h5 class="card-title">Tổng số sản phẩm</h5>
                    <h2><?php echo e($viewData['total_products']); ?></h2>
                </div>
            </div>
        </div>


        
        <div class="col-md-6">
            <div class="card text-center bg-light border-primary">
                <div class="card-body">
                    <h5 class="card-title">Tổng số người dùng</h5>
                    <h2><?php echo e($viewData['total_users']); ?></h2>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <strong>Sản phẩm mới nhất</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $viewData['latest_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($p->name); ?></td>
                        <td><?php echo e(number_format($p->price)); ?> đ</td>
                        <td><?php echo e($p->status); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>Người dùng mới đăng ký</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $viewData['latest_users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($u->name); ?></td>
                        <td><?php echo e($u->email); ?></td>
                        <td><?php echo e($u->created_at->format('d/m/Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/admin/dash.blade.php ENDPATH**/ ?>
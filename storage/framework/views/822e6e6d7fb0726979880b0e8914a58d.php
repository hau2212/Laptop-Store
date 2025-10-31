<?php $__env->startSection('title', 'Sửa sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Sửa sản phẩm: <?php echo e($product->name); ?></h2>

    <form action="<?php echo e(route('admin.product.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $product->name)); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="price" class="form-control" value="<?php echo e(old('price', $product->price)); ?>">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Giá khuyến mãi</label>
                <input type="number" name="discounted_price" class="form-control" value="<?php echo e(old('discounted_price', $product->discounted_price)); ?>">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="stock" class="form-control" value="<?php echo e(old('stock', $product->stock)); ?>">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Danh mục</label>
                <select name="category_id" class="form-select">
                    <option value="">-- Chọn danh mục --</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e($product->category_id == $cat->id ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select">
                <option value="active" <?php echo e($product->status == 'active' ? 'selected' : ''); ?>>Hoạt động</option>
                <option value="inactive" <?php echo e($product->status == 'inactive' ? 'selected' : ''); ?>>Ngừng hoạt động</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Hình ảnh</label><br>
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/products/' . $product->image)); ?>" width="100" class="mb-2">
            <?php endif; ?>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="<?php echo e(route('admin.products')); ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/admin/edit.blade.php ENDPATH**/ ?>
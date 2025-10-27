<?php $__env->startSection('title', 'Admin Dashboard - Products'); ?>
<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('public/css/admin/product/product_show.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <h2 class="mb-4">Quản lý sản phẩm</h2>

    
    <div class="card mb-5">
        <div class="card-header">
            <strong>Thêm sản phẩm mới</strong>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" name="price" id="price" class="form-control" value="<?php echo e(old('price')); ?>">
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="discounted_price" class="form-label">Giá khuyến mãi</label>
                        <input type="number" name="discounted_price" id="discounted_price" class="form-control" value="<?php echo e(old('discounted_price')); ?>">
                        <?php $__errorArgs = ['discounted_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="stock" class="form-label">Số lượng</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="<?php echo e(old('stock', 0)); ?>">
                        <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">-- Chọn danh mục --</option>

                            <?php $__currentLoopData = $viewData['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category -> id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php echo e(old('status')=='active' ? 'selected' : ''); ?>>Hoạt động</option>
                        <option value="inactive" <?php echo e(old('status')=='inactive' ? 'selected' : ''); ?>>Ngừng hoạt động</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">
            <strong>Danh sách sản phẩm</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $viewData['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->slug); ?></td>
                        <td><?php echo e(number_format($product->price)); ?></td>
                        <td><?php echo e($product->discounted_price ? number_format($product->discounted_price) : '-'); ?></td>
                        <td><?php echo e($product->stock); ?></td>
                        <td><?php echo e($product->category?->name ?? '-'); ?></td>
                        <td><?php echo e($product->status); ?></td>
                        <td>
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/products/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="60">
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="<?php echo e(route('admin.product.delete', $product->id)); ?>" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\Laptop_Store\resources\views/admin/main.blade.php ENDPATH**/ ?>
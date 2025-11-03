<?php $__env->startSection('title', 'Categories Management'); ?>

<?php $__env->startSection('content'); ?>
<h1>📂 Category Management</h1>

<a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary mb-3">➕ Add Category</a>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td><?php echo e($category->description); ?></td>
            <td>
                <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">🗑️ Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/admin/categories/indexCatogy.blade.php ENDPATH**/ ?>
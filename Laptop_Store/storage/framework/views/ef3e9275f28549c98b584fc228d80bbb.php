<?php $__env->startSection('style'); ?>
    <link rel='stylesheet' href="<?php echo e(asset('css/home_main/content_container.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', $viewData['title']); ?>

<?php $__env->startSection('content'); ?>
 <div class="home_container">
   <div class="container mt-5">
    <h1>Contact Us</h1>
    <p>Have any questions? Fill out the form below, and we'll get back to you soon.</p>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('contact.submit')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea name="message" class="form-control" rows="5" required><?php echo e(old('message')); ?></textarea>
        </div>

        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                    <input class="form-control" type="file" name="image">
                </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
 </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer' , $viewData['footer']); ?>
<?php echo $__env->make('layouts.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\DoAnCuoiKy_Website\Laptop-Store\Laptop-Store\Laptop_Store\resources\views/home/contact.blade.php ENDPATH**/ ?>
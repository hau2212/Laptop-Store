<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home_main/content_container.css')); ?>">
<style>
  /* Reset mọi lệch trái nếu CSS khác đang áp lên */
  .home_container .form-control { margin-left: 0 !important; }
  .home_container .form-label { margin-left: 0 !important; }
</style>
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
      <div class="alert alert-danger mb-4">
        <ul class="mb-0">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('contact.submit')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>

      <div class="row g-1 mb-3">
        <label for="name" class="col-sm-2 col-form-label text-sm-end">Your Name</label>
        <div class="col-sm-9">
          <input id="name" type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>
      </div>

      <div class="row g-1 mb-3">
        <label for="email" class="col-sm-2 col-form-label text-sm-end">Your Email</label>
        <div class="col-sm-9">
          <input id="email" type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>
      </div>

      <div class="row g-1 mb-3">
        <label for="message" class="col-sm-2 col-form-label text-sm-end">Your Message</label>
        <div class="col-sm-9">
          <textarea id="message" name="message" class="form-control" rows="5" required><?php echo e(old('message')); ?></textarea>
        </div>
      </div>

      <div class="row g-1 mb-3">
        <label for="image" class="col-sm-2 col-form-label text-sm-end">Image</label>
        <div class="col-sm-9">
          <input id="image" class="form-control" type="file" name="image" accept="image/*">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer' , $viewData['footer']); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/home/contact.blade.php ENDPATH**/ ?>
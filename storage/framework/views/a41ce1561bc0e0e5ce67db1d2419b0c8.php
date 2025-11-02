
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    
    <link href="<?php echo e(asset('css/admin/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet" />

    
    <title><?php echo $__env->yieldContent('title', 'Admin - Online Store'); ?></title>

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div class="admin-wrapper">

        
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <h2>ADMIN PANEL</h2>
            </div>

            <ul class="admin-menu">
                <li><a href="<?php echo e(route('admin.dashbroad')); ?>">📊 Dashboard</a></li>
<<<<<<< HEAD
                <li><a href="<?php echo e(route('admin.users.index')); ?>">👤 Users</a></li>
                <li><a href="<?php echo e(route('admin.products')); ?>">🛒 Products</a></li>
               
                <li><a href="<?php echo e(route('admin.categories.index')); ?>">📦 Catogries</a></li>
                <li>
                <form id="logout" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="logout-btn">🚪 Logout</button>
                </form>
    </li>
                 
=======
                <li><a href="<?php echo e(route('admin.product.store')); ?>">👤 Users</a></li>
                <li><a href="<?php echo e(route('admin.products')); ?>">🛒 Products</a></li>
                <li><a href="<?php echo e(route('admin.product.store')); ?>">📦 Orders</a></li>
                <li><a href="<?php echo e(route('admin.product.store')); ?>">🚪 Logout</a></li>
>>>>>>> origin/nguyen-main
            </ul>
        </aside>
        <!-- /sidebar -->

        
        <div class="col content-grey">
            
            <nav class="p-3 shadow d-flex justify-content-end align-items-center gap-2">
                <img class="img-logo-small" src="<?php echo e(asset('img/logo.png')); ?>" alt="Admin logo">
                <span class="profile-font fw-bold fs-5 text-dark me-2">Admin</span>
            </nav>
            
            <div class="g-0 m-5">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright -
                <a class="text-reset fw-bold text-decoration-none" target="_blank" rel="noopener"
                   href="https://twitter.com/danielgarax">
                    Daniel Correa
                </a>
            </small>
        </div>
    </div>
    <!-- /footer -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Doan\Laptop-Store\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
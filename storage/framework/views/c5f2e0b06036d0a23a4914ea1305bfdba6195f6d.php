<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">


    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(ucwords($setting->title)); ?></title>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 bg-info text-light px-4" >
                <h2 class='text-center my-3'><?php echo e(ucwords($setting->title)); ?></h2>
                <hr/>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                <a class='component text-light btn btn-info btn-block' href="<?php echo e(route('show-setting')); ?>"><i class="fas fa-cogs"></i> Setting</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-orders')): ?>
                <a href="<?php echo e(route('show-orders')); ?>" class='component btn btn-info text-light btn-block'><i class="fas fa-store"></i> Orders</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-products')): ?>
                <a class='component text-light btn btn-info btn-block' href="<?php echo e(route('show-products')); ?>"><i class="fas fa-warehouse"></i> Products</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-members')): ?>
                <a class='component text-light btn btn-info btn-block' href="<?php echo e(route('show-members')); ?>"><i class="fas fa-user-friends"></i> Member</a>
                <?php endif; ?>
            </div>
            <div class="col-md-10 text-secondary">
                <div class='row bg-white shadow-sm justify-content-end px-3'>
                    <h2 class='my-3'><?php echo e(ucwords(Auth::user()->getRoleNames()[0])); ?></h2>
                    <!--Logout-->
                    <a href="<?php echo e(route('get-logout')); ?>" class="text-secondary"><h2 class='my-3 pl-2 ml-2 border-left'><i class="fas fa-power-off"></i></h2></a>
                </div>
                <?php echo $__env->yieldContent('component'); ?>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH D:\Training\Laravel\shop-site\resources\views/admin/layouts/manage.blade.php ENDPATH**/ ?>
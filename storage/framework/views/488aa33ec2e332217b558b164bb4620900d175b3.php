<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-3">
           <ul class="list-group">
               <li class="list-group-item"><a href="<?php echo e(route("profile")); ?>">Profile</a></li>
               <li class="list-group-item"><a href="<?php echo e(route("home")); ?>">Order</a></li>
           </ul>
        </div>
        <div class="col-9">
            <?php echo $__env->yieldContent('article'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/layouts/user.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    
    <div class="w-50 m-auto">
        <form action="<?php echo e(route('submitOrder')); ?>" method="POST">
            <label for="name">Name</label>
            <input class="form-control mb-3" type="text" name="name" value="<?php echo e(Auth::check() ? Auth::user()->name : NULL); ?>"/>
            <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <label for="phone">Phone</label>
            <input class="form-control  mb-3" type="text" name="phone" value="<?php echo e(Auth::check() ? Auth::user()->phone : NULL); ?>"/>
            <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <label for="address">Address</label>
            <input class="form-control  mb-3" type="text" name="address" value="<?php echo e(Auth::check() ? Auth::user()->address : NULL); ?>"/>
            <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            <?php echo csrf_field(); ?>
            <input class="btn btn-success btn-block mt-5" type="submit" value="Checkout"/>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/checkout\form.blade.php ENDPATH**/ ?>
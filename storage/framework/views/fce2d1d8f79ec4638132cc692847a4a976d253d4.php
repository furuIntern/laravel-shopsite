<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <b>#<?php echo e($order->id); ?></b>
                    </div>
                    <div>
                        <b><?php echo e($order->name); ?></b>
                    </div>
                    <div>
                        <a href="<?php echo e(route('delete-order',['order'=>$order->id])); ?>" class="badge badge-danger">&times; Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2 text-center">
                        ID
                    </div>
                    <div class="col-5 text-center">
                        Product
                    </div>
                    <div class="col-3 text-center">
                        Price
                    </div>
                    <div class="col-2 text-center">
                        Amount
                    </div>
                </div>
                <?php $__currentLoopData = $orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <hr/>
                <div class="row">
                    <div class="col-2 text-center">
                        <?php echo e($detail->product->id); ?>

                    </div>
                    <div class="col-5 text-center">
                        <?php echo e($detail->product->name); ?>

                    </div>
                    <div class="col-3 text-center">
                        <?php echo e($detail->product->price); ?>

                    </div>
                    <div class="col-2 text-center">
                        <?php echo e($detail->amount); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/admin/orderdetail.blade.php ENDPATH**/ ?>
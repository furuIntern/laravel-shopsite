
        <ul class="list-group">
            
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item justify-content-between d-flex">
                <div>
                    <h6><?php echo e($item->name); ?></h6>
                    <strong>Qty: <?php echo e($item->qty); ?></strong>
                </div>
                <span>$<?php echo e($item->price); ?></span>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item justify-content-between d-flex">
                <strong>Total:</strong>
                <strong><?php echo e($total); ?></strong>
            </li>
            <li class="list-group-item text-center p-0">
                <button class="btn btn-success btn-block"><a href="<?php echo e(route('detailCart')); ?>" style="text-decoration:none ; color:#fff">Detail</a></button>
            </li>
        </ul><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/cart\show.blade.php ENDPATH**/ ?>
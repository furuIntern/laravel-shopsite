    <h4 class="d-flex justify-content-between">
        <strong>Cart</strong>
       
            <span class="badge badge-secondary"><?php echo e(Cart::count()); ?></span>
        
    </h4>
    <?php if(Session::has('cart')): ?>
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
                <a  class="btn btn-success btn-block link" 
                    href="<?php echo e(route('detailCart')); ?>">
                    Detail
                </a>
                <a  class="btn btn-danger btn-block link mt-2" 
                    href="<?php echo e(route('deleteCart')); ?>" name="deleteCart">
                    Delete Cart
                </a>
            </li>
        </ul>
    <?php else: ?>
        <ul class="list-group">
            <li class="list-group-item">
                <h4>Empty Cart</h4> 
            </li>
        </ul>
    <?php endif; ?> <?php /**PATH D:\Training\Laravel\shop-site\resources\views/cart\show.blade.php ENDPATH**/ ?>

    <h4 class="d-flex justify-content-between">
        <strong>Cart</strong>
        <?php if(Session::has('cart')): ?>
            <span class="badge badge-secondary"><?php echo e(Cart::count()); ?></span>
        <?php endif; ?>
    </h4>

    <?php if(Session::has('cart')): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item justify-content-between d-flex">
                <div>
                    <h6><?php echo e($item->name); ?></h6>
                    <label for="">Qty</label>
                    <input class="form-control" name="qty" value="<?php echo e($item->qty); ?>"/>
                </div>
                <span>$<?php echo e($item->price); ?></span>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item justify-content-between d-flex">
                <strong>Total:</strong>
                <strong><?php echo e($total); ?></strong>
            </li>
            <li class="list-group-item text-center">
                <button class="btn btn-success btn-block"><a href="<?php echo e(route('detailCart')); ?>" style="text-decoration:none ; color:#fff">Detail</a></button>
            </li>
        </ul>
        
    <?php else: ?>
        <ul class="list-group">
            <li class="list-group-item">
               <h4>Empty Cart</h4> 
            </li>
        </ul>
    <?php endif; ?><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/cart\show.blade.php ENDPATH**/ ?>
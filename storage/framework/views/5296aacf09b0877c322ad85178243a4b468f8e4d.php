<?php $__env->startSection('content'); ?>

<div class="row mt-3">
    <div class="col-md-9">
        <?php echo $__env->yieldContent('main'); ?>
    </div>
    <div class="col-md-3">
        <div class="mb-3" id="shoppingCart">
            <h4 class="d-flex justify-content-between">
                <strong>Cart</strong>
                <?php if(Session::has('cart')): ?>
                    <span class="badge badge-secondary"><?php echo e(Cart::count()); ?></span>
                <?php endif; ?>
            </h4>
            
            <?php if(Session::has('cart')): ?>
                <ul class="list-group cart">
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item justify-content-between d-flex">
                        <div>
                            <h5><?php echo e($item->name); ?></h5>
                            <strong>Qty: <?php echo e($item->qty); ?></strong>
                        </div>
                        <span>$<?php echo e($item->price); ?></span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item justify-content-between d-flex">
                        <strong>Total:</strong>
                        <strong><?php echo e(Cart::total()); ?></strong>
                    </li>
                    <li class="list-group-item text-center p-0">
                        <button class="btn btn-success btn-block"><a href="<?php echo e(route('detailCart')); ?>" style="text-decoration:none ; color:#fff">Detail</a></button>
                    </li>
                </ul>
                
            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item">
                       <h4>Empty Cart</h4> 
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    
        <div class="container card">
            <h4 class="content-center">Fillter</h4>
            <form class="m-3" id="demo">
                <div class="form-group">
                    <input class="fillter" value="desc" type="checkbox" name="popular" id=""/>
                    <span><label for="">Best Seller</label></span>
                </div>
                <div class="form-group">
                    <label for="min_price">From</label>
                    <input class="form-control rangePrice" type="number" name="min_price" id="min_price" min="0"  max="<?php echo e(App\Products::max('price')); ?>" value="0"/>
                    <label for="max_price">To</label>
                    <input class="form-control rangePrice" type="number" name="max_price" id="max_price" min="0" value="9999999"/>
                    <br/>
                    <input class="fillter" value="desc" type="radio" name="price" id=""/>
                    <span><label for="">Price Down</label></span>
                    <br/>
                    <input class="fillter" value="asc" type="radio" name="price" id=""/>
                    <span><label for="">Price Up</label></span>
                </div>
                    
                <div class="form-group">
                    <input class="fillter" type="radio" value="desc" name="time" id=""/>
                    <span><label for="">Newest</label></span>
                    <br/>
                    <input class="fillter" type="radio" value="asc" name="time" id=""/>
                    <span><label for="">Oldest</label></span>
                </div>
                    
            </form>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\ShopSite\resources\views/layouts\shop.blade.php ENDPATH**/ ?>

<div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mr-3 ml-3 mb-3" style="width:15rem; text-align:center">
            <a href="<?php echo e(route('detail' , [ 'id' => $product->id])); ?>">
                <img class="" src="<?php echo e($product->img); ?>" alt="" style="width: 100%">
            </a>
            <div class="card-body">
              <h3 class="card-title"><?php echo e($product->name); ?></h3>
            </div>
            <div class="row mb-2">
              <strong class="m-auto">$<?php echo e($product->price); ?></strong>
              <button id="<?php echo e($product->id); ?>" class="btn btn-success m-auto ">
                  Add-To-Cart
              </button>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div>
    <?php echo e($products->links()); ?>

</div>
<?php /**PATH D:\Training\Laravel\shop-site\resources\views/shop\showProduct.blade.php ENDPATH**/ ?>
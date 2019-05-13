<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <form action="<?php echo e($product->id); ?>/edit" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <div class="card shadow">
        <div class="card-header">
            <a href="<?php echo e(route('show-products')); ?>" class='float-left'>Back</a>
            <a href="delete/<?php echo e($product->id); ?>" class='badge badge-danger float-right'>
                &times; Delete
            </a>
            <div class="text-center">
                <b><?php echo e($product->name); ?></b>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                <div class="col-lg-7">
                    <img class='w-100' src="<?php echo e(asset('storage/ImageProduct/'.$product->id.'.png')); ?>" alt="">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img" name='img'>
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div>Price</div>
                    <input name='price' step='1000' type="number" value='<?php echo e($product->price); ?>' class="form-control"/>
                    <div class="row">
                        <div class="col-6">
                            <div>Amount</div>
                            <input name='amount' type="number" value='<?php echo e($product->amount); ?>' class='form-control'/>
                        </div>
                        <div class="col-6">
                            <div class='text-center'>Sold</div>
                            <h3 class='text-center'><?php echo e($product->sold); ?></h3>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-success">
                Confirm
            </button>
        </div>
    </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script> 
    $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/admin\productdetail.blade.php ENDPATH**/ ?>
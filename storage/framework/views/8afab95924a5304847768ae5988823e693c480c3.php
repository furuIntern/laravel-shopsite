<?php $__env->startSection('content'); ?>
    <div class=row>
        <div class="col-sm-5">
            <img src="<?php echo e($product->img); ?>" alt="">
        </div>
        <div class="col-sm-7">
            <div class="card">
                <p><?php echo e($product->description); ?></p>
            </div>
            <div>
                <form class="d-flex justify-content-between">
                    <div class="form-group">
                        <label class="form-label" for="amount">Amount</label>
                        <input class="form-control" type="number" min="1" value="<?php echo e($product->amount); ?>" name="amount" id="amount"/>
                    </div>
                    <div>
                        <input class="btn btn-success" style="margin: 2rem 0 auto 0" type="submit" value="Add-To-Cart" name="addCart" data-id="<?php echo e($product->id); ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('input[name="addCart"]').click(function() {
                
                axios.post('route("addCart")', {
                    id: $(this).data('id'),
                    amount : $('#amount').val()
                })
                 .then(function(data) {
                    
                 })
                 .catch(function(error) {

                 })
            });
            
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/product\detailProduct.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="mt-5" id="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Price</th>
                    <th>TotalPrice</th>
                </tr>
            </thead>
            <tbody id="items">
              
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->name); ?></td>
                        <td><input class="form-control col-5" type="number" name="qty" value="<?php echo e($item->qty); ?>" data-id="<?php echo e($item->id); ?>"/></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php echo e($item->tax * $item->qty); ?></td>
                        <td><?php echo e($item->subtotal); ?></td>
                        <td><?php echo e($item->total); ?></td>
                        <td><input class="btn btn-danger" type="submit" name="delete" value="Delete" data-id="<?php echo e($item->id); ?>"/></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="6">Total Bill:</td>
                    <td><?php echo e($total); ?></td>
                </tr>
            </tbody>
            
        </table>
        <button class="btn btn-success" type="button"><a href="<?php echo e(route('checkout')); ?>">Checkout</a></button>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

            $(document).on('change','input[name="qty"]', function() {
                    var qty = $(this).val();
                    var id = $(this).data('id');
                    axios.post('<?php echo e(route("editCart")); ?>', {
                        id: id,
                        qty: qty
                    })
                     .then(function(data) {
                        
                        $('#items').html(data.data);
                        
                     })
                     .catch(function(error) {
                         
                     })
                })
                $(document).on('click','input[name="delete"]',function() {
                    var id= $(this).data('id');
                    axios.post('<?php echo e(route("delete")); ?>', {
                        id: id
                    })
                     .then(function(data) {
                        $('#items').html(data.data);
                     })
                     .catch(function(error) {
                        
                     })
                })
                /*$('button[type="submit"]').click(function() {
                    axios.get('<?php echo e(route("checkout")); ?>')
                        .then(function(data) {
                            $('#content').html(data.data);
                        })
                })
                */ 
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/cart\detailCart.blade.php ENDPATH**/ ?>
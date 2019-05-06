<?php $__env->startSection('content'); ?>
    <div class="mt-5" id="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>TotalPrice</th>
                </tr>
            </thead>
            <tbody id="items">
                        
            </tbody>
            
        </table>
        <button type="button"><a href="<?php echo e(route('checkout')); ?>">Checkout</a></button>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            showDetail();
            function showDetail() {
                axios.post('<?php echo e(route("items")); ?>')
                    .then(function(data) {
                        
                        $('#items').html(data.data);
                    })
                    .catch(function(error) {

                    })
            }
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
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/cart\detailCart.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
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
                         console.log(data);
                     })
                     .catch(function(error) {
                        alert(error);
                     })
                }) 
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/cart\detailCart.blade.php ENDPATH**/ ?>
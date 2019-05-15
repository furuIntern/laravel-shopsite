<?php $__env->startSection('article'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div id="content" class="table-responsive">
                        <?php echo $__env->make('user\element\table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

            $(document).on('click','a[name="detail"]',function(e) {
                
                e.preventDefault();
                axios.post('<?php echo e(route("detail")); ?>', {

                    id: $(this).data('id')
                })
                 .then(function(data) {

                    $('#content').html(data.data);
                 })
            })
            
            $(document).on('click','a[name="back"]',function(e) {
                
                e.preventDefault();
                axios.post('<?php echo e(route("home")); ?>')
                 .then(function(data) {

                    $('#content').html(data.data);
                 })    
            })

            $('a[name="delete"]').click(function(e) {

                e.preventDefault();
                axios.post('<?php echo e(route("deleteOrder")); ?>', {

                    id: $(this).data('id')
                }).then(function(data) {

                    $('#content').html(data.data);
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/home.blade.php ENDPATH**/ ?>
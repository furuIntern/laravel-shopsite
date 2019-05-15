<?php $__env->startSection('main'); ?>
    <div id="products">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mr-3 ml-3 mb-3" style="width:15rem; text-align:center">
                    <a href="<?php echo e(route('detailProduct' , [ 'id' => $product->id ] )); ?>">
                        <img class="" src="<?php echo e(asset('storage/ImageProduct/'.$product->id.'.png')); ?>" alt="" style="width: 100%">
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
    </div>  
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
        <script>
            $(document).ready(function() {
                
                $(document).on('click','.btn-success' , function() {
                    
                    axios.post('<?php echo e(route("addCart")); ?>' , {

                        id : $(this).attr('id')
                    })
                        .then(function(data) {
      
                            $('#shoppingCart').html(data.data);
                        })
                        .catch(function(error) {

                        })
                })
                
                $(document).on('click','.category',function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                
                    axios.get("<?php echo e(route('category')); ?>", {
                        params: {
                            id: id
                        }
                    })
                    .then(function(data) {
                     
                        $('#products').html(data.data);
                    })
                    .catch(function(error) {

                    })
                })

                $(document).on('click','.fillter',function() {
                    
                    axios.get('<?php echo e(route("filter")); ?>', {
                        params: {
                            price: $('input[name="price"]:checked').val(),
                            time: $('input[name="time"]:checked').val(),
                            popular: $('input[name="popular"]:checked').val()
                            
                        }
                    })
                     .then(function(data) {
                        $('#products').html(data.data);
                     })
                     .catch(function(error) {

                     })
                    
                })
                function checked(val,e) {
                    if(val.val() > parseInt(val.attr('max')) || val.val() < parseInt(val.attr('min'))) {
                        e.preventDefault()
                        $(val).val(0);
                        return false;
                    }
                    return true;
                }
                $(document).on('blur','.rangePrice',function(e) { 
                    if(!checked($(this),e)) {
                        return false;
                    }

                    var min = $('input[name="min_price"]').val();
                    var max = $('input[name="max_price"]').val();

                    if(min > max) {
                        $('.eRange').css('display','block');
                        return false;
                    }

                    $('.eRange').css('display','none');

                    axios.get('<?php echo e(route("filter")); ?>', {
                        params: {
                            rangePrice: [
                                min,
                                max
                            ]
                        }
                    })
                     .then(function(data) {
                       
                        $('#products').html(data.data);
                     })
                     .catch(function(error) {

                     })
                })

                $(document).on('click','a[name="deleteCart"]',function(e) {
            
                    e.preventDefault();
                    axios.post('<?php echo e(route("deleteCart")); ?>')
                        .then(function(data) {
                            $('#shoppingCart').html(data.data);
                        }) 
                })

                $(document).on('click','.page-link' , function(e) {
                    e.preventDefault();

                    var link = $(this).attr('href');

                    axios.post(link)
                        .then(function(data) {
                            $('#products').html(data.data);
                        })
                        .catch(function(error) {

                        })
                })

                               
            })
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/shop\mainPage.blade.php ENDPATH**/ ?>
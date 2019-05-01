<?php $__env->startSection('content'); ?>
    <div id="products">

    </div>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aside'); ?>
    <div class="mb-3" id="shoppingCart">
       
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
                <input class="form-control rangePrice" type="number" name="max_price" id="max_price" min="0" value="<?php echo e(App\Products::max('price')); ?>"/>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <script>
            $(document).ready(function() {
                
                axios.post('<?php echo e(route("product")); ?>', {
                   
                })
                .then(function(data) {
                   
                    $('#products').html(data.data);
                })
                .catch(function(error) {

                })
                showCart();
                function showCart(id) {
  

                    axios.post('<?php echo e(route("addCart")); ?>' , {
                        id : id
                    })
                        .then(function(data) {
      
                            $('#shoppingCart').html(data.data);
                        })
                        .catch(function(error) {

                        })
                }
                $(document).on('click','.btn-success' , function() {
                    var id = $(this).attr('id');
                    showCart(id);
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
                    var price = $('input[name="price"]:checked').val();
                    var time = $('input[name="time"]:checked').val();
                    var popular = $('input[name="popular"]:checked').val();
                   
                    axios.get('<?php echo e(route("filter")); ?>', {
                        params: {
                            price: price,
                            time: time,
                            popular: popular
                            
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
                    
                    var rangePrice = [
                            $('input[name="min_price"]').val(),
                            $('input[name="max_price"]').val()
                    ];
                   
                    axios.get('<?php echo e(route("filter")); ?>', {
                        params: {
                            rangePrice: rangePrice
                        }
                    })
                     .then(function(data) {
                       
                        $('#products').html(data.data);
                     })
                     .catch(function(error) {

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

<?php echo $__env->make('layouts\app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/shop\mainPage.blade.php ENDPATH**/ ?>
<div class="col-3">
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
</div><?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/element\aside.blade.php ENDPATH**/ ?>
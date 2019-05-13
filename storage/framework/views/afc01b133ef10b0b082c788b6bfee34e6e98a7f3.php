<?php $__env->startSection('component'); ?>

<div class="container my-5">
    <div class="card mt-3 p-3">
        <h2>Categories</h2>
        <div class="row">
            <?php $__currentLoopData = $categoryShowed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-2">
                <a href="category/hidden/<?php echo e($category->id); ?>" class='btn btn-primary btn-block'><?php echo e($category->name); ?></a>
                <input type="number" value='<?php echo e($category->level); ?>' data-category='<?php echo e($category->id); ?>' class="form-control mt-2 level">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <hr/>
        <div class="row">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-2">
                <div class="btn-group btn-block">
                    <a href="category/show/<?php echo e($category->id); ?>" class="btn btn-warning">
                    <?php echo e($category->name); ?>

                    </a>
                    <a href="category/delete/<?php echo e($category->id); ?>" class ='btn btn-danger'>&times;</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md">
            <div class="card">
                <div class="d-flex justify-content-between p-3">
                    <div>
                        <h2 class='my-0'>Title</h2>
                    </div>
                    <div>
                        <form action="setting/title" method='post'>
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" name='title' value='<?php echo e($setting->title); ?>' class="form-control"/>
                                <div class="input-group-append">
                                    <button class="btn btn-success">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card p-3 mt-3">
                <h2>Description</h2>
                <hr/>
                <div>
                    <form action="setting/description" method="post">
                        <?php echo csrf_field(); ?>
                        <textarea name="description" class='form-control' style='min-height:250px'><?php echo e($setting->description); ?></textarea>
                        <div class="mt-2 text-right">
                            <button class="btn btn-success">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card p-3 mt-3">
                <div class="d-flex justify-content-between">
                    <h2>Products</h2>
                    <div>
                        <form action="setting/sortBy" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <select name="sortBy" class='custom-select' id="">
                                    <option value="best sell" <?php echo e($setting->sort_product == 'best sell' ? 'selected' :''); ?>>Best sell</option>
                                    <option value="newest" <?php echo e($setting->sort_product == 'newest' ? 'selected' :''); ?>>Newest</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr/>
                <div class="row">
                <!--*  Product  *-->
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4">
                        <a href="product/<?php echo e($product->id); ?>">
                            <img class='w-100 border' src="<?php echo e(asset('storage/ImageProduct/'.$product->id.'.png')); ?>" alt=""/>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card p-3">
                <h2>Logo</h2>
                <img src="<?php echo e(asset('storage/logo.png')); ?>" class='w-100 my-2' alt="">
                <hr>
                <form action="setting/logo" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-success">Apply</button>
                        </div>
                        <div class="custom-file">
                            <input type="file" name='logo' class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(".custom-file-input").on("change", function() {
       var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    const ajax = axios.create({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('.level').change(function(e){
        ajax.post('category/level/'+this.dataset.category,{
            level : $(this).val(),
        }); 
    });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/manage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/admin/setting.blade.php ENDPATH**/ ?>
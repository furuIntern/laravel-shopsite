<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div></div>
    <div> <!---->
        <ul class="navbar-nav" id="bar">
            <li class="nav-item">
                <a class="nav-link" href="">pages</a>
            </li>
            <li class="nav-item ">
                <a id="navbarDropdown" class="nav-link" href="<?php echo e(route('shop')); ?>">
                    shop
                </a>
                <ul class="">
                        <?php $__currentLoopData = App\Categories::with('children')->where('parent_id', NULL)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <li class="">
                            <a data-id="<?php echo e($parent->id); ?>" class="category" href=""><?php echo e($parent->name); ?></a>
                            
                            <?php if(!empty($parent->children[0])): ?>
                                <ul class="">
                                    <?php $__currentLoopData = $parent->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a data-id="<?php echo e($chill->id); ?>" class="category" href=""><?php echo e($chill->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <li class="nav-item"><a href=""></a></li>
            <li class="nav-item"><a href=""></a></li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\lavarel\laravel-shopsite\resources\views/element\navbar.blade.php ENDPATH**/ ?>
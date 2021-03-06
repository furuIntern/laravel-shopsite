<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('login')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="container w-50 my-5">
        <div class="card shadow border-primary">
            <div class="card-header bg-primary text-light"><h2 class='text-center'><b>Login</b></h2></div>
            <div class="container my-3">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">Your username or password is incorrect</div>
                <?php endif; ?>
                <div class='row'>
                    <div class="col-md-8">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light border-primary">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <!--Input username-->
                            <input type="text" class="form-control border-primary" name='username' placeholder='Username'/>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light border-primary">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <!--Input password-->
                            <input type="password" class="form-control border-primary" name='password' placeholder='Password'/>
                        </div>
                    </div>
                    <div class="col-md-4 border-left text-center">
                        <div class="btn-group-vertical btn-group-lg">
                            <button class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                            <a href="<?php echo e(route('register')); ?>" class="btn border-primary text-primary">
                            <i class="fas fa-user-edit"></i> Register
                            </a>
                        </div>
                        <div>
                        <a href="<?php echo e(route('password.request')); ?>">Forgot password</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/auth/login.blade.php ENDPATH**/ ?>
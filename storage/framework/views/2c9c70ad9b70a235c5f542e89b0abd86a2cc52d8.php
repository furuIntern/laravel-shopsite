<?php $__env->startSection('component'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger text-center w-50 container fixed-top">Your request is invalid</div>
<?php endif; ?>
<div class="container mt-3">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-members')): ?>
    <div class="text-right">
        <button class='btn btn-light ml-role' data-toggle="collapse" data-target="#role"><i class="fas fa-bars"></i> Role</button>
        <button class='btn btn-light ml-2' data-toggle="modal" data-target="#addMember"><i class="fas fa-plus"></i> Member</button>
    </div>

    <!-- show roles -->
    <div class="collapse text-left" id='role'>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="btn-group mt-2 mr-2">
                <button class="btn btn-primary role" data-toggle="modal" data-target="#permissions"><?php echo e($role->name); ?></button>
                <a href="<?php echo e(route('delete-role',['role'=>$role->id])); ?>" class ='btn btn-danger'>&times;</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button class="btn btn-outline-primary mt-2" data-toggle='modal' data-target='#addRole'><i class="fas fa-plus"></i> Add</button>
    </div>
<hr/>
 <!-- Add role form  -->
<div class="modal fade" id='addRole'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo e(route('add-role')); ?>" method="post">
            <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class='text-dark'><b>New role</b></h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <input type="text" class="form-control mb-2" name='role' placeholder='Name'/>
                    <div class="row">
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key != 0): ?>
                        <div class="col-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name='permiss[<?php echo e($permission->id); ?>]' class="custom-control-input" id="permission-<?php echo e($permission->id); ?>">
                                <label class="custom-control-label" for="permission-<?php echo e($permission->id); ?>"><?php echo e(ucwords(str_replace('-',' ',$permission->name))); ?></label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name='permiss[<?php echo e($permissions[0]->id); ?>]' class="custom-control-input" id="permission-<?php echo e($permissions[0]->id); ?>">
                                <label class="custom-control-label" for="permission-<?php echo e($permissions[0]->id); ?>"><?php echo e(ucwords($permissions[0]->name)); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer text-center justify-content-center">
                    <button class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Form add member -->
<div class="modal fade" id='addMember'>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="members/add" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <div class="modal-title">
                        <h5 class='text-dark'><b>New member</b></h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Name</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name='name' class="form-control" placeholder='Name...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Phone</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='phone' placeholder='Number phone...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Email</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='email' placeholder='Email...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Username</div>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name='username' placeholder='Username...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class='text-secondary text-right'>Password</div>
                            </div>
                            <div class="col-md-8">
                            <input type="password" class="form-control" name='password' placeholder='Password...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-secondary text-right">
                                Confirm password
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name='password_confirmation' placeholder='Confirm password...'/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-secondary text-right">
                                Role
                            </div>
                            <div class="col-md-8">
                                <select name="role" class='custom-select'>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($role->name); ?>"><?php echo e(ucwords($role->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center justify-content-center">
                    <button class="btn btn-success">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End form add member -->
<?php endif; ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class='col-2 text-center'><b>ID</b></div>
                <div class='col-7 text-center'><b>Username</b></div>
                <div class='col-3 text-center'><b>Role</b></div>
            </div>
        </div>
        <div class="card-body">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="member/<?php echo e($user->id); ?>">
                    <div class="row my-2 py-2 text-muted">
                        <div class="col-2 text-center"><?php echo e($user->id); ?></div>
                        <div class="col-7 text-center"><?php echo e($user->username); ?></div>
                        <div class="col-3 text-center"><?php echo e($user->getRoleNames()[0]); ?></div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class='d-flex justify-content-center mt-5'><?php echo e($users->links()); ?></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $('.alert').fadeOut('slow');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.manage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Training\Laravel\shop-site\resources\views/Admin/memberlist.blade.php ENDPATH**/ ?>
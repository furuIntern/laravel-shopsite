<?php if($items): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Phone</td>
                                        <td>Address</td>
                                        <td>Total Amount</td>
                                        <td>Total Price</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                       
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($item->name); ?></td>
                                                    <td><?php echo e($item->phone); ?></td>
                                                    <td><?php echo e($item->address); ?></td>
                                                    <td><?php echo e($item->total_amount); ?></td>
                                                    <td><?php echo e($item->total_price); ?></td>
                                                    <td><a class="btn btn-primary" name="detail" data-id="<?php echo e($item->id); ?>" href="">Detail</a></td>
                                                    <td><a class="btn btn-danger" name="delete" data-id="<?php echo e($item->id); ?>" href="">Delete</a></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    
                                        
                                    </tbody>
                            </table>
                            <?php echo e($items->links()); ?>  
                        <?php else: ?>
                            <div>
                                Emty Order
                            </div>
                        <?php endif; ?>
<?php /**PATH D:\Training\Laravel\shop-site\resources\views/user\element\table.blade.php ENDPATH**/ ?>
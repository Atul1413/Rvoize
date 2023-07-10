

<?php $__env->startSection('content'); ?>
    <div class="upper-title-box">
        <h3><?php echo e(__("My Contact")); ?></h3>
        <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("My Contact")); ?></h4>

                        <div class="chosen-outer">
                            <form method="get" class="default-form form-inline" action="<?php echo e(route('user.my-contact')); ?>">
                                <!--Tabs Box-->
                                <div class="form-group mb-0 mr-1">
                                    <select class="form-control" name="order_by" onchange="this.form.submit()">
                                        <option value=""><?php echo e(__("Order By")); ?></option>
                                        <option value="newest" <?php if(request()->get('order_by') == 'newest'): ?> selected <?php endif; ?>><?php echo e(__("Newest")); ?></option>
                                        <option value="oldest" <?php if(request()->get('order_by') == 'oldest'): ?> selected <?php endif; ?>><?php echo e(__("Oldest")); ?></option>
                                    </select>
                                </div>
                                <div class="form-group mb-0 mr-1">
                                    <input type="text" name="s" placeholder="<?php echo e(__("Search by email, name,...")); ?>" value="<?php echo e(request()->get('s')); ?>" class="form-control">
                                </div>
                                <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Search")); ?></button>
                            </form>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-job-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(__("Name")); ?></th>
                                    <th><?php echo e(__("Email")); ?></th>
                                    <th><?php echo e(__("Message")); ?></th>
                                    <th><?php echo e(__("Time Sent")); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if($rows->count() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->name); ?></td>
                                            <td><?php echo e($row->email); ?></td>
                                            <td><?php echo e($row->message); ?></td>
                                            <td><?php echo e(display_date($row->created_at)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center"><?php echo e(__("No Items")); ?></td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="ls-pagination">
                                <?php echo e($rows->appends(request()->query())->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Contact/Views/frontend/user/my-contact.blade.php ENDPATH**/ ?>
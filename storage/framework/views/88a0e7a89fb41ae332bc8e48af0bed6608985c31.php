

<?php $__env->startSection('content'); ?>
    <div class="bravo_user_profile p-0">
        <div class="upper-title-box">
            <h3 class="title"><?php echo e(__("Change Password")); ?></h3>
            <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <form action="<?php echo e(route("user.change_password.update")); ?>" method="post" class="default-form pb-4">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong><?php echo e(__('Change Password')); ?></strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <label><?php echo e(__("Current Password")); ?></label>
                                    <input type="password" name="current-password" placeholder="<?php echo e(__("Current Password")); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__("New Password")); ?></label>
                                    <input type="password" name="new-password" placeholder="<?php echo e(__("New Password")); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__("New Password Again")); ?></label>
                                    <input type="password" name="new-password_confirmation" placeholder="<?php echo e(__("New Password Again")); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="theme-btn btn-style-one mr-2" value="<?php echo e(__("Update")); ?>">
                                    <a href="<?php echo e(route("user.dashboard")); ?>" class="theme-btn btn-style-two"><?php echo e(__("Cancel")); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div class="bravo_user_profile">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\rvoize\modules/User/Views/frontend/changePassword.blade.php ENDPATH**/ ?>
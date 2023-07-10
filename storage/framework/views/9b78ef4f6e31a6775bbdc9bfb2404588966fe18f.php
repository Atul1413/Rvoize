

<?php $__env->startSection('content'); ?>
    <div class="login-section">
        <div class="image-layer" style="background-image: url(<?php echo e(asset('module/superio/images/background/12.jpg')); ?>);"></div>
        <div class="outer-box">
            <!-- Login Form -->
            <div class="login-form default-form bravo-login-form-page bravo-login-page">
                <div class="form-inner">
                    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if($site_title = setting_item("site_title")): ?>
                        <h3><?php echo e(__("Login to :site_title", ['site_title' => $site_title])); ?></h3>
                    <?php else: ?>
                        <h3><?php echo e(__("Login")); ?></h3>
                    <?php endif; ?>
                </div>
                <?php echo $__env->make('Layout::auth.login-form',['captcha_action'=>'login_normal','popup'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout::auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>
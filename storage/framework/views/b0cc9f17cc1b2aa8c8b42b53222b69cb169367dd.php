<div class="model bc-model" id="login">
    <!-- Login modal -->
    <div id="login-modal">
        <!-- Login Form -->
        <div class="login-form default-form">
            <div class="form-inner">
                <?php if($site_title = setting_item("site_title")): ?>
                    <h3><?php echo e(__("Login to :site_title", ['site_title' => $site_title])); ?></h3>
                <?php else: ?>
                    <h3><?php echo e(__("Login")); ?></h3>
                <?php endif; ?>

                <?php echo $__env->make('Layout::auth/login-form',['popup'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <!--End Login Form -->
    </div>
    <!-- End Login Module -->
</div>

<div class="modal fade login" id="register">
    <div id="login-modal">
        <div class="login-form default-form">
            <div class="form-inner">
                <div class="form-inner">
                    <?php if($site_title = setting_item("site_title")): ?>
                        <h3><?php echo e(__("Create a Free :site_title Account", ['site_title' => $site_title])); ?></h3>
                    <?php else: ?>
                        <h3><?php echo e(__("Sign Up")); ?></h3>
                    <?php endif; ?>
                        <?php echo $__env->make('Layout::auth/register-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Layout/parts/login-register-modal.blade.php ENDPATH**/ ?>
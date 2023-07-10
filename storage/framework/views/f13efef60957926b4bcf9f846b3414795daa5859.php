

<?php $__env->startSection('content'); ?>
    <style>
        .card{
            height: auto;
        }
    </style>
<div class="container">
    <div class="row justify-content-center bravo-login-form-page bravo-login-page">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Verify Your Email Address')); ?></div>
                <div class="card-body">
                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                    <?php echo e(__('If you did not receive the email')); ?>, <a onclick="event.preventDefault(); document.getElementById('email-form').submit(); " href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('click here to request another')); ?></a>.

                        <form id="email-form" action="<?php echo e(route('verification.resend')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/resources/views/auth/verify.blade.php ENDPATH**/ ?>
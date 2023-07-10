
<?php $__env->startSection('content'); ?>
    <div id="bravo_notify" class="bravo_user_profile p-0">
        <div class="upper-title-box">
            <h3 class="title"><?php echo e(__("Notifications")); ?></h3>
            <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
        </div>

        <div>
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4><?php echo e(__("All Notifications")); ?></h4>
                    </div>
                    <div class="widget-content pb-4">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 mb-3">
                                <div class="panel">
                                    <ul class="dropdown-list-items p-0">
                                        <li class="notification <?php if(empty($type)): ?> active <?php endif; ?>">
                                            <i class="flaticon-home fa-lg mr-2"></i> <a href="<?php echo e(route('core.notification.loadNotify')); ?>">&nbsp;<?php echo e(__('All')); ?></a>
                                        </li>
                                        <li class="notification <?php if(!empty($type) && $type == 'unread'): ?> active <?php endif; ?>">
                                            <i class="flaticon-mail fa-lg mr-2"></i> <a href="<?php echo e(route('core.notification.loadNotify', ['type'=>'unread'])); ?>"><?php echo e(__('Unread')); ?></a>
                                        </li>
                                        <li class="notification <?php if(!empty($type) && $type == 'read'): ?> active <?php endif; ?>">
                                            <i class="flaticon-email-2 fa-lg mr-2"></i> <a href="<?php echo e(route('core.notification.loadNotify', ['type'=>'read'])); ?>"><?php echo e(__('Read')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php echo $__env->make('Core::frontend.notification.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Core/Views/frontend/notification/index.blade.php ENDPATH**/ ?>